<?php

namespace App\Jobs;

use FFMpeg\FFMpeg;
use App\Models\Gif;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Coordinate\Dimension;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateGif implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $video;
    public $from;
    public $to;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video, $from, $to)
    {
        $this->video = $video;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = base_path('storage/app/public/');
        $fileName = Str::random(16) . '.gif';
        $ffmpeg = FFMpeg::create();
        $videoFile = $ffmpeg->open($this->video->path . $this->video->file_name);

        $videoFile
            ->gif(TimeCode::fromSeconds($this->from), new Dimension(640, 480), $this->to)
            ->save($path . $fileName);

        Gif::create([
            'path' => $path,
            'file_name' => $fileName,
            'video_id' => $this->video->id
        ]);

        $this->video->is_processed = true;
        $this->video->save();
    }
}
