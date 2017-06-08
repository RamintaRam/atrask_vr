<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/app-admin.css')}}">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
@include('admin.menu')

@yield('content')

</body>
</html>