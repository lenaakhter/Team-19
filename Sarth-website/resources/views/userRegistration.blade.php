@extends('layouts.main')
@section('pageInfo') 
<div class="title">
    <h1>Sign Up</h1>
</div>
<div class = "Registration">
    <form action = "/userRegistration" method = "post">
        @csrf
        <input type="text" name="Full name" placeholder="Your name"/><br>
        <input type="text" name="Username" placeholder = "Your Username"/><br>
        <input type = "email" name = "email" placeholder="Your email"/><br>
	    <input type="password" name="password" placeholder = "Password" /><br>
        <input type="password" name="password_confirmation" placeholder="Password again"/><br>
        <button type = "submit">Register</button>

        
    </form>
</div>
@endsection
