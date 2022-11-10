<?php use App\Http\Controllers\ProductsController;
$sumOfItems= ProductsController::numOfItems() ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sarth</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/home.css">
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    </head>

    <div class="header">
        <a href="/" class="logo">Sarth</a>
        <div class="header-left">
            <a class="active" href="/">Home</a>
            <a href="/products">Products</a>
            <a href="/contact">Contact</a>
            

            
        </div>

        <!--             Basket for all Users                   -->
           @if(!(auth()->user()))  
        <div class = "header-right">
            <a href = "/userRegistration">Sign Up</a>
            <a href="/login">Login</a>
           
            
        </div>
        @else
        <div class = "header-right">

            <a href = "">{{Session::get('user')['name']}}</a>
            
            <a href = "/logout">Logout</a>
            <a href="/basket">Basket({{$sumOfItems}})</a>
            
        </div>

        @endif
       

        <!--        Basket for only logged in Users         -->

       <!-- @if(!(auth()->user()))
        <div class = "header-right">
            <a href = "/userRegistration">Sign Up</a>
            <a href="/login">Login</a>
            
        </div>
        @else
        <div class = "header-right">
            <a href="/basket">Basket({{$sumOfItems}})</a>

            <a href = "">{{Session::get('user')['name']}}</a>
            
            <a href = "/logout">Logout</a>
            
        </div>

        @endif-->


        
    </div> 

    <body>

    @yield('pageInfo')

    <footer>
    </footer>

    </body>

</html>
