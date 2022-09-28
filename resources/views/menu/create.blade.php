@extends('master.adminbase')
@section('content')
    <h1>Create a new category</h1>
    <form action="/menu" method="post" enctype="multipart/form-data">
        @csrf
        <div class="account-form">

            <div class="session-msg">
                <p>
                    @if(Session::get('success'))
                        {{Session::get('success')}}
                    @endif
                </p>
                <br>
            </div>
            <div class="form-table">
                <table>
                    <tr>
                        <td>Name : </td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('name') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Description : </td>
                        <td><input type="text" name="description"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('description') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Price : </td>
                        <td><input type="number" name="price"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('price') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Category(id) : </td>
                        <td>
                            <select  name="category_id">
                                @foreach($categoryData as $var)
                                <option value="{{$var->id}}">{{$var->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('category_id') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td>Image : </td>
                        <td><input type="file" name="image_path"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>@error('image_path') {{$message}} @enderror</span><br></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Create"></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
@endsection
