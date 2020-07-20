<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\BackEnd\BackEndController;

class categoriesController extends BackEndController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  category::paginate(10);
        return view('back-end.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.categories.create');
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
            'meta_keyword' => ['max:191'],
            'meta_des' => ['max:191'],
        ]);
        category::create([
            'name' => Request('name'),
            'meta_keywords' => Request('meta_keyword'),
            'meta_des' => Request('meta_des'),
            'slug' => str_slug(Request('name'))
        ]);
        return redirect(route('categories.index'));
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
        $category = category::findOrFail($id);
        return view('back-end.categories.edit', compact('category'));
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
            'meta_keyword' => ['max:191'],
            'meta_des' => ['max:191'],
        ]);
        $category = category::findOrFail($id);
        $category->update([
            'name' => Request('name'),
            'meta_keywords' => Request('meta_keyword'),
            'meta_des' => Request('meta_des'),
            'slug' => str_slug(Request('name'))
        ]);
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }
}
