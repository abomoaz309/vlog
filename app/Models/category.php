<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    protected $table = 'categories';

    protected $fillable = ['name', 'meta_keywords', 'meta_des', 'slug'];

    public function videos() {
        return $this->hasMany(video::class);
    }
}
