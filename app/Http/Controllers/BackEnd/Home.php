<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\tag;
use App\Models\skill;
use App\Models\video;
use App\Models\comment;
use App\Models\category;

class Home extends BackEndController
{
    public function index() {
        $videos = video::all();
        $categories = category::all();
        $skills = skill::all();
        $tags = tag::all();
        $comments = comment::orderBy('created_at', 'desc')->paginate('7');
        return view('back-end.home', compact('videos', 'categories', 'skills', 'tags', 'comments'));
    }
}
