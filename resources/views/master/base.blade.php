<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant&Cafe</title>
    <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/category.css')}}">
    <link rel="stylesheet" href="{{asset('css/account.css')}}">
</head>
<body>

@include('includes.header')
@yield('content')
@include('includes.footer')

</body>
</html>
<script src="{{'../js/toggleBtn.js'}}"></script>
