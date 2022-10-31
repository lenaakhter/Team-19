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

<h1>Game is - {{ $item->productName }} {{ $item->platform }}</h1>

<div>
    <img src="{{ $item->productURL }} " alt="image"> 
    <p>
        {{ $item->productDescription }} <br><br>
        £{{ $item->price }}
        <button><a href="#">Add to basket</a></button> <br><br>
    </p>   
</div>

<button><a href="/products">Back to all games</a></button>
@endsection