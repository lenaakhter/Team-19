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
        <div class="game-box1">
                <a href="/products/{{ $product->productID }}">
                <img src="{{ $product->imageLocation }} " alt="image of game" height="250px" width="200px">
                <!-- <div class="overlapping"> -->
                    <div class="info2">
                        <p>
                            {{ $product->productName }} <br><br>
                            {{ $product->ageRating }} <br><br>
                            £{{ $product->price }} <br><br>
                        </p>
                    </div>
                <!-- </div> -->

            </a>
        </div>
        @endforeach
    </div>
    @else
    <div class="no-result">
        <div class="no-result-gif">
            <div class="result-space"></div>
            <h1>No Results Found :(</h1>
            <div class="result-space"></div>
            <a href="/products" class="submit-btn"> Back to Products Page</a>
        </div>
    </div>
    @endif
</div>
@endsection