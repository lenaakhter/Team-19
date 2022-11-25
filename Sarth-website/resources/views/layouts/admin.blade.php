<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&display=swap" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>


    <title>Sarth</title>
    <link rel="icon" type="image/x-icon" href="images/sarthicon.ico">

</head>

<div class="header">
    <a href="/admin" class="logo2">Admin Dashboard</a>
    <div class="header-left">
        <a class="active" href="/admin">View all users</a>
        <a href="/admin/addNewGame">Add new game to products list</a>
        <a href="/admin/allProducts">View all products available</a>
        <a href="/admin/orders">View orders placed</a>
    </div>
    <div class="header-right">
        <a href="/logout">Logout</a>
    </div>
</div>

<body>

    @yield('page')

</body>

<footer>
    <div class="footer">
        <br>
        <br>
        <div class="footer-content">
            <div class="footer-section-about">
                <h4>Admin Features!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</br>
                    Quisque bibendum ante quis nisi tincidunt malesuada. </br>
                    Ut rutrum augue ac tortor suscipit hendrerit quis vel orci.</br>
                    Praesent ac ipsum at nibh volutpat consequat. Nulla rhoncus </br>
                    tellus ut libero viverra, in laoreet orci egestas. In volutpat ante </br>
                    id purus iaculis, quis faucibus diam consequat.</p>
            </div>
            <div class="footer-section-info">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</br>
                    Quisque bibendum ante quis nisi tincidunt malesuada. </br>
                    Ut rutrum augue ac tortor suscipit hendrerit quis vel orci.</br>
                    Praesent ac ipsum at nibh volutpat consequat. Nulla rhoncus </br>
                    tellus ut libero viverra, in laoreet orci egestas. In volutpat ante </br>
                    id purus iaculis, quis faucibus diam consequat.</p>
            </div>
            <div class="footer-section-links">
                <a class="active" href="/">Home</a><br>
                <a href="/products">Products</a><br>
                <a href="/about">About</a><br>
                <a href="/contact">Contact</a><br>
                <br>
                <a href="/userRegistration">Sign Up</a><br>
                <a href="/login">Login</a><br>
            </div>
        </div>
    </div>
</footer>



</html>