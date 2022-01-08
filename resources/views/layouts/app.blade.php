<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('sty/assets/img/logo2.png') }}" type="image/gif" sizes="16x16">
    <title>{{ config('app.name', 'شركة البدر للتوريد والتصنيع') }}</title>

    <!-- Scripts -->
  
    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
<!-- CSS only -->

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('da/css/argon-tables.css')}}">
 --}}
 <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{asset('da/css/nucleo-icons.css')}}">
<link rel="stylesheet" href="{{asset('da/css/nucleo-svg.css')}}">
<link rel="stylesheet" href="{{asset('da/css/soft-ui-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('da/css/soft-ui-dashboard.css.map')}}">
<link rel="stylesheet" href="{{asset('da/css/soft-ui-dashboard.min.css')}}">
<link rel="stylesheet" href="{{asset('da/css/main.css')}}">
<link rel="stylesheet" href="{{asset('da/css/tasks.css')}}">


 <!-- Favicons -->
 <link href="sty/assets/img/favicon.png" rel="icon">
 <link href="sty/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


 <!-- Templatsty/e Main CSS File -->
 <link href="sty/assets/css/style.css" rel="stylesheet">
@if (!Auth::check())
<link rel="stylesheet" href="{{asset('da/css/login.css')}}">
@endif

</head> 
<body>
    <div id="app">
         @if (!isset($nav) && Auth::check())
         @include('layouts.sidebar')
         @endif 

         <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
            @if (!isset($nav) && Auth::check())
            @include('layouts.navbar')
            @endif
            @yield('content')
        </main>
    </div>

    @yield('scripts')  

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="sty/assets/js/main.js"></script>
</body>
</html>
