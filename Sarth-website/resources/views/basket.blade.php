@extends('layouts.main')

@section('pageInfo')

<div class="content">
@if(auth()->user()) 
    <div class="title">
    
        <h1>Your basket, {{Session::get('user')['name']}}</h1>
       
    </div>
@else 
<div>
    
<h1> User not logged in</h1>
</div>
@endif
</div>


<h3> Item has been added to {{Session::get('user')['email']}}'s Basket</h3>
@endsection