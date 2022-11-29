<div class="product-gif">

 @extends('layouts.main')
 @section('pageInfo')
     
    <div class="gradient">     
        <div class="container">
                <div class="title">
                    <h1>Latest Games</h1>
                </div>
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="search">
                            <form type="get" action="{{ url('/search') }}" class="form5">
                                <input type="text" name="query" class="form-control" placeholder="Search for games">
                                <button class="btn btn-primary" type="submit"> <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <br>  
            </div>
        <div class="games">
            @foreach($products as $product)
            <div class = "game-box">
                <div class="game">
                    <a href="/products/{{ $product->productID }}">
                        <img src="{{ $product->imageLocation }} " alt="image of game" height="350px" width="330px">
                        <div class="overlap">
                            <div class="info3">
                                <p>
                                    <div class="product-name">
                                        <h2>{{ $product->productName }}</h2> <br>
                                    </div>
                                    <div class="product-age">
                                        <h3> {{ $product->ageRating }} </h3>
                                        <h3>{{ $product->price }} </h3> <br>
                                    </div>  
                                    
                                    @if($product->stock == 0)
                                    <p>Out of stock</p>
                                    @else
                                    <p>In stock</p>
                                    <p>Available: {{ $product->stock }}</p>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>  
            @endforeach
        </div>
    </div>
@endsection