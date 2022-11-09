@extends('layouts.main')

@section('pageInfo')

<h1>Game is - {{ $item->productName }}</h1>


<div class="game-details">
    <img src="{{ $item->imageLocation }} " alt="game" height="500px" width="400px"> 
    <div>
        <p>
            <h2>Game Descripton</h2>
            {{ $item->productDescription }} <br><br>
            <h2>Age Rating</h2>
            {{ $item->ageRating }} <br><br>
            <h2>Price</h2>
            £{{ $item->price }} <br><br>
            <button><a href="#">Add to basket</a></button> <br><br>
        </p> 
    </div>     
</div>


<button><a href="/products">Back to all games</a></button>

@endsection