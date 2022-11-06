@extends('layouts.main')

@section('pageInfo') 

<div class="title">
    <h1>List of all games</h1>
</div>

<div class="games">
    @foreach($products as $product)
        <div class="game">
            <a href="/products/{{ $product->id }}">    
                <img src="{{ $product->productURL }} " alt="image of game" height="250px" width="200px"> 
                <p>
                    {{ $product->productName }} - {{ $product->platform }} <br><br>
                    £{{ $product->price }}
                </p>
                <button><a href="#">Add to basket</a></button> <br><br>
            </a>  
        </div>
    @endforeach
</div>

@endsection
