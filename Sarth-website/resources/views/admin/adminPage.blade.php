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
                    <th>Are they an admin?</th>
                </tr>
            </thead>

            <body>
                @foreach($users as $user)
                @if( Auth::id() !=  $user->id )
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        <a href = "admin/status/{{$user->id}}/{{$user->isadmin}}">
                        <button type =  "button" class="submit-btn">
                        @if($user->isadmin)
                        Yes
                        @else
                        No
                        @endif
                        </button>
                        </a>
                        
                    </td>
                </tr>
                @endif
                @endforeach
            </body>
        </table>
        <div="space1"></div>
    </div>

</div>

@endsection