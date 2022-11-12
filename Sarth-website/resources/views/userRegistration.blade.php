<div class ="bg-image-login">

@extends('layouts.main')
<!DOCTYPE html>
<html lang="en>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/home.css">
</head>

<body>
@section('pageInfo') 
<div class="title">
    <h1>Sign Up</h1>
</div>
<div class = "Registration" id= "signup-page">
<div class= "form-box">
            <div class= "buttons-accounts">
                <div id="btn"></div>
                <button
                type= "button" onclick=window.location.href="/login" class="toggle-btn" id="non-select"> Log In </button>
                <button
                type= "button" onclick=window.location.href="/userRegistration" class="toggle-btn" id="select">Sign Up</button>
            </div>
    <form action = "/userRegistration" method = "post" class="signin-inputs">
        @csrf
        <input type="text" name="Fullname" placeholder="Your name" class= "input-field2"/><br>
        @error('Fullname')   
        {{$message}}
        <br>
        @enderror
        <input type="text" name="Username" placeholder = "Your Username" class="input-field2"/><br>
        @error('Username')   
        {{$message}}
        <br>
        @enderror
        <input type = "email" name = "email" placeholder="Your email" class="input-field2"/><br>
        @error('email')   
        {{$message}}
        <br>
        @enderror
	    <input type="password" name="password" placeholder = "Password" class="input-field2"/><br>
        @error('password')   
        {{$message}}
        <br>
        @enderror
        <input type="password" name="password_confirmation" placeholder="Password again" class="input-field2"/><br>
        @error('password_confirmation')   
        {{$message}}
        <br>
        @enderror
        <button type = "submit" class="reg-btn">Register</button>

        
    </form>
</div>
</div>
@endsection
</body>
</html>