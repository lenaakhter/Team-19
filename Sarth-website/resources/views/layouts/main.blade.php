<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sarth</title>

        <link rel="stylesheet" href="/css/home.css">
    </head>

    <div class="header">
        <a href="/" class="logo">Sarth</a>
        <div class="header-right">
            <a class="active" href="/">Home</a>
            <a href="/products">Products</a>
            <a href="/contact">Contact</a>
            <a href="/Basket">Basket</a>  
        </div>
    </div> 

    <body>

    @yield('pageInfo')

    <footer>
    </footer>

    </body>

</html>
