@extends('layouts.main')

@section('pageInfo')
@if(session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session()->get('message')}} <a href="/basket" class="alert-link">Go to Basket?</a>.
</div>


@endif
<h1>{{ $item->productName }}</h1>


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
            <form action="/basket" method = "post">
                @csrf

                <input type = "number" value = "1" min = "1" class= "form-control" name="qty">
                <input type="hidden" name = "productID" value = "{{$item->productID}}">
                <button>Add to basket</button> <br><br>
            </form>
        </p> 
    </div>     
</div>


<button><a href="/products">Back to all games</a></button>

@endsection