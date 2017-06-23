@extends('frontend.core')

@section('title', $page['translation']['title'])
@section('content')


    {{$page['translation']['title']}}<br>

    <img  src={{asset($page['image']['path'])}}  width="800"><br><br>

    {{$page['translation']['description_long']}}<br>












@endsection
