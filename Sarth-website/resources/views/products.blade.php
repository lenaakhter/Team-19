@extends('layouts.main')

@section('pageInfo') 

<div class="title">
    <h1>List of all games</h1>
</div>

<div class="games">
    @foreach($products as $product)
        <div class="game">
            <a href="/products/{{ $product->productID }}">    
                <img src="{{ $product->imageLocation }} " alt="image of game" height="250px" width="200px"> 
                <p>
                    {{ $product->productName }} <br><br>
                    {{ $product->ageRating }} <br><br>
                    £{{ $product->price }} <br><br>
                </p>
            </a>  
        </div>
    @endforeach
</div>

@endsection


<style>
.game{
    border-style: solid;
  border-color: black;
  background-color: #E5FCE6 ;

}
    </style>