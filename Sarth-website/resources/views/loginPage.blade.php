@extends('layouts.main')
@section('pageInfo') 
<div class = "title-right">
    <h1>Login</h1>
</div>
<!-- Login Form-->

<div class = "login">
    <form method = "post">
        @csrf 
        <input type = "email" name = "email" placeholder="Your email"/><br>
        <input type="password" name="password" placeholder = "Password" /><br>
        <input type = "submit" value ="submit">

    </form>
<div>
<br>
<br>

<!-- Login Form-->
@endsection
