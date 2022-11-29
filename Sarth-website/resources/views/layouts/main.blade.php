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
    <link rel="icon" type="image/x-icon" href="images/sarthicon.ico">

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
        <a href="/basket" id="basket">Basket({{$sumOfItems}})</a>

    </div>
    @else
    <div class="header-right">

        <a href="#">{{Session::get('user')['name']}}</a>
        <a href="/orders">Your previous orders</a>
        <a href="/logout">Logout</a>
        <a href="/basket">Basket({{$sumOfItems}})</a>

    </div>

    @endif


   <!--
    <script type="text/javascript">
    document.getElementById("basket").onclick = function() {
        alert("you need to log in to view the basket");
        location.href = "/login";
    };
    </script> -->

</div>

<body>
    @yield('pageInfo')
</body>

<footer>
    <div class="footer">
        <br>
        <br>
        <div class="footer-content">
            <div class="footer-section-about" id="foot-content-box">
                <a href="/" class="logo"><img src="images/sarthgaming.png" alt="" /></a>
                <p>Welcome to Sarth Gaming!</br>
                    Here at Sarth we strive to deliver the latest 
                    and trendiest games to our users. From young teens
                    to our older generations, there will be a game 
                    for you at Sarth Gaming Store. </p>
            </div>
            <div class="footer-section-links" id="foot-content-box">
            @if(!(auth()->user()))
                <a class="active" href="/">Home</a><br>
                <a href="/products">Products</a><br>
                <a href="/about">About</a><br>
                <a href="/contact">Contact</a><br>
                <br>
                <a href="/userRegistration">Sign Up</a><br>
                <a href="/login">Login</a><br>
            @else
                <a class="active" href="/">Home</a><br>
                <a href="/products">Products</a><br>
                <a href="/about">About</a><br>
                <a href="/contact">Contact</a><br>
                <br>
                <a href="/basket">Basket({{$sumOfItems}})</a><br>
                <a href="/logout">Logout</a>
            @endif
            </div>
            <div class="footer-section-newsletter" id="foot-content-box">
                <form action="">
                    <div class="footer-container">
                        <h3>Subscribe to our Newsletter</h3>
                    </div>

                    <div class="footer-container">
                        <input type="text" placeholder="Name" name="name" required>
                        <input type="text" placeholder="Email address" name="mail" required><br>
                        <label>
                            <input type="checkbox" checked="checked" name="subscribe"> Weekly Newsletter
                        </label>

                    </div>
                    <br>
                    <div class="footer-container">
                        <input type="submit" value="Subscribe">
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>



</html>
