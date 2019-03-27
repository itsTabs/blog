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
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1>Edit Comment</h1> 
                {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}
                    {{ Form::label('comment', 'Comment') }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
                    {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 10px' ]) }}  
                {{ Form::close() }}
            </div>   
        </div>
    </div>
  </article>
  <hr>
@endsection
