<div class="bg-image">
@extends('layouts.main')

@section('pageInfo')
@if(session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session()->get('message')}} <a href="/basket" class="alert-link">Go to Basket?</a>.
</div>


@endif
<!-- <h1>{{ $item->productName }}</h1> -->

<!-- <div class="game-image">
    <img src="{{ $item->imageLocation }} " alt="game" height="500px" width="400px">
</div> -->


<div class="game-details">
    <div class="game-image">
        <img src="{{ $item->imageLocation }} " alt="game" height="500px" width="400px">
    </div>
    <!-- <img src="{{ $item->imageLocation }} " alt="game" height="500px" width="400px">  -->
    <div class="product-box">
        <div class="product-description">
        <!-- <div class="product-info"> -->
            <p>
                <h1>{{ $item->productName }}</h1>
                <h2>Game Descripton</h2>
                {{ $item->productDescription }} <br><br>
            </div>  
            <div class="product-info">
                <h2>Age Rating</h2>
                {{ $item->ageRating }} <br><br>
                <h2>Price</h2>
                £{{ $item->price }} <br><br>

                @if($item->stock == 0) 
                    <h2>Sorry this game is out of stock</h2>
                @else
                    <h2>In stock</h2> <br>
                    <form action="/basket" method = "post">
                    @csrf
                    <h3>Select Quantity:</h3>
                    <input type = "number" value = "1" min = "1" class= "form-control" name="qty"><br>
                    <input type="hidden" name = "productID" value = "{{$item->productID}}">
                    <button>Add to basket</button> <br><br>
                </form>
                @endif
            </p> 
        </div>     
    </div>
</div>

<div class=back-to-games>
    <button><a href="/products">Back to all games</a></button>  
</div>

@endsection