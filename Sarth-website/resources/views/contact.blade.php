<div class="bg-image">
    @extends('layouts.main')
    @section('pageInfo')



    <section class="contact">
        <div class="box" >
            <div class="info1">
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
            <p>Need a hand? For any FAQs or customer enquiries, please contact us by filling the form below.</p>
            <form action="" class="cform">
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