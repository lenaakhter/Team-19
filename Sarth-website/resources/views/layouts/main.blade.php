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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/c2e7142f29.js" crossorigin="anonymous"></script>


    <title>Sarth</title>
    <link rel="icon" type="image/x-icon" href="images/sarthicon.ico">

</head>

<div class="header" id="header">
    <a href="/" class="logo"><img src="data:image/png;base64,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" alt="" /></a>
    <div class="header-left">
        <a class="active" href="/" id="hoverable">Home</a>
        <a href="/products" id="hoverable">Products</a>
        <a href="/about" id="hoverable">About</a>
        <a href="/contact" id="hoverable">Contact</a>

    </div>

    <!--             Basket for all Users                   -->
    @if(!(auth()->user()))
    <div class="header-right">
        <!-- <div class="dropdown">
            <button class="dropbtn">
              <i class="fa-solid fa-user"></i>
            </button>
            <div class="dropdown-content">
              <a href="/userRegistration">Sign Up</a>
              <a href="/login">Log In</a>
            </div>
        </div> -->
        <a href="/userRegistration" id="hoverable">Sign Up</a>
        <a href="/login" id="hoverable">Login</a>
        <!-- <a href="/basket" id="basket">Basket({{$sumOfItems}})</a> -->
        <a href="/basket" id="hoverable"><i class="fas fa-shopping-cart"></i> {{$sumOfItems}}</a>

    </div>
    @else
    <div class="header-right">

        <a href="#">{{Session::get('user')['name']}}</a>
        <a href="/orders" id="hoverable">Your previous orders</a>
        <a href="/logout" id="hoverable">Logout</a>
        <a href="/basket" id="hoverable"><i class="fas fa-shopping-cart"></i> {{$sumOfItems}}</a>
        <!-- <a href="/basket">Basket({{$sumOfItems}})</a> -->


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
                <a href="/" class="logo"><img src="data:image/png;base64,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" alt="" /></a>
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
                        <input type="submit" value="Subscribe" onclick="return confirm('You are now subscribed to our newsletter')">
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>



</html>
