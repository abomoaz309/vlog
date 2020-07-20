<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\video;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class commentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'comment' => ['required', 'min:10']
        ]);
        comment::create([
            'comment' => request('comment'),
            'user_id' => Auth::user()->id,
            'video_id' => Input::get('video_id')
        ]);

        return Redirect::to(URL::previous() . "#comments");
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
        $comment = comment::findOrFail($id);
        return view('back-end.comments.edit', compact('comment'));
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
        $video_id = Input::get('video_id');
        $comment = comment::findOrFail($id);
        $comment->update([
            'comment' => Request('updateComment')
        ]);

        return redirect()->route('videos.edit', ['id' => $video_id, '#comments']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = comment::findOrFail($id);
        $comment->delete();
        return Redirect::to(URL::previous() . "#comments");
    }
}
