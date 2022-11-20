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
                                    
                        
                        
                        <!-- <div class="carousel-item active">
                            <div class="row" style = "width: 80%; margin: auto;">
                                <div class="col text-center">
                                    <svg class="fortnite-img" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img"></svg>
                                    <h3 class="fw-normal" style="color: white;">Fortnite</h3>
                                    <p>A free-to-play Battle Royale game with numerous game modes for all gamer.</p>
                                </div>
                                <div class="col text-center">
                                    <svg class="valorant-img" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img"></svg>
                                    <h3 class="fw-normal" style="color: white;">Valorant</h3>
                                    <p>Character-based tactical FPS where precise gunplay meets unique agent abilities.</p>
                                </div>
                                <div class="col text-center">
                                    <svg class="overwatch-img" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img"></svg>
                                    <h3 class="fw-normal" style="color: white;">Overwatch</h3>
                                    <p>A free-to-play, team-based action game set in the optimistic future.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row" style = "width: 80%; margin: auto;">
                                <div class="col text-center">
                                    <svg class="lol-img" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img"></svg>
                                    <h3 class="fw-normal" style="color: white;">League of Legends</h3>
                                    <p>A team-based multiplayer online battle arena video game.</p>
                                </div>
                                <div class="col text-center">
                                    <svg class="fallguys-img" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img"></svg>
                                    <h3 class="fw-normal" style="color: white;">Fall Guys</h3>
                                    <p>A free-to-play platform battle royale game where you compete in a series of minigames.</p>
                                </div>
                                <div class="col text-center">
                                    <svg class="rocketleague-img" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img"></svg>
                                    <h3 class="fw-normal" style="color: white;">Rocket League</h3>
                                    <p>A vehicular, arcade-style soccer game.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row" style = "width: 80%; margin: auto;">
                                <div class="col text-center">
                                    <svg class="tombraider-img" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img"></svg>        
                                    <h3 class="fw-normal" style="color: white;">Shadow of the Tomb Raider</h3>
                                    <p>Action-adventure, story based video game following Lara Croft's expeditions in South America.</p>
                                </div>
                                <div class="col text-center">
                                    <svg class="cod-img" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img"></svg>
                                    <h3 class="fw-normal" style="color: white;">Call of Duty</h3>
                                    <p>A first-person shooter video game franchise, simulating arms warfare of World War II.</p>
                                </div>
                                <div class="col text-center">
                                    <svg class="darksouls-img" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img"></svg>
                                    <h3 class="fw-normal" style="color: white;">Dark Souls</h3>
                                    <p>An action-based roleplaying video game franchise, focused on dark fantasy lore.</p>
                                </div>
                            </div>
                        </div> -->
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

