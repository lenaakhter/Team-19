<h1>Admin dashboard</h1>

<a href="/admin/addNewGame">Add new game to products list</a> <br><br>
<a href="/admin/allProducts">View all products available</a>
<br><br>

<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Product Description</th>
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
            <td>£{{ $user->price }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->isadmin }}</td>
        </tr>
        @endforeach

    </body>

    </body>
</table>
