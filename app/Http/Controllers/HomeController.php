<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use App\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(4);
        $category = Category::all();
        $tag = Tag::all();
        return view('welcome')->with('posts',$posts)->with('categories',$category)->with('tags',$tag); 
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    } 
    public function store(Request $request)
    {        
        $msg = new Contact;
        $msg->name = $request->input('name');
        $msg->email = $request->input('email');
        $msg->message = $request->input('message');
        $msg->save();

        return redirect('/contact')->with('success','Message has been Sent');
    } 
    public function admin()
    { 
        return view('dashboard'); 
    }
}
