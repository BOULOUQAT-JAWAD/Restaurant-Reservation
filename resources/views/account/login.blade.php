@extends('master.base')
@section('content')
    <form action="{{Route('account.check')}}" method="post">
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
                <center>
                    <table>
                        <tr>
                            <td>Email</td>
                            <td><input type="Email" name="Email" placeholder="Enter your Email ..."  value="{{old('Email')}}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span>@error('Email') {{$message}} @enderror</span><br></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" placeholder="Enter your password ..."></td>
                        </tr>
                        <tr><td colspan="2"><span>@error('password') {{$message}} @enderror</span><br></td></tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="signin" value="Sign In"></td> </tr>
                    </table>
                </center>
            </div>

            <div id="form-link"><a href="{{route('account.create')}}">Create an account</a></div>

        </div>
    </form>
</div>
@endsection
