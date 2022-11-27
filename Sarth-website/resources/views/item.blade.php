<div class="bg-image">
@extends('layouts.main')

@section('pageInfo')
@if(session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session()->get('message')}} <a href="/basket" class="alert-link">Go to Basket?</a>.
</div>
@endif

@if(session()->has('stockerr'))
<div class="alert alert-danger" role="alert">
    {{session()->get('stockerr')}}
</div>
@endif

<!-- <h1>{{ $item->productName }}</h1> -->


<div class="game-details">
    <div class="game-image">
        <img src="{{ $item->imageLocation }} " alt="game" height="500px" width="400px">
    </div>
    <div class="product-box-des">
        <div class="product-description">
                <p>
                <h1>{{ $item->productName }}</h1>
                <h2>Game Descripton</h2>
                    {{ $item->productDescription }} <br><br>
        </div>
    </div>
    <div class="product-info">
            <h2>Age Rating</h2>
            {{ $item->ageRating }} <br><br>
            <h2>Price</h2>
            £{{ $item->price }} <br><br>

            @if($item->stock == 0)
                <h2>Sorry this game is out of stock</h2>
            @else
                <h2>In stock</h2> 
                <p>Available: {{ $item->stock }}</p><br>
                <form action="/basket" method = "post">
                @csrf
                <h3>Select Quantity:</h3>
                <select class= "form-control" name="qty">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <br><br>

                <input type="hidden" name = "productID" value = "{{$item->productID}}">
                <button>Add to basket</button> <br><br>
            </form>
            @endif
        </p>
    </div>
</div>


<button><a href="/products">Back to all games</a></button>

@endsection
