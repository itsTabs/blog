@extends('layouts.master')

@section('content')

<header class="masthead" style="background-image: url('/work/public/frontend/assets/img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contact Me</h1>
            <span class="subheading">Have questions? I have answers.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container  p-5">
    <div class="row">
      <div class="col-lg-10 col-md-10 mx-auto">
        <div class="container p-2">
          @include('inc.messages')
        <div class="row">
          <div class="col-lg-7 col-md-7 mx-auto">
            
              {!! Form::open(['action' => 'HomeController@store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
                  <div class="form-group">
                      {{Form::text('name', '' , ['class' => 'form-control', 'placeholder' => 'Name'])}}
                  </div>
                  <div class="form-group">
                    {{Form::email('email', '' , ['class' => 'form-control', 'placeholder' => 'Email'])}}
                  </div> 
                  <div class="form-group">
                      {{Form::textarea('message', '' , ['class' => 'form-control', 'placeholder' => 'Message'])}}
                  </div>
                  {{Form::submit('Send',['class' => 'btn btn-primary'])}}
              {!! Form::close() !!}
          </div>
          <div class="col-lg-4 col-md-4 mx-auto">
            <address>
              <strong>Blogger Inc.</strong><br>
              57 Southern Blvd<br>
              Newbury, Massachusetts(MA), 01951<br>
              <abbr title="Phone">P:</abbr> (978) 462-5281
            </address>
            
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

  <hr>

@endsection