@extends('layouts.master')

@section('title',"| $category->name Category")

@section('content')

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

  <article>
    <div class="container-fluid p-5">
            @include('inc.messages')
      <div class="row" style="margin-bottom: 10px;">

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
          <div class="col-lg-12 col-md-12 mx-auto">
            <h3>Category : {{ $category->name }} <small>( {{$category->posts()->count()}} Posts )</small></h3>
          </div>
            @if(!Auth::guest())
              @if(Auth::user()->id == $category->user_id)
                <div class="col-lg-1 col-md-1 mx-auto">
                    <a href="/work/public/category/{{$category-> id}}/edit" class="btn btn-secondary float-right">Edit</a>    
                </div>
              @endif  
            @endif 
            <div class="row">
                <div class="col-lg-12 col-md-12 mx-auto">
                  <div class="card">
                    <table class="table card-body">
                        <thead>
                            <tr>
                                <th>Posts</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td><a href="/work/public/post/{{$post-> id}}" class="btn btn-secondary float-right">View</a></td>
                            </tr>
                            @endforeach    
                        </tbody>
                    </table>
                  </div>  
                </div>
            </div>
        </div>
      </div>
    </div>
  </article>
  <hr>
@endsection
