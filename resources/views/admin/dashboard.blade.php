@extends('master.adminbase')
@section('content')

<h1> you're logged</h1>
<a href="{{route('admin.logout')}}">Logout</a>

    <div class="dashboard-btn">
        <div class="btn-admin">
            <a href="/account">USERS</a>
        </div>
        <div class="btn-admin">
            <a href="/category">MENUS</a>
        </div>
        <div class="btn-admin">
            <a href="/reservation">RESERVATION</a>
        </div>
    </div>

@endsection
