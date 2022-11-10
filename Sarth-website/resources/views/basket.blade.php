@extends('layouts.main')

@section('pageInfo')

<div class="content">
    <div class="title">
        <h1>Your basket, {{Session::get('user')['name']}}</h1>
    </div>
</div>

<h3> Item has been added to {{Session::get('user')['email']}}'s Basket</h3>
@endsection