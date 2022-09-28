@extends( (session()->has('loggedAdmin')) ? 'master.adminbase' : 'master.base')
@section('content')
    <div class="menu">
            <div class="meal {{$info->name}}">
                <div><a href="/category/{{$info->id}}">{{$info->name}}</a></div>
            </div>
            <style>
                .{{$info->name}}{
                    background-image: url("{{'../images/'.$info->image_path}}");
                }
            </style>
    </div>
    <center>
        <div  class="menu-title">
            <h1>Menus</h1>
        </div>
        <table class="presentation-table">
            <tr>
                <th>Image </th>
                <th>Name </th>
                <th>Description </th>
                <th>Price </th>
                @if(session()->has('loggedAdmin'))
                    <th></th>
                    <th><div class="add-section"><a class="add-button" href="/menu/create">ADD</a></div></th>
                    <th></th>
                @endif
            </tr>
            @foreach($menu as $var)
                <tr>
                    <td><img width="100px" src="{{asset('images/'.$var->image_path)}}" alt="{{$var->name}}"></td>
                    <td>{{$var->name}}</td>
                    <td>{{$var->description}}</td>
                    <td>{{$var->price}}$</td>
                    @if(session()->has('loggedAdmin'))
                        <td><a class="button" href="/menu/{{$var->id}}">Show</a></td>
                        <td><a class="button" href="/menu/{{$var->id}}/edit">Edit</a></td>
                        <td>
                            <form action="/menu/{{$var->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="button" type="submit" value="DELETE">
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </center>

@endsection
