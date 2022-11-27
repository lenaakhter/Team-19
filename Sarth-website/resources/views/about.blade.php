@extends('layouts.main')

@section('pageInfo')

<style>
        body{
        background-image: url('https://cdn.cloudflare.steamstatic.com/steam/apps/261570/ss_0063145dccd0cb165aa7d47d9ac6623445c7ad4c.1920x1080.jpg?t=1590605540');
        /* background-size: cover; */
        
        }
    </style>
    
<section id= "about">
    <div class="about-1" style="color: white; font-size: 1.5vw;"> 
        <h1>About Us </h1>
        <p> Sarth Gaming Store is an e-commerce website in which customers can browse and purchase a wide catalogue of video games. We sell video games from all types of genres, such as Action and Adventure, Sports, Multiplayer games, and many more. Our collection houses the best games from companies like, Epic Games, Nintendo, and ActiVision. </p>
    </div>

    <div id="about-2"> 
        <div class="content-box-lrg">
            <div class="container">
                <div class="row" style="color: white; font-size: 1vw;">
                    <div class="col-md-4"> 
                        <div class="about-item text-center">
                            <h3>FAQs</h3>
                            <hr>
                            <p>How can I view my order?</p>
                            <p>You can view previous orders by logging into your account.</p>
                            <p>What if you don't have the game I want?</p>
                            <p>Subscribe to our newsletter to keep up to date on our collection of video games.</p> 
                            <p>How do I contact customer service?</p>
                            <p>You can email or phone the store using the details located in the Contact page.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-item text-center">
                            <h3>Our Values</h3>
                            <hr>
                            <p>Customer Service</p>
                            <p>We pride ourselves in giving excellent customer service, for all needs.
                            <p>Passion</p>
                            <p>We love what we do, and have fun while doing it.</p>
                            <p>Creativity</p>
                            <p>We strive to bring originality, imagination, and excitement in everything we do. 

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-item text-center">
                            <h3>Why choose us?</h3>
                            <hr>
                            <p>We provide excellent customer service. Whether it is by email or phone, we go the extra mile.</p>
                            <p>Our prices are some of the best in the market. </p>
                            <p>Our newsletters provide you with the latest news out of the gaming world.</p>
                            <p>We ensure all orders are sent out as soon as possible or in the given timeframe.</p>
                            <p>Our catalogue of video games is always updated to make sure you can buy the latest games.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    


    </section>

@endsection

