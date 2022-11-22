<?php use App\Http\Controllers\ProductsController;
$sumOfItems= ProductsController::numOfItems() ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&display=swap" rel="stylesheet">

    <title>Sarth</title>
</head>

<body>

<div class="bg-image">
    <div class="header">
        <a href="/" class="logo">Sarth</a>
        <div class="header-left">
            <a class="active" href="/">Home</a>
            <a href="/products">Products</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>

        </div>

        <!--             Basket for all Users                   -->
        @if(!(auth()->user()))
        <div class="header-right">
            <a href="/userRegistration">Sign Up</a>
            <a href="/login">Login</a>
            <a href="#" id="basket">Basket(0)</a>

        </div>
        @else
        <div class="header-right">

            <a href="/orders">{{Session::get('user')['name']}}</a>
            <a href="/logout">Logout</a>
            <a href="/basket">Basket({{$sumOfItems}})</a>

        </div>

        @endif


        <!--script to redirect non logged-in user to Login page if they click basket -->
        <script type="text/javascript">
        document.getElementById("basket").onclick = function() {
            alert("you need to log in to view the basket");
            location.href = "/login";
        };
        </script>

    </div>

    <body>
        @yield('pageInfo')
    </body>

    <footer>
        <div class="foot-bg">
            <h2>Sarth</h2>
            <a class="active" href="/">Home</a>
            <a href="/products">Products</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>

        </div>
    </footer>

</div>

</html>