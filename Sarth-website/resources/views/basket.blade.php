@extends('layouts.main')

@section('pageInfo')

<div class="content">
@if(auth()->user()) 
    <div class="title">
    
        <h1>Your basket, {{Session::get('user')['name']}}</h1>

        <h3> Item has been added to {{Session::get('user')['email']}}'s Basket</h3>
       
    </div>
@else 
<div>
    
<h1>You are not logged in</h1>

<h3>Click here to <a href="/login">login</a></h3>

</div>
@endif
</div>

@endsection