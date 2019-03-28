<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show','index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display all tags
        $tags =  Tag::all();
        return view('tag.index')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save a new tag
        $this->validate($request,array(
            'name'=>'required|max:255|unique:tags'
        ));
        $tag =new Tag;
        $tag->name = $request->name;
        $tag->save();

        return redirect('/tag')->with('success','Tag Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tag.single')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tag.edit')->withTag($tag);
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
        $tag = Tag::find($id);
        $this->validate($request,array(
            'name'=>'required|max:255|unique:tags'
        ));
        $tag->name= $request->name;
        $tag->save();
        return redirect('/tag')->with('success','Tag Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();

        $tag->delete(); 
        return redirect('/tag')->with('success','Tag Deleted');
    }
}
