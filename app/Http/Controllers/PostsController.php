<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $posts = Post::all();
        return view('post.index')->with('posts',$posts)->with('user_posts',$user->posts); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Category::all();
        $tags =  Tag::all();
        return view('post.create')->withCategory($categories)->withTag($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Uploads
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('/work/public/storage/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }    

        //create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        $post->user_id =auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        $post->tags()->sync($request->tag_id,false);

        return redirect('/post')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.single')->with('post',$post);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories =  Category::all();
        $cats = array();
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags =  Tag::all();
        $tags2 = array();
        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }

        //check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/post')->with('error','Unauthorized Page');    
        }
        return view('post.edit')->with('post',$post)->with('categories',$cats)->with('tags',$tags2); 
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
        $this->validate($request,[
            'title' => 'required',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        //Handle File Uploads
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('/public/cover_images',$fileNameToStore);
        }

        //create post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        if(isset($request->tag_id)){
            $post->tags()->sync($request->tag_id);
        }else{
            $post->tags()->sync(array());
        }
        return redirect('/post')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        
        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','Unauthorized Page');    
        }

        if($post->cover_image != 'noimage.png'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/post')->with('success','Post Deleted');
    }
}
