<?php

namespace App\Http\Controllers;

use App\Models\tag;
use App\Models\page;
use App\Models\User;
use App\Models\skill;
use App\Models\video;
use App\Models\comment;
use App\Models\message;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Alert;
use SweetAlert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth')->only([
            'destroyComment', 'updateComment', 'createComment', 'editProfile', 'updateProfile'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = video::published()->orderBy('id', 'desc');
        if(request()->has('search') && request()->get('search') != '') {
            $videos = video::where('name', 'like', '%'.request()->get('search').'%')->where('published', '1');
        }
        $videos = $videos->paginate('3');
        return view('home', compact('videos'));
    }

    public function category($id) {
        $category = category::findOrFail($id);
        $videos = video::published()->where('category_id', $id)->paginate('3');
        return view('front-end.categories.category', compact('videos', 'category'));
    }

    public function page($id, $slug = null) {
        $page = page::findOrFail($id);
        return view('front-end.pages.page', compact('page'));
    }

    public function skill($id) {
        $skill = skill::findOrFail($id);
        $skills = $skill->videos()->get()->pluck('name')->toArray();
        $videos = video::published()->whereHas('skills', function($query) use($skill){
            $query->where('skill_id', $skill->id);})->paginate('3');
            return view('front-end.skills.skill', compact('videos', 'skill'));
    }

    public function tag($id) {
        $tag = tag::findOrFail($id);
        $tags = $tag->videos()->get()->pluck('name')->toArray();
        $videos = video::published()->whereHas('tags', function($query) use($tag){
            $query->where('tag_id', $tag->id);})->paginate('3');
            return view('front-end.tags.tag', compact('videos', 'tag'));
    }

    public function video($id) {
        $video = video::findOrFail($id);
        return view('front-end.videos.video', compact('video'));
    }

    public function destroyComment($id) {
        $comment = comment::findOrFail($id);
        $comment->delete();
        return Redirect::to(URL::previous() . "#comments");
    }

    public function updateComment(Request $request, $id) {
        $comment = comment::findOrFail($id);
        $video_id = Input::get('video_id');
        $comment->update([
            'comment' => Request('updateComment')
        ]);
        return redirect()->route('frontend.video', ['id' => $video_id, '#comments']);
    }

    public function createComment(Request $request) {
        $this->validate($request, [
            'comment' => ['required', 'min:10']
        ]);

        $video_id = Input::get('video_id');
        comment::create([
            'comment' => request('comment'),
            'user_id' => Auth::user()->id,
            'video_id' => Input::get('video_id')
        ]);
        return redirect()->route('frontend.video', ['id' => $video_id, '#addcomments']);
    }

    public function messageStore(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required | min:10 | max:500',
        ]);

        message::create([
            'name' => Request('name'),
            'email' => Request('email'),
            'message' => Request('message'),
        ]);
        alert()->success('We have received your message, Thanks', 'Message Received')->autoclose(5000);
        return redirect()->route('frontend.landing', '#messages');
    }

    public function welcome() {
        $videos = video::published()->orderBy('id', 'desc')->paginate('6');
        $videoss = video::published()->get();
        $comments = comment::all();
        $categories = category::all();
        return view('welcome', compact('videos', 'videoss', 'comments', 'categories'));
    }

    public function userProfile($id, $slug = null) {
        $comment = comment::findOrFail($id);
        $user = User::where('id', $comment['user_id'])->first();
        return view('front-end.profiles.profile', compact('user'));
    }

    public function editProfile($id, $slug = null) {
        $user = User::findOrFail($id);
        return view('front-end.profiles.editprofile', compact('user'));
    }

    public function updateProfile(Request $request, $id, $slug = null) {
        $this->validate($request, [
            'username' => ['required'],
            'email' =>  'required|email|unique:users,email,'. $id,
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return view('front-end.profiles.profile', compact('user'));
    }

}
