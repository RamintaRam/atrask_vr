<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/app-admin.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
@include('admin.menu')

@yield('content')

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('scripts')
</html>