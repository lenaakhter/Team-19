@extends('layouts.main')

@section('pageInfo')

<h1>Game is - {{ $item->productName }}</h1>

<div>
    <img src="{{ $item->imageLocation }} " alt="game" height="250px" width="200px"> 
    <p>
        {{ $item->productDescription }} <br><br>
        {{ $item->ageRating }} <br><br>
        £{{ $item->price }}
        <button><a href="#">Add to basket</a></button> <br><br>
    </p>   
</div>

<button><a href="/products">Back to all games</a></button>

@endsection