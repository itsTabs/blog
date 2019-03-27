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
    <div class="container p-5">
            @include('inc.messages')
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
            <h1>Create Post</h1>
            {!! Form::open(['action' => 'PostsController@store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', '' , ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group">
                  {{Form::label('category_id','Category')}}
                  <select class="form-control" name="category_id">
                      @foreach ($category as $category)
                        <option value='{{$category->id}}'>{{$category->name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  {{Form::label('tag_id','Tags')}}
                  <select class="form-control select2-multiple" name="tag_id[]" multiple="multiple">
                      @foreach ($tag as $tag)
                        <option value='{{$tag->id}}'>{{$tag->name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Body')}}
                    {{Form::textarea('body', '' , ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body Text'])}}
                </div>
                <div class="form-group">
                    {{Form::file('cover_image')}}
                </div>
                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                <a href="/work/public/post/" class="btn btn-secondary">Cancel</a>
            {!! Form::close() !!}
        </div>
        
      </div>
    </div>
  </article>
  <hr>
@endsection

@section('script')

  <script>$(document).ready(function() {
    $('.select2-multiple').select2();
  });
</script>
@endsection
