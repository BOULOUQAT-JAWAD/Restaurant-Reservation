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
                    <th colspan="2">Actions</th>
                </tr>
                <tr>
                    <td>{{$info->FirstName}}</td>
                    <td>{{$info->LastName}}</td>
                    <td>{{$info->Email}}</td>
                    <td>{{$info->PhoneNumbre}}</td>
                    <td><a class="button" href="/account/{{$info->id}}/edit">Edit</a></td>
                    <td>
                        <form action="/account/{{$info->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="button" type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
        </table>
    </div>
</center>
@endsection
