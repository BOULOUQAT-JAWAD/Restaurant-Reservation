@extends('master.adminbase')
@section('content')
    <form action="{{Route('admin.check')}}" method="post">
        @csrf
        <div class="account-form">

            <div class="session-msg">
                <p>
                    @if(Session::get('fail'))
                        {{Session::get('fail')}}
                    @endif
                </p>
            </div>

            <div class="form-table">
                <table>
                    <tr>
                        <td>UserName</td>
                        <td><input type="username" name="username" placeholder="Enter your username ..."  value="{{old('username')}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('username') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Enter your password ..."></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('password') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr><td align="center" colspan="2"><input type="submit" name="signin" value="Sign In"></td> </tr>
                </table>
            </div>
        </div>
    </form>
@endsection
