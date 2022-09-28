@extends('master.adminbase')
@section('content')
<center>
    <div class="table-sapce">
        <table class="presentation-table">
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Phonenumber</th>
                <th></th>
                @if(session()->has('loggedAdmin'))
                    <th><div class="add-section"><a class="add-button" href="account/create">ADD</a></div></th>
                @endif
                <th></th>
            </tr>
            @foreach($info as $a)
                <tr>
                    <td>{{$a->FirstName}}</td>
                    <td>{{$a->LastName}}</td>
                    <td>{{$a->Email}}</td>
                    <td>{{$a->PhoneNumbre}}</td>
                    <td><a class="button" href="account/{{$a->id}}/edit">Edit</a></td>
                    <td><a class="button" href="account/{{$a->id}}">Show</a></td>
                    <td>
                        <form action="/account/{{$a->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="button" type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</center>
@endsection
