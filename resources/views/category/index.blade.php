@extends( (session()->has('loggedAdmin')) ? 'master.adminbase' : 'master.base')
@section('content')
{{-- Admin Access--}}
@if(session()->has('loggedAdmin'))
    <style>
        #space{margin-top: 130px;}
    </style>
    <div id="space"></div>
            <table class="presentation-table">
                <tr>
                    <td>ID</td>
                    <th>Name</th>
                    <th>Image</th>
                    <th></th>
                    <th><div class="add-section"><a class="add-button" href="/category/create">Add</a></div></th>
                    <th></th>
                </tr>
                @foreach($info as $var)
                <tr>
                    <td>{{$var->id}}</td>
                    <td>{{$var->name}}</td>
                    <td><img width="88px" src="{{asset('images/'.$var->image_path)}}"></td>
                    <td><a class="button" href="/category/{{$var->id}}">Show</a></td>
                    <td><a class="button" href="/category/{{$var->id}}/edit">Edit</a></td>
                    <td>
                        <form action="/category/{{$var->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="button" type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
@else
    <div class="menu">
        @foreach($info as $var)
            <div class="meal {{$var->name}}">
                <div><a href="/category/{{$var->id}}">{{$var->name}}</a></div>
            </div>
            <style>
                .{{$var->name}}{
                    background-image: url("{{'../images/'.$var->image_path}}");
                }
            </style>
        @endforeach
    </div>
@endif
@endsection
