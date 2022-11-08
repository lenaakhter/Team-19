@extends('layouts.main')
@section('pageInfo') 
<div class="title">
    <h1>Sign Up</h1>
</div>
<div class = "Registration">
    <form action = "/userRegistration" method = "post">
        @csrf
        <input type="text" name="Fullname" placeholder="Your name"/><br>
        @error('Fullname')   
        {{$message}}
        <br>
        @enderror
        <input type="text" name="Username" placeholder = "Your Username"/><br>
        @error('Username')   
        {{$message}}
        <br>
        @enderror
        <input type = "email" name = "email" placeholder="Your email"/><br>
        @error('email')   
        {{$message}}
        <br>
        @enderror
	    <input type="password" name="password" placeholder = "Password" /><br>
        @error('password')   
        {{$message}}
        <br>
        @enderror
        <input type="password" name="password_confirmation" placeholder="Password again"/><br>
        @error('password_confirmation')   
        {{$message}}
        <br>
        @enderror
        <button type = "submit">Register</button>

        
    </form>
</div>
@endsection
