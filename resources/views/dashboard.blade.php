@extends('layouts.master')

@section('content')
<header class="masthead" style="background-image: url('/work/public/frontend/assets/img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
          <h1>Welcome {{ Auth::user()->name }}</h1>
          <span class="subheading">This is your blogger dashboard.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

<div class="container-fluid p-5">
  <div class="row">
      <div class="col-lg-3 col-md-3 mx-auto card"> 
          <div class="card" style="background-color:darkgrey">
            <div class="card-body">
                <a class="dropdown-item" href="/work/public/post">Posts</a>
                <a class="dropdown-item" href="/work/public/category" >Categories</a>
                <a class="dropdown-item" href="/work/public/tag" >Tags</a>
            </div>
          </div>
      </div>
    <div class="col-lg-8 col-md-8 mx-auto">
        <?php 
        if(auth()->user()->isAdmin == 1){?>
          <div class=”panel-body”>
            <a href="{{url('admin/routes')}}">Admin</a>
          </div><?php }
          else echo '<div class="panel-heading">Normal User</div>';?>
    </div>
  </div>
</div>


  <hr>
  @endsection
