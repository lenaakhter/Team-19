<div class="bg-image">
    @extends('layouts.main')

    @section('pageInfo')
    <br>
    <br>
    <div class="games-result">
        @if(count($products) >0)
        <h1>Search Results</h1>
        <br>
        @foreach($products as $product)
        <div class="game-content">
            <a href="/products/{{ $product->productID }}">
                <img src="{{ $product->imageLocation }} " alt="image of game" height="250px" width="200px">

                <div class="info">
                    <p>
                        {{ $product->productName }} <br><br>
                        {{ $product->ageRating }} <br><br>
                        £{{ $product->price }} <br><br>
                    </p>
                </div>

            </a>
        </div>
        @endforeach
    </div>
    @else
    <h1>No Results Found :(</h1>
    <a href="/products"> Back to Products Page</a>
    @endif

    <br>
    <br>
</div>
@endsection