@extends('master.adminbase')
@section('content')
    <style>
        #space{margin-top: 130px;}
    </style>
    <div id="space"></div>

    <div  class="reservation-title">
        <h1>Today's reservation</h1>
    </div>
@if(empty($info))
    <div  class="reservation-title">
        <h1>No reservation yet</h1>
    </div>
@else
        <table class="presentation-table">
            <tr>
                <th colspan="4">Account</th>
                <th colspan="4">menu</th>
                <th>date</th>
            </tr>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Phonenumber</th>
                <th>Image</th>
                <th>menu's name</th>
                <th>menu's price</th>
                <th>description</th>
            </tr>
            @foreach($info as $var)
            <tr>
                @foreach($clientInfo as $CI)
                    @if($CI->id === $var->account_id)
                        <td>{{$CI->FirstName}}</td>
                        <td>{{$CI->LastName}}</td>
                        <td>{{$CI->Email}}</td>
                        <td>{{$CI->PhoneNumbre}}</td>
                    @endif
                @endforeach

                @foreach($menuInfo as $MI)
                    @if($MI->id === $var->menu_id)
                        <td><img width="100px" src="{{asset('images/'.$MI->image_path)}}"></td>
                            <td>{{$MI->name}}</td>
                            <td>{{$MI->price}}$</td>
                            <td>{{$MI->description}}</td>
                    @endif
                @endforeach
                <td>{{$var->date}}</td>
            @endforeach
            </tr>
        </table>
@endif
@endsection
