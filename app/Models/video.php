<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $fillable = [
        'name',
        'des',
        'meta_keywords',
        'meta_des',
        'youtube_link',
        'published',
        'user_id',
        'category_id',
        'image'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function skills() {
        return $this->belongsToMany(skill::class, 'skills_videos');
    }

    public function tags() {
        return $this->belongsToMany(tag::class, 'tags_videos');
    }

    public function comments() {
        return $this->hasMany(comment::class);
    }

    public function scopePublished() {
        return $this->where('published', 1);
    }
}
