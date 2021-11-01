<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
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
        return 'hewo';
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
