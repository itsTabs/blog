<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post; 

class CommentsController extends Controller
{    
   public function __construct()
    {
        $this->middleware('auth')->except('store');;
    }
    
    public function store(Request $request, $post_id)
    {
       $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'comment' => 'required|min:5|max:2000'
       ));
       $post = Post::find($post_id);
       $comment = new Comment();
       $comment->name = $request->name;
       $comment->email = $request->email; 
       $comment->comment = $request->comment;  
       $comment->approved = true;
       $comment->post()->associate($post);
       
       $comment->save();

       return redirect()->back()->with('success','Comment was added'); 
    }

    public function edit($id)
    {
       $comment = Comment::find($id);
       return view('comments.edit')->withComment($comment); 
    }

    public function update(Request $request, $id)
    {
          $comment = Comment::find($id);
          $this->validate($request, array('comment' => 'required'));
          $comment->comment = $request->comment;
          $comment->save();
          
          return redirect('/post')->with('success','Comment Updated');
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }
 
    public function destroy($id)
    {
         $comment = Comment::find($id);
         $post_id = $comment->post->id;
         $comment->delete();
         return redirect('/post')->with('success','Comment Deleted');
    }
}
