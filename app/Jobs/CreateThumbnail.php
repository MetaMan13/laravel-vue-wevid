<?php

namespace App\Jobs;

use App\Models\Thumbnail;
use FFMpeg\FFMpeg;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Coordinate\Dimension;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateThumbnail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $video;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = base_path('storage/app/public/');
        $fileName = Str::random(16) . '.jpg';

        $ffmpeg = FFMpeg::create();
        $videoFile = $ffmpeg->open($this->video->path . $this->video->file_name);
        $videoFile
            ->filters()
            ->resize(new Dimension(320, 240))
            ->synchronize();
        $videoFile
            ->frame(TimeCode::fromSeconds(10))
            ->save($path . $fileName);

        $thumbnail = Thumbnail::create([
            'path' => $path,
            'file_name' => $fileName,
            'video_id' => $this->video->id,
        ]);

        $this->video->is_processed = true;
        $this->video->save();
    }
}
