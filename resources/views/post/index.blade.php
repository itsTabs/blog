@extends('layouts.master')

@section('content')

<!-- Page Header -->

  <header class="masthead" style="background-image: url('/work/public/frontend/assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
          <div style="height:70px">
            
          </div>
        </div>
      </div> 
    </div>
  </header>

  <div class="container-fluid p-5">
    @include('inc.messages')
    <div class="row">
        <div class="col-lg-3 col-md-3 mx-auto"> 
            <div class="card" style="background-color:darkgrey">
              <div class="card-body">
                  <a class="dropdown-item" href="/work/public/post">Posts</a>
                  <a class="dropdown-item" href="/work/public/category" >Categories</a>
                  <a class="dropdown-item" href="/work/public/tag" >Tags</a>
              </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 mx-auto">
            <div class="card">
              @guest
                  <p>hello</p>
              @else  
                <div class="card-body"> 
                  <a href="/work/public/post/create" class="btn btn-secondary">Create Post</a>
                  <hr>
                  <h3>Your Blog Posts</h3>
                  @if(Auth::user()->isAdmin ==1) 
                    @if(count($posts) > 0)
                      <table class="table table-hover table-borderless">     
                        @foreach ($posts as $post) 
                          <tr>
                            <td> » {{$post->title}}</td>
                            <td><a href="/work/public/post/{{$post-> id}}" class="btn btn-primary float-right">View</a></td>
                            <td>
                              {!!Form::open(['action' => ['AdminController@destroy$post->id'],'method' => 'POST', 'class' => 'float-right'])!!}
                              {{Form::hidden('_method','DELETE')}}
                              {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                              {!!Form::close()!!} 
                            </td>
                          </tr>
                        @endforeach  
                      </table>
                    @else
                      <p>You don't have any posts.</p>
                    @endif
                  @else
                    @if(count($user_posts))
                      <table class="table table-hover table-borderless">
                        @foreach ($user_posts as $user_post) 
                          <tr>
                            <td> {{$user_post->title}}</td>
                            <td><a href="/work/public/post/{{$user_post-> id}}" class="btn btn-primary float-right">View</a></td>
                            <td><a href="/work/public/post/{{$user_post-> id}}/edit" class="btn btn-secondary float-right">Edit</a></td>
                            <td>
                              {!!Form::open(['action' => ['PostsController@destroy', $user_post->id],'method' => 'POST', 'class' => 'float-right'])!!}
                              {{Form::hidden('_method','DELETE')}}
                              {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                              {!!Form::close()!!}    
                            </td>
                          </tr>
                        @endforeach  
                      </table>
                    @else
                      <p>You don't have any posts.</p>
                    @endif
                  @endif  
                </div>
              @endauth  
            </div>
        </div>
    </div>
  </div>
<hr>

@endsection