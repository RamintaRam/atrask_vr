@extends('frontend.core')
        <!DOCTYPE html>
<html>
<head>
@section('title', $page['translation']['title'])

</head>
@section('content')
<body class="body">

<br><div class="text"><b> {{$page['translation']['title']}}</b></div><br><br>

   <div> <img  src={{asset($page['image']['path'])}}  width="800"> </div> <br><br>

    <div class="text"> {{$page['translation']['description_long']}}<br> </div>


</body>
</html>





@endsection
