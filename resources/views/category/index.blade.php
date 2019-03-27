@extends('layouts.master')

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
      <div class="row">
        @if(Auth::user()->isAdmin ==1 && Auth::user()->id)
          <div class="col-lg-3 col-md-3 mx-auto card"> 
            <div class="card" style="background-color:darkgrey">
              <div class="card-body">
                  <a class="dropdown-item" href="/work/public/post">Posts</a>
                  <a class="dropdown-item" href="/work/public/category" >Categories</a>
                  <a class="dropdown-item" href="/work/public/tag" >Tags</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 mx-auto">
            <h3>Categories</h3>
            <table class="table table-hover table-borderless">
              @if(count($categories)>0) 
                @foreach ($categories as $category)
                <tr>
                  <td> » {{$category->name}}</td>
                  <td><a href="/work/public/category/{{$category->id}}" class="btn btn-primary float-right">View</a></td>
                </tr>
                @endforeach
              @else
                <p>No Categories found.</p>
              @endif
            </table>
          </div>
          <div class="col-lg-3 col-md-3 mx-auto">
            <div class="card">
              <div class="card-body">
                {!! Form::open(['route'=>'category.store','method'=>'POST'])!!}
                <h3>New Category</h3>
                  {{Form::text('name',null,['class'=>'form-control'])}}
                  {{Form::submit('Create A New Category',['class'=>'btn btn-secondary btn-block mt-1'])}}
              </div> 
            </div>
          </div>
        @else
          <div class="col-lg-3 col-md-3 mx-auto card"> 
            <div class="card" style="background-color:darkgrey">
              <div class="card-body">
                  <a class="dropdown-item" href="/work/public/post">Posts</a>
                  <a class="dropdown-item" href="/work/public/category" >Categories</a>
                  <a class="dropdown-item" href="/work/public/tag" >Tags</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mx-auto">
            <h3>Categories</h3>
            <table class="table table-hover table-borderless">
              @if(count($categories)>0) 
                @foreach ($categories as $category)
                <tr>
                  <td> » {{$category->name}}</td>
                  <td><a href="/work/public/category/{{$category->id}}" class="btn btn-primary float-right">View</a></td>
                </tr>
                @endforeach
              @else
                <p>No Categories found.</p>
              @endif
            </table>
          </div>
          <div class="col-lg-3 col-md-3 mx-auto">
          </div>
        @endif
      </div>
    </div>
  </article>
  <hr>
@endsection
