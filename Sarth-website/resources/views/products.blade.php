<div class = "bg-image">
 @extends('layouts.main')
 @section('pageInfo')

  <div class="title">
      <h1>List of all games</h1>
  </div>

  <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="search">
                    <form type="get" action="{{ url('/search') }}">
                        <input type="text" name="query" class="form-control" placeholder="Search for games">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>

</div>
    <div class="gradient">
        <div class="games">
            @foreach($products as $product)
            <div class="game">
                <a href="/products/{{ $product->productID }}">
                    <img src="{{ $product->imageLocation }} " alt="image of game" height="350px" width="330px">
                    <div class="overlap">
                        <div class="info">
                            <p>
                                {{ $product->productName }} <br><br>
                                {{ $product->ageRating }} <br><br>
                                £{{ $product->price }} <br><br>

                                @if($product->stock == 0)
                            <h2>Out of stock</h2>
                            @else
                            <h2>In stock</h2>
                            @endif

                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
  </div>


@endsection