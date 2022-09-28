@extends( (session()->has('loggedAdmin')) ? 'master.adminbase' : 'master.base')
@section('content')
    <form action="{{route('account.store')}}" method="post">
        @csrf
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
                        <td><input type="text" name="FirstName" placeholder="Enter your First Name ..." value="{{old('FirstName')}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('FirstName') {{$message}} @enderror</span></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="LastName" placeholder="Enter your Last Name ..." value="{{old('LastName')}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('LastName') {{$message}} @enderror</span></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="Email" placeholder="Enter your email ..." value="{{old('Email')}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('Email') {{$message}} @enderror</span></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><input type="tel" name="PhoneNumbre" placeholder="Enter your phone number ..." value="{{old('PhoneNumbre')}}"></td>
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
                    @if(session()->has('loggedAdmin'))
                        <tr>
                            <td colspan="2"><input type="submit" name="signin" value="Create"></td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="2"><input type="submit" name="signin" value="Sign up"></td>
                        </tr>
                    @endif
                </table>
            </div>
            @if(!session()->has('loggedAdmin'))
                <div id="form-link"><a href="{{route('account.login')}}">i already have an acount, sign in</a></div>
            @endif
        </div>
    </form>
@endsection
