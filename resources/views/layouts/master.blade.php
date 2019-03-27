<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('frontend/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('frontend/assets/css/clean-blog.min.css')}}" rel="stylesheet">

    <!-- Select 2 -multi select plugin -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
  
  </head>

  <body>
   
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

      <!-- Bootstrap core JavaScript -->
      <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 
      <!-- Custom scripts for this template -->
      <script src="{{asset('frontend/assets/js/clean-blog.min.js')}}"></script>
      <script src="/work/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <script>
         CKEDITOR.replace( 'article-ckeditor' );
      </script>

      @yield('script')
   </body>
 
 </html>