
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

    <div class = "login">
        <form method = "post">
        @csrf 
        <input type = "email" name = "email" placeholder="Your email"/><br>
        @error('email')
            {{ $message }}
            <br>
            @enderror
	        <input type="password" name="password" placeholder = "Password" /><br>
            @error('password')   
            {{ $message }}
            <br>
            @enderror
            <input type = "submit" value ="submit">

        </form>
    <div>
</div>
</body>



<!-- Login Form-->
@endsection
</html>