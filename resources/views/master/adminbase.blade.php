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
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
<nav class="nav-main">
    <div class="toggle-btn"></div>

    @if(session()->has('loggedAdmin'))
        <a id="logoutBtn" href="{{route('admin.logout')}}">Logout</a>
    @endif
</nav>
<aside class="nav-sidebar">
    <ul>
        <li><a href="/admin/dashboard">HOME</a></li>
        <li><a href="/account">Users</a></li>
        <li><a href="/category">Menus</a></li>
        <li><a href="/reservation">Reservation</a></li>
    </ul>
</aside>

@yield('content')


<script src="{{'../js/toggleBtn.js'}}"></script>
