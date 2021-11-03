<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'file_name',
        'video_id'
    ];

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id', 'id');
    }
}
