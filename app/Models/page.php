<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    protected $fillable = ['name', 'des', 'meta_keywords', 'meta_des'];
}
