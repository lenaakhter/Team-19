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
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&display=swap" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/c2e7142f29.js" crossorigin="anonymous"></script>


    <title>Sarth</title>
    <link rel="icon" type="image/x-icon" href="/images/sarthgaming.png">

</head>

<div class="header" id="header">
    <a href="/" class="logo"><img src="images/sarthgaming.png" alt="" /></a>
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
    <div class="footer">
        <div class="footer-content">
            <div class="footer-section-about"></div>
            <a href="/" class="logo"><img src="images/sarthgaming.png" alt="" /></a>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</br> 
                Quisque bibendum ante quis nisi tincidunt malesuada. </br>
                Ut rutrum augue ac tortor suscipit hendrerit quis vel orci.</br>
                Praesent ac ipsum at nibh volutpat consequat. Nulla rhoncus </br>
                tellus ut libero viverra, in laoreet orci egestas. In volutpat ante </br>
                id purus iaculis, quis faucibus diam consequat.</p>
            <div class="footer-section-links"></div>
            <div class="footer-section-newsletter"></div>

            <!--
            <a href="/" class="logo"><img src="images/sarthgaming.png" alt="" /></a>
            <a class="active" href="/">Home</a>
            <a href="/products">Products</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            -->
        </div>

    </div>
</footer>



</html>