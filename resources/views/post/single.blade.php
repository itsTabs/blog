@extends('layouts.master')

@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url('/work/public/storage/cover_images/{{$post->cover_image}}')"> 
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
            <div class="post-heading">
                <h1>{{$post->title}}</h1>
            </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container  p-5">
      <div class="row">
        <div class="col-lg-8 col-md-8 mx-auto">
            <p>{!!$post->body!!}</p>
            <hr>
              <h3>Tags | 
                <small>
                  @foreach($post->tags as $tag)
                    <span class="badge badge-secondary"> {{$tag->name}}</span>
                  @endforeach
                </small>
              </h3>
            <hr>
            @if(!Auth::guest())
                @if(Auth::user()->id == $post->user_id)
                  <div id="backend-comments">
                    <h3>Comments <small>{{ $post->comments()->count()}}</small></h3>
                      <table class="table table-hover table-borderless">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($post->comments as $comment)
                            <tr>
                              <td>{{ $comment->name }}</td>
                              <td>{{ $comment->email }}</td>
                              <td>{{ $comment->comment }}</td>
                              <td>
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary">Edit</a>
                                  <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger">Delete</a>
                              </td>
                            </tr>    
                          @endforeach
                          <tr></tr>
                        </tbody>
                      </table>
                  </div>
                @elseif(Auth::user()->id !== $post->user_id && !Auth::guest())
                  <h3>Comments <small>{{ $post->comments()->count() }}</small></h3>
                  @foreach($post->comments as $comment)
                    <div class="comment">
                    <p>{{ $comment->comment }} <small>Comment by {{ $comment->name }}</small></p>
                    </div>
                  @endforeach
                  <hr>
                  <div id="comment-form">
                    {{Form::open(['route' => ['comments.store', $post->id],'method' => 'POST'])}}
                      <div class="row">
                        <div class="col-md-6">
                          {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                        </div>
                        <div class="col-md-6">
                          {{Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                        </div>
                        <div class="col-md-12">
                          {{Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Comment', 'style' => 'margin-top:10px;' ])}}
                          {{Form::submit('Add Comment',['class' => 'btn btn-success btn-block', 'rows' => '3', 'style' => 'margin-top:10px;'])}}
                        </div>
                      </div>
                    {{Form::close()}}
                  </div> 
                @else
                <h3>Comments <small>{{ $post->comments()->count() }}</small></h3>
                @foreach($post->comments as $comment)
                  <div class="comment">
                  <p>{{ $comment->comment }} <small>Comment by {{ $comment->name }}</small></p>
                  </div>
                @endforeach
                <hr>
                <div id="comment-form">
                  {{Form::open(['route' => ['comments.store', $post->id],'method' => 'POST'])}}
                    <div class="row">
                      <div class="col-md-6">
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                      </div>
                      <div class="col-md-6">
                        {{Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                      </div>
                      <div class="col-md-12">
                        {{Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Comment', 'style' => 'margin-top:10px;' ])}}
                        {{Form::submit('Add Comment',['class' => 'btn btn-success btn-block', 'rows' => '3', 'style' => 'margin-top:10px;'])}}
                      </div>
                    </div>
                  {{Form::close()}}
                </div> 
                @endif
            @endif     
        </div>
        <div class="col-lg-4 col-md-4 mx-auto">
          <div class="card">
            <div class="card-body">
              <p><b>Category :</b> {{ $post->category->name}}</p>
              <p><b>Created At :</b> {{$post->created_at}}</p>
              <p><b>Last Updated :</b> {{$post->updated_at}}</p>

              @if(!Auth::guest())
                @if(Auth::user()->id == $post->user_id && Auth::user()->isAdmin !==1)
                  <hr> 
                    <div class="clearfix p-2">
                      <a href='/work/public/post/{{$post-> id}}/edit' class="btn btn-secondary btn-block">Edit</a> 
                    </div>
                    <div class="clearfix p-2">  
                        {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'btn-block'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class' => 'btn btn-danger btn-block'])}}
                        {!!Form::close()!!}  
                    </div>
                    <div class="clearfix p-2">
                        <a class="btn btn-primary btn-block" href="/work/public/post">Go Back</a> 
                    </div>
                @elseif(Auth::user()->isAdmin ==1)
                  
                <div class="clearfix p-2">  
                    {!!Form::open(['action' => ['AdminController@destroy', $post->id],'method' => 'POST', 'class' => 'btn-block'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class' => 'btn btn-danger btn-block'])}}
                    {!!Form::close()!!}  
                </div>
                <div class="clearfix p-2">
                    <a class="btn btn-primary btn-block" href="/work/public/post">Go Back</a> 
                </div>
                   
                @endif    
              @endif
              
            </div> 
        </div>   
      </div>
    </div>
    
  </article>
  <hr>
  @endsection