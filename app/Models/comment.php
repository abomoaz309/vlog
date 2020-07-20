<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = ['user_id', 'video_id', 'comment'];

    public function video() {
        return $this->belongsTo(video::class, 'video_id');
    }

    public function user() {
        return $this->belongsTo(user::class, 'user_id');
    }
}
