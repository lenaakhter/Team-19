<link rel="stylesheet" href="/css/welcome.css">
@extends('layouts.main')
@section('pageInfo')

<div class="content">
    <div class="bg-img">
        <br />
        <br />
        <main role="main" class="col-md-5 p-lg-5 mx-auto text-center">
            <h1 style="color: white; font-size:3vw;">Welcome to Sarth!</h1>
            <p class="lead" style="color: white; font-size: 1.5vw;">Sarth is a game store website, suited to game lovers
                everywhere!
                Explore our range
                of games by clicking the button below.
            </p>
            <p class="lead" style="color: white;">
                <a href="#" onclick="hello()" class="btn btn-lg btn-secondary"
                style="color: #65b0ff; background-color:white">Shop Now!</a>
            </p>
        </main>
        <br />
        <div class="body-bg">
            <div class="featured-products" style="color: white; font-weight: bold; text-align: center;">
                <br />
                <h5>Featured Games:</h5>
            </div>
            <br />
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <div class="row" style = "width: 80%; margin: auto;">
                    <!-- Looping through list of products provided from web.php -->
                     @foreach($products as $product)
                        @php    
                            $i = $loop->iteration%3; 
                        @endphp
                        <!-- This line uncondiionally adds an image with appropriate text -->
                        <div class="col text-center">
                            <!-- Fetches images from products.blade and formats them into carousel  -->
                                        <img class = "carousel-img" src="{{ $product->imageLocation }} " alt="image of game" height="140" width="140"> 
                                        <h3 class="fw-normal" style="color: white;">{{$product->productName}}</h3>
                                        <p>{{$product->productDescription}}</p>
                                    </div>
                       <!-- If index i is a multiple of 3, close the slide! -->
                        @if($i==0)
                                </div>
                        </div>

                        @endif
                        <!-- If index i is a multiple of 3 & we are not at the 9th image, create a new slide (loops back to top) -->
                        @if($i==0 AND !$loop->last)
                                <div class="carousel-item">
                                    <div class="row" style = "width: 80%; margin: auto;">
                        @endif
                                    
                        
                     @endforeach   
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev" style = "padding-bottom: 90px; background-color: transparent; border-color: transparent;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next" style = "padding-bottom: 90px; background-color: transparent; border-color: transparent;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

