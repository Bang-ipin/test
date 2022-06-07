<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('Login Administrator') }}</title>

    {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}
    <link href="{{ asset('public/images/favicon.png') }}" rel="shortcut icon" />
    <link href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
	
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('public/css/login.css') }}" rel="stylesheet" >
</head>
<body style="background-image: url('public/images/page_bg.jpg')">
    @yield('content') 
</body>
</html>
