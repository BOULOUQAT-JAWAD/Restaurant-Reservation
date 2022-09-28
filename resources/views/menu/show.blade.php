@extends('master.adminbase')
@section('content')
    <div class="table-sapce">
        <table class="presentation-table">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th colspan="2">Actions</th>
            </tr>
            <tr>
                <td><img width="100px" src="{{asset('images/'.$menu->image_path)}}" alt="{{$menu->name}}"></td>
                <td>{{$menu->name}}</td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->price}}$</td>
                <td><a class="button" href="/menu/{{$menu->id}}/edit">Edit</a></td>
                <td>
                    <form action="/menu/{{$menu->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="button" type="submit" value="DELETE">
                    </form>
                </td>
            </tr>
        </table>
    </div>
@endsection
