@extends('master.adminbase')
@section('content')
<center>
    <form action="/account/{{$info->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="account-form">

            <div class="session-msg">
                <p>
                @if(Session::get('success'))
                    {{Session::get('success')}}
                @elseif(Session::get('fail'))
                    {{Session::get('fail')}}
                @endif
                </p>
                <br>
            </div>
            <div class="form-table">
                <table>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="FirstName" placeholder="Enter your First Name ..." value="{{$info->FirstName}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('FirstName') {{$message}} @enderror</span></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="LastName" placeholder="Enter your Last Name ..." value="{{$info->LastName}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('LastName') {{$message}} @enderror</span></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="Email" placeholder="Enter your email ..." value="{{$info->Email}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('Email') {{$message}} @enderror</span></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><input type="tel" name="PhoneNumbre" placeholder="Enter your phone number ..." value="{{$info->PhoneNumbre}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('PhoneNumbre') {{$message}} @enderror</span></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Enter your password ..."></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('password') {{$message}} @enderror</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="edit" value="Edit"></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</center>
@endsection
