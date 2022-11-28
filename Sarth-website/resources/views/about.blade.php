<div class="bg-image">
    @extends('layouts.main')
    @section('pageInfo')

    <br>
    <div class="about-gif">
        <h1>About Sarth</h1>
    </div>
    <br>

    <div class="about-contents">
        <div class="contents-box-1">
            <h3>Our Values</h3>
            <hr>
            <p>Customer Service</br>
                We pride ourselves in giving excellent customer service, for all needs.</br>
                Passion</br>
                We love what we do, and have fun while doing it.</br>
                Creativity</br>
                We strive to bring originality, imagination, and excitement in everything we do.</p>
        </div>
        <div class="contents-box-2">
            <h3>FAQs</h3>
            <hr>
            <p>How can I view my order?<br>
                You can view previous orders by logging into your account.</br>
                What if you don't have the game I want?</br>
                Subscribe to our newsletter to keep up to date on our collection of video games.</br>
                How do I contact customer service?</br>
                You can email or phone the store using the details located in the Contact page.</p>
        </div>
        <div class="contents-box-3">
            <div class="about-item text-center">
                <h3>Why choose us?</h3>
                <hr>
                <p>We provide excellent customer service. Whether it is by email or phone, we go the extra mile.</br>
                    Our prices are some of the best in the market. If you find a better price elsewhere we can price
                    compare against most retailers. </br>
                    Our newsletters provide you with the latest news out of the gaming world.</br>
                    We ensure all orders are sent out as soon as possible or in the given timeframe.</br>
                    Our catalogue of video games is always updated to make sure you can buy the latest games.</p>
            </div>
        </div>

    </div>

    <div class="about-gif-2">
        <h2>If you like our goals and want to support our company</h2>
        <button type="button" onclick=window.location.href="/products" class="shop-now">Shop Now!</button>
    </div>

    <br>


</div>
@endsection


