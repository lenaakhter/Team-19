@extends('layouts.main')

@section('pageInfo')

<h1>Game is - {{ $item->productName }} {{ $item->platform }}</h1>

<div>
    <img src="{{ $item->productURL }} " alt="game" height="250px" width="200px"> 
    <p>
        {{ $item->productDescription }} <br><br>
        £{{ $item->price }}
        <button><a href="#">Add to basket</a></button> <br><br>
    </p>   
</div>

<button><a href="/products">Back to all games</a></button>

@endsection