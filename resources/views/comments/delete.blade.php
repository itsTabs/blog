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
                <h1>ARE YOU SURE?<br> DELETE THIS COMMENT?</h1> 
                <p>
                    <strong>Name</strong> {{ $comment->name }} <br>
                    <strong>Email</strong> {{ $comment->email }} <br>
                    <strong>Comment</strong> {{ $comment->comment }}
                </p>
                {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('YES, DELETE THIS COMMENT', ['class' => 'btn btn-block btn-danger', 'style' => 'margin-top: 10px' ]) }}  
                {{ Form::close() }}
            </div>   
        </div>
    </div>
  </article>
  <hr>
@endsection
