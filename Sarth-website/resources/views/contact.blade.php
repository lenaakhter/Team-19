@extends('layouts.main')

@section('pageInfo')

<!--
<!DOCTYPE html>
<html> 
<head> 
    <meta charset="utf-8">
    <meta name="view port" content="width=device-width, initial-scale-1">
    <title> Contact Us</title>
    <link rel="stylesheet" type="text/css" href="/css/contact.css">

    <link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c2e7142f29.js" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        body{
        background-image: url('https://cdn.cloudflare.steamstatic.com/steam/apps/261570/ss_0063145dccd0cb165aa7d47d9ac6623445c7ad4c.1920x1080.jpg?t=1590605540');
        background-size: cover;
        }
    </style>

    -->

<!-- <nav class="navbar-expand-md flex-md-row justify-content-between"
style="align-items: center; display: flex;height: 80px; background-color: rgb(25, 0, 54, 0.6); padding-left: 10rem; padding-right: 10rem;">
<a href="#">
    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="d-block mx-auto">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
        <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
        <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
        <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
        <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
        <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
    </svg>
</a>


<div id="main-navigation">
    <ul class="navbar-nav">
        <li class = "nav-item py-2">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class = "nav-item py-2">
            <a class="nav-link" href="#">Products</a>
        </li>
        <li class = "nav-item py-2">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class = "nav-item py-2">
            <a class="nav-link" href="#">Contact</a>
        </li>
    </ul>
</div>

<div class="nav navbar-nav">
    <li><a href="#">Sign Up</a></li>
</div>
</nav> -->

<section class="contact" style="width:100% ;">
    <div class="box" style="width:70% ;">
        <div class="info">
            <div class="box1">
                <div class="symbol"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                <div class=" text">
                    <h3> Address</h3>
                    <p style="color:white"> Aston St,<br>Birmingham,<br>B4 7ET</p>
                </div>
            </div>
            <div class="box1">
                <div class="symbol"><i class="fa fa-phone" aria-hidden="true"></i></div>
                <div class=" text">
                    <h3>Phone</h3>
                    <p style="color:white">0121 204 3000</p>
                </div>
            </div>
            <div class="box1">
                <div class="symbol"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                <div class=" text">
                    <h3>Email</h3>
                    <p style="color:white">hello@aston.ac.uk</p>
                </div>
            </div>
        </div>
    </div>
    <div class="form1">
        <h1>Contact <span>Us</span></h1>
        <p>Here is som random text to do with the sarth website. I want to see
            how it looks like and will change the text to something usefull later</p>
        <form action="">
            <input type="" placeholder="Name..." required>
            <input type="email" name="email" placeholder="Email..." required>
            <input type="" placeholder="Subject..." required>
            <input type="text" name="" id="messagetext" placeholder="Your Message..." required>

            </input>
            <input type="submit" name="" value="Submit" class="button">
        </form>
    </div>

</section>






@endsection