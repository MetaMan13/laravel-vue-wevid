<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'is_processed',
        'path',
        'file_name',
        'user_id',
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function thumbnail()
    {
        return $this->hasOne(Thumbnail::class, 'video_id', 'id');
    }

    // Mutators

    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'] = Carbon::createFromTimestamp(strtotime($this->attributes['created_at']))->diffForHumans();
    }
}
