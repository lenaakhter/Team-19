<div class="bg-image">
    @extends('layouts.main')
    @section('pageInfo')

    @if(session()->has('message'))
    <div class="alert alert-success" role="alert" id="go-to-basket">
        {{session()->get('message')}} <a href="/basket" class="alert-link">Go to Basket?</a>.
    </div>
    @endif

    @if(session()->has('stockerr'))
    <div class="alert alert-danger" role="alert" id="go-to-basket">
        {{session()->get('stockerr')}}
    </div>
    @endif

    <div class="item-contents">
        <div class="container-item">


            <div class="container-item-left" id="item-box">
                <div class="game-image">
                    <img src="{{ $item->imageLocation }} ">
                </div>
            </div>
            <div class="container-item-right" id="item-box">
                <div class="product-description">
                    <p>
                    <div class="item-title">
                        <h2>{{ $item->productName }}</h2>
                    </div>
                    <h5>Game Descripton</h5>
                    <p>{{ $item->productDescription }} </p><br>
                </div>

                <div class="product-info">

                    <div class="item-age-rating" id="item-row">
                        <h5>Age Rating</h5>
                        <h4>{{ $item->ageRating }}<h4>
                    </div>

                    <div class="item-price" id="item-row">
                        <h5>Price</h5>
                        <h4>£{{ $item->price }}<h4>
                    </div>

                    <div class="item-stock-count" id="item-row">
                        @if($item->stock == 0)
                        <h5>Sorry this game is out of stock</h5>
                        @else
                        <h5>In stock</h5>
                        @if($item->stock < 11) <p>only {{ $item->stock }} avaiable, Hurry up!</p>
                            @endif
                    </div>
                </div>
                <div class="select-quantity">
                    <form action="/basket" method="post">
                        @csrf
                        <h5>Select Quantity:</h5>
                        <select class="form-control" name="qty" id="quantity-box">
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
                        <input type="hidden" name="productID" value="{{$item->productID}}">
                        <button class="submit-btn">Add to basket</button>
                    </form>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div class="back-button">
        <a href="/products" onclick="hello()" class="btn btn-lg btn-secondary"
            style="color: #65b0ff; background-color:white">Back to Products</a>
    </div>
</div>


@endsection