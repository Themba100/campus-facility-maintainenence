<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Materialize is a modern responsive CSS framework based on Material Design by Google. ">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{url('public/css/index.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset ('assets/css/materialize.min.css')}}" media="screen,projection">
      <link type="text/css" rel="stylesheet" href="{{asset ('assets/css/style.css')}}" media="screen,projection">
</head>
<body>


 


       
	

    @yield('content')

    <script type="text/javascript" src="{{asset ('assets/css/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/script.js')}}}"></script>
    
</body>
</html>
