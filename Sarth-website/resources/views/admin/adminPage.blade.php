<div class="bg-admin">

    @extends('layouts.admin')
    @section('page')

    <div class="admin-tables">
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
                        <a href = "admin/status/{{$user->id}}/{{$user->isadmin}}">
                        <button type =  "button" class="toggler-table-button">
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
        <div="space1"></div>
    </div>

</div>

@endsection