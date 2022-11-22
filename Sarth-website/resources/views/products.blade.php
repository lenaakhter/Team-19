@extends('layouts.main')

@section('pageInfo') 

  <head> 
    <meta charset="utf-8">
    <meta name="view port" content="width=device-width, initial-scale-1">
    <title> Contact Us</title>
    <link rel="stylesheet" type="text/css" href="/css/product.css">

    <link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c2e7142f29.js" crossorigin="anonymous"></script>
  </head>
  
 
  <div class = "carousel-wrapper">
    <span id="item-1"></span>
    <span id="item-2"></span>
    <span id="item-3"></span>
    <div class="carousel-item item-1">
      <a href="#item-3" class="arrow-prev arrow"></a>
      <a href="#item-2" class="arrow-next arrow"></a>
    </div>

    <div class="carousel-item item-2">
      <a href="#item-1" class="arrow-prev arrow"></a>
      <a href="#item-3" class="arrow-next arrow"></a>
    </div>

    <div class="carousel-item item-3">
      <a href="#item-2" class="arrow-prev arrow"></a>
      <a href="#item-1" class="arrow-next arrow"></a>
    </div>
  
  


    <div class="container">

      <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
          <div class="search">
            <form type="get" action= "{{ url('/search') }}">
              <input type="text" name="query" class="form-control" placeholder="Search for games">
              <button class="btn btn-primary" type= "submit">Search</button>
            </form>
          </div>
        </div>
      </div>
                    
    </div>

  </div>
  

  <div class="gradient"> 
    <div class="title">
      <h1>List of all games</h1>
    </div> 
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
                </p>
              </div>
            </div>
          </a>  
        </div>
      @endforeach
    </div>
  </div>


@endsection
