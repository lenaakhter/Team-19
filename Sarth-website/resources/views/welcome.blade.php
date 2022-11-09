@extends('layouts.main')

@section('pageInfo')
    
<div class="content">
    <div class="title">
        <h1>About us, what we sell</h1>
    </div>
</div>

<!-- Login Form-->

<div class = "login">
    <form method = "post">
@csrf 
    <input type = "email" name = "email" placeholder="Your email"/><br>
    <input type="password" name="password" placeholder = "Password" /><br>
    <input type = "submit" value ="submit">

</form>
<br>
<br>
<a href = "/logout"> Logout</a>
<!-- Login Form-->
@endsection

