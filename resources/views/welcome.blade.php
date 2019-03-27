@extends('layouts.master')

@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url('/work/public/frontend/assets/img/home-bg.jpg')"> 
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 mx-auto">
          <div class="site-heading">
              <h1>Blogging</h1>
          </div>
      </div> 
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
    @include('inc.messages')
    <div class="row">
      <div class="col-lg-7 col-md-7 mx-auto">

        @if(count($posts)>0)
          @foreach ($posts as $post)
            <div class="post-preview p-2">
              <div class="row">
                <!--div class="col-md-4 col-sm-4">
                  <img class="rounded border img-fluid" style="height:200px;width:200px;" src="/work/public/storage/cover_images/{{$post->cover_image}}">
                </div-->
                <div class="col-md-12 col-sm-12">
                  <h2 class="post-title">{{$post->title}}</h2>
                  <h3 class="post-subtitle small">
                    <?php
                      echo str_limit($post->body,20);
                    ?>
                  </h3>
                  <a href="/work/public/post/{{$post->id}}" class="btn btn-primary">Read More</a>
                </div>
              </div>    
            </div>
            
          @endforeach   
          <div class="clearfix float-right">
              {{$posts->links()}}
              </div>
        @else
            <p>No posts found.</p>
        @endif
      </div>
      <div class="col-lg-3 col-md-3 mx-auto">
        <div class="card">
            <div class="card-body">
              <h3>Categories</h3>
              <table class="table table-hover table-borderless">
                @if(count($categories)>0) 
                @foreach ($categories as $category)
                  <tr>
                    <td> » <a href="/work/public/category/{{$category->id}}">{{$category->name}}</a></td>
                  </tr>
                @endforeach
                @else
                  <p>No Categories found.</p>
              @endif
              </table>
            </div> 
        </div>       
      </div>
    </div>
  </div>

  <hr>

@endsection