@extends('layouts.master')

@section('content')

<header class="masthead" style="background-image: url('/work/public/frontend/assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
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
                        <h1>Edit  Category</h1>
                        {!! Form::model($category, ['route' =>['category.update', $category->id] ,'method' => 'PUT']) !!}
                            <div class="form-group">
                                {{Form::label('name', "Title")}}
                                {{Form::text('name', null, ['class' => 'form-control'])}}
                            </div>
                            
                            {{Form::submit('Save Changes',['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>   
            </div>
    </div>
  </article>
  <hr>
@endsection
