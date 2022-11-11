
<div class ="bg-image-login">

@extends('layouts.main')
<!DOCTYPE html>
<html lang="en>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/home.css">
</head>

@section('pageInfo') 
<body>
    <div class = "title-right">
        <h1>Login</h1>
    </div>
    <!-- Login Form-->

    <div class = "login" id="login-page">
        <div class= "form-box">
            <div class= "buttons-accounts">
                <div id="btn"></div>
                <button
                type= "button" onclick=window.location.href="/login" class="toggle-btn"> Log In </button>
                <button
                type= "button" onclick=window.location.href="/userRegistration" class="toggle-btn">Sign Up</button>
            </div>
            </div>
            <form method = "post" class="login-inputs">
            @csrf 
            <input type = "email" name = "email" placeholder="Your email" class="input-field"/><br>
            @error('email')
                {{ $message }}
                <br>
                @enderror
	            <input type="password" name="password" placeholder = "Password" class="input-field"/><br>
                @error('password')   
                {{ $message }}
                <br>
                @enderror
                <input type = "submit" value ="submit" class= "submit-btn">
        </div>
        </form>
    <div>
</div>
</body>



<!-- Login Form-->
@endsection
</html>