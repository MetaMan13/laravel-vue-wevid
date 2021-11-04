<?php

namespace App\Http\Controllers;

use FFMpeg\FFMpeg;
use Inertia\Inertia;
use App\Models\Video;
use Illuminate\Support\Str;
use FFMpeg\Format\Video\WMV;
use Illuminate\Http\Request;
use FFMpeg\Format\Video\WebM;
use FFMpeg\Format\Video\X264;
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

class VideoController extends Controller
{
    public function index(IndexRequest $request)
    {
        $request
            ->user()
            ->load(['videos' => function($query)
            {
                $query->select(['id', 'title', 'file_name', 'user_id']);
            }]);

        return Inertia::render('Video/Index');
    }

    public function create()
    {
        return Inertia::render('Video/Create');
    }

    public function store(StoreRequest $request)
    {
        return 'Proslo';

        $fileName = Str::random(8) . '.' . 'mp4';
        $thumbnailName = Str::random(8);
        $thumbnailPath = base_path('storage/app/public/');
        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open($request->file('file'));
        // Thumbnail creation
        $video
            ->filters()
            ->resize(new Dimension(320, 240))
            ->synchronize();
        $video
            ->frame(TimeCode::fromSeconds(10))
            ->save($thumbnailPath . $thumbnailName . '.jpg');

        // $video
        //     ->save(new X264(), $thumbnailPath . $fileName);

        $data = collect($request->validated())
            ->merge([
                'path' => $thumbnailPath,
                'file_name' => $fileName,
                'user_id' => $request->user()->id
            ])
            ->all();

        Video::create($data);

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
            // $fileName = Str::random(8) . '.' . $request->file('file')->extension();
            // $path = storage_path('public/');
            // Storage::putFileAs('public/', $request->file('file'), $fileName);
            $fileName = Str::random(8) . '.' . 'mp4';

            $thumbnailName = Str::random(8);
            $thumbnailPath = base_path('storage/app/public/');
            $ffmpeg = FFMpeg::create();
            $videoFile = $ffmpeg->open($request->file('file'));
            $videoFile
                ->filters()
                ->resize(new Dimension(320, 240))
                ->synchronize();
            $videoFile
                ->frame(TimeCode::fromSeconds(10))
                ->save($thumbnailPath . $thumbnailName . '.jpg');
            $videoFile
                ->save(new X264(), $thumbnailPath . $fileName);
                // ->save(new WMV(), 'export-wmv.wmv')
                // ->save(new WebM(), 'export-webm.webm');

            $data = collect($request->validated())
                ->merge([
                    'path' => $thumbnailPath,
                    'file_name' => $fileName,
                ])
                ->all();
        }

        $video->update($data);

        return redirect()->route('dashboard.videos.index')->with('message', 'Video updated!');
    }

    public function destroy(DestoryRequest $request, Video $video)
    {
        $video->delete();
        File::delete($video->path . $video->file_name);

        return redirect()->route('dashboard.videos.index')->with('message', 'Video deleted!');
    }
}
