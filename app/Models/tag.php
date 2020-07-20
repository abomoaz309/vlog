<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['name'];

    public function videos() {
        return $this->belongsToMany(video::class, 'tags_videos');
    }
}
