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
            <h1>Edit  Post</h1>
            {!! Form::open(['action' => ['PostsController@update', $post->id],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                <div class="form-group"> 
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', $post->title , ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('category_id','Category')}}
                    {{Form::select('category_id',$categories,$post->category_id,['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('tag_id','Tag')}}
                    {{Form::select('tag_id[]',$tags,$post->tag_id,['class' => 'form-control select2-multiple', 'multiple'=>'multiple'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Body')}}
                    {{Form::textarea('body', $post->body , ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body Text'])}}
                </div>
                <div class="form-group">
                    {{Form::file('cover_image')}}
                </div>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save Changes',['class' => 'btn btn-primary'])}}
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
      $('.select2-multiple').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change'); 
    });
  </script>
@endsection
