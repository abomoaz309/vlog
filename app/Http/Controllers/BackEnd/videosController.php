<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\tag;
use App\Models\skill;
use App\Models\video;
use App\Models\comment;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class videosController extends BackEndController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=  video::paginate(5);
        return view('back-end.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $skills = skill::all();
        $tags = tag::all();
        return view('back-end.videos.create', compact('categories', 'skills', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:191'],
            'des' => ['required', 'max:191'],
            'meta_keywords' => ['max:191'],
            'meta_des' => ['max:191'],
            'youtube_link' => ['required', 'min:10', 'url'],
            'published' => ['required'],
            'image' => ['required', 'image'],
        ]);

        $file = $request->file('image'); //catch image
        $fileName = time().str_random(10)."." .$file ->getClientOriginalExtension(); //give a name to the image
        $file->storeAs("public/uploads", $fileName); //save file in its path not incluse (storage/app)
        $video = video::create([
            'name' => Request('name'),
            'des' => Request('des'),
            'meta_keywords' => Request('meta_keywords'),
            'meta_des' => Request('meta_des'),
            'youtube_link' => Request('youtube_link'),
            'published' => Request('published'),
            'image' => $fileName,
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category'),
        ]);
        $video->skills()->sync($request->skill);
        $video->tags()->sync($request->tag);
        return redirect(route('videos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = video::findOrFail($id);
        $categories = category::all();
        $skills = skill::all();
        $tags = tag::all();
        $selectedSkills = $video->skills()->get()->pluck('id')->toArray();
        $selectedTags = $video->tags()->get()->pluck('id')->toArray();
        $comments = $video->comments()->get();
        return view('back-end.videos.edit', compact('video', 'categories', 'skills', 'selectedSkills', 'tags', 'selectedTags', 'comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:191'],
            'des' => ['required', 'max:191'],
            'meta_keyword' => ['max:191'],
            'meta_des' => ['max:191'],
            'youtube_link' => ['required', 'min:10', 'url'],
            'published' => ['required'],
            'image' => ['required'],
        ]);
        $file = $request->file('image');
        $fileName = time().str_random(10)."." .$file ->getClientOriginalExtension();
        $file->storeAs("public/uploads", $fileName);
        $video = video::findOrFail($id);
        $video->update([
            'name' => Request('name'),
            'des' => Request('des'),
            'meta_keywords' => Request('meta_keywords'),
            'meta_des' => Request('meta_des'),
            'youtube_link' => Request('youtube_link'),
            'published' => Request('published'),
            'image' => $fileName,
             'category_id' => $request->input('category'),
        ]);
        $video->skills()->sync($request->skill);
        $video->tags()->sync($request->tag);
        return redirect(route('videos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = video::findOrFail($id);
        $video->delete();
        return redirect()->back();
    }

    public function editComment($id) {

        dd("hghghg");
        return view('back-end.comments.edit', compact('comment'));
    }

}
