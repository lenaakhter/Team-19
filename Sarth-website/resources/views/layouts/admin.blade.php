<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sarth</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css">
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    </head>
    <div class="header">
        <a href="/admin" class="logo">Admin Dashboard</a>
        <div class="header-left">
            <a class="active" href="/admin">View all users</a>
            <a href="/admin/addNewGame">Add new game to products list</a>
            <a href="/admin/allProducts">View all products available</a>
            <a href="/admin/orders">View orders placed</a>
        </div>
        <div class="header-right">
            <a href = "/logout">Logout</a>
        </div>        
    </div> 

    <body>

    @yield('page')

    <footer>
    </footer>

    </body>

</html>