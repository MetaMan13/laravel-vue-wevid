<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
    public function index()
    {
        return Inertia::render('Video/Index');
    }

    public function create()
    {
        return Inertia::render('Video/Create');
    }

    public function store(StoreRequest $request)
    {
        $fileName = Str::random(8) . '.' . $request->file('file')->extension();
        $path = storage_path('public/');
        Storage::putFileAs('public/', $request->file('file'), $fileName);

        $data = collect($request->validated())
            ->merge([
                'path' => $path,
                'file_name' => $fileName,
                'user_id' => $request->user()->id
            ])
            ->all();

        Video::create($data);

        return redirect()->route('dashboard.videos.index')->with('message', 'Video uploaded!');
    }

    public function show()
    {
        return Inertia::render('Video/Show');
    }

    public function edit()
    {
        return Inertia::render('Video/Edit');
    }

    public function update()
    {

    }

    public function destory()
    {

    }
}
