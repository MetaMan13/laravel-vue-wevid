<?php

namespace App\Http\Controllers;

use FFMpeg\FFMpeg;
use Inertia\Inertia;
use App\Models\Video;
use Illuminate\Support\Str;
use FFMpeg\Format\Video\X264;
use App\Jobs\CreateThumbnail;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Coordinate\Dimension;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Video\IndexRequest;
use App\Http\Requests\Video\CreateRequest;
use App\Http\Requests\Video\StoreRequest;
use App\Http\Requests\Video\ShowRequest;
use App\Http\Requests\Video\EditRequest;
use App\Http\Requests\Video\UpdateRequest;
use App\Http\Requests\Video\DestoryRequest;
use App\Jobs\CreateGif;
use App\Models\Gif;

class VideoController extends Controller
{
    public function index(IndexRequest $request)
    {
        $request->user()->load(['videos' => function($query){
            $query->where('is_processed', 1);
        }, 'videos.thumbnail', 'videos.gif']);

        return Inertia::render('Video/Index');
    }

    public function create()
    {
        return Inertia::render('Video/Create');
    }

    public function store(StoreRequest $request)
    {
        // Save and convert the video
        $path = base_path('storage/app/public/');
        $fileName = Str::random(16) . '.' . $request->file('file')->extension();
        $ffmpeg = FFMpeg::create();
        $videoFile = $ffmpeg->open($request->file('file'));
        $videoFile->save(new X264(), $path . $fileName);

        $data = collect($request->validated())
            ->merge([
                'user_id' => $request->user()->id,
                'path' => $path,
                'file_name' => $fileName
            ])
            ->all();

        $video = Video::create($data);

        CreateThumbnail::dispatch($video);
        CreateGif::dispatch($video, $data['gifFrom'], $data['gifTo']);

        return redirect()->route('dashboard.videos.index')->with('message', 'Video created!');
    }

    public function show()
    {
        return Inertia::render('Video/Show');
    }

    public function edit(EditRequest $request, Video $video)
    {
        return Inertia::render('Video/Edit', [
            'video' => $video
        ]);
    }

    public function update(UpdateRequest $request, Video $video)
    {
        $data = $request->validated();

        if($request->file('file'))
        {
            $path = base_path('storage/app/public/');
            $fileName = Str::random(16) . '.' . $request->file('file')->extension();
            $ffmpeg = FFMpeg::create();
            $videoFile = $ffmpeg->open($request->file('file'));
            $videoFile->save(new X264(), $path . $fileName);

            $data = collect($request->validated())
                ->merge([
                    'path' => $path,
                    'file_name' => $fileName,
                    'is_processed' => false,
                ])
                ->all();
            
            // Delete thumbnail and video
            File::delete($video->path . $video->file_name);
            $thumbnail = $video->thumbnail()->get()->first();
            File::delete($thumbnail->path . $thumbnail->file_name);
            $thumbnail->delete();
            
            CreateThumbnail::dispatch($video);
        }

        $video->update($data);

        return redirect()->route('dashboard.videos.index')->with('message', 'Video updated!');
    }

    public function destroy(DestoryRequest $request, Video $video)
    {
        $thumbnail = $video->thumbnail()->get()->first();
        $video->delete();
        File::delete($video->path . $video->file_name);
        File::delete($thumbnail->path . $thumbnail->file_name);

        return redirect()->route('dashboard.videos.index')->with('message', 'Video deleted!');
    }
}
