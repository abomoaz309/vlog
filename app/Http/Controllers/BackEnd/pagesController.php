<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\page;
use Illuminate\Http\Request;

class pagesController extends BackEndController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=  page::paginate(10);
        return view('back-end.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.pages.create');
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
            'meta_keyword' => ['max:191'],
            'meta_des' => ['max:191'],
        ]);
        page::create([
            'name' => Request('name'),
            'des' => Request('des'),
            'meta_keywords' => Request('meta_keyword'),
            'meta_des' => Request('meta_des'),
        ]);
        return redirect(route('pages.index'));
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
        $page= page::findOrFail($id);
        return view('back-end.pages.edit', compact('page'));
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
        ]);
        $page = page::findOrFail($id);
        $page->update([
            'name' => Request('name'),
            'des' => Request('des'),
            'meta_keywords' => Request('meta_keyword'),
            'meta_des' => Request('meta_des'),
        ]);
        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = page::findOrFail($id);
        $page->delete();
        return redirect()->back();
    }
}
