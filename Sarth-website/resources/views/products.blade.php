@extends('layouts.main')

@section('pageInfo') 

<div class="header">
    <a href="/" class="logo">Sarth</a>
    <div class="header-right">
        <a class="active" href="/">Home</a>
        <a href="/products">Products</a>
        <a href="/contact">Contact</a>
    </div>
</div> 

<div class="content">
    <div class="title">
        <h1>List of all games</h1>
    </div>

    @foreach($products as $product)
        <div>
            <a href="/products/{{ $product->id }}">    
                <img src="{{ $product->productURL }} " alt="imageOfGame"> 
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
