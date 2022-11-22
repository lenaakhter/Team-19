@extends('layouts.admin')

@section('page')
<div class="admin-table1">
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Are they a admin?</th>
            </tr>
        </thead>

        <body>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
                <td>
                    @if($user->isadmin)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            @endforeach
        </body>
    </table>
</div>

@endsection