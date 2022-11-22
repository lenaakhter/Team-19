<div class="bg-image">
    @extends('layouts.main')
    @section('pageInfo')



    <section class="contact" style="width:100% ;">
        <div class="box" style="width:70% ;">
            <div class="info">
                <div class="box1">
                    <div class="symbol"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class=" text">
                        <h3> Address</h3>
                        <p style="color:white"> Aston St,<br>Birmingham,<br>B4 7ET</p>
                    </div>
                </div>
                <div class="box1">
                    <div class="symbol"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class=" text">
                        <h3>Phone</h3>
                        <p style="color:white">0121 204 3000</p>
                    </div>
                </div>
                <div class="box1">
                    <div class="symbol"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class=" text">
                        <h3>Email</h3>
                        <p style="color:white">hello@aston.ac.uk</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form1">
            <h1>Contact <span>Us</span></h1>
            <p>Here is som random text to do with the sarth website. I want to see
                how it looks like and will change the text to something usefull later</p>
            <form action="">
                <input type="" placeholder="Name..." required>
                <input type="email" name="email" placeholder="Email..." required>
                <input type="" placeholder="Subject..." required>
                <input type="text" name="" id="messagetext" placeholder="Your Message..." required>

                </input>
                <input type="submit" name="" value="Submit" class="button">
            </form>
        </div>

    </section>

</div>

@endsection