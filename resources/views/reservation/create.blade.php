@extends('master.base')
@section('content')
    <h1>Make a new Reservation</h1>
    <form action="/reservation" method="post">
        @csrf
        <div class="account-form">

            <div class="session-msg">
                <p>
                    @if(Session::get('success'))
                        {{Session::get('success')}}
                    @endif
                </p>
            </div>

            <div class="form-table">
                <table>
                    <tr>
                        <td>First Name : </td>
                        <td><input type="text" name="FirstName" value="{{$clientData->FirstName}}"></td>
                    </tr>
                    <tr>
                        <td><span>@error('FirstName') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Last Name : </td>
                        <td><input type="text" name="LastName" value="{{$clientData->LastName}}"></td>
                    </tr>
                    <tr>
                        <td><span>@error('LastName') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Email : </td>
                        <td><input type="email" name="Email" value="{{$clientData->Email}}"></td>
                    </tr>
                    <tr>
                        <td><span>@error('Email') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Phone Number : </td>
                        <td><input type="tel" name="PhoneNumbre" value="{{$clientData->PhoneNumbre}}"></td>
                    </tr>
                    <tr>
                        <td><span>@error('PhoneNumbre') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Menu : </td>
                        <td>
                            <select  name="menu_id">
                                @foreach($categoryData as $var)
                                    <optgroup label="{{$var->name}}">
                                        @foreach($menuInfo as $m)
                                            @if($m->category_id === $var->id)
                                                <option value="{{$m->id}}">{{$m->name}}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </td>
                        <td><span>@error('menu_id') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Submit"></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
@endsection
