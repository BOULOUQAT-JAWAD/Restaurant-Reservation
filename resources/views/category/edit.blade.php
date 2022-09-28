@extends('master.adminbase')
@section('content')
    <form action="/category/{{$info->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                        <td>Name : </td>
                        <td><input type="text" name="name" value="{{$info->name}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('name') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Image : </td>
                        <td><input type="file" name="image_path" value="{{$info->image_path}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('image_path') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="EDIT"></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
@endsection
