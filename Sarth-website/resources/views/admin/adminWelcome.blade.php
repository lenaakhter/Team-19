<div class="bg-admin">
    @extends('layouts.main')
    @section('pageInfo')

    <br>
    <div class="admin-gif">
        <h1>Admin Homepage</h1>
    </div>
    <br>

    <div class="about-contents">
        <div class="contents-box-1">
            <h3>About Admin Accounts</h3>
            <hr>
            <p>Customer Service</br>
                As an admin, you have an access to a range of features such as
                viewing users and orders, adding and removing products, updating order
                status' and much more.
            </p>
        </div>
        <div class="contents-box-2">
            <h3>Explore</h3>
            <hr>
            <p>
                View all users: Allows you to view all user information and can change them into
                admin accounts<br>
                Add new Game: Allows you to add a product to the website, specifying the name,
                cover image, age rating, description, price and the amount of stock available to us<br>
                View all Products: From this page you can view all available products on the website, you
                can also update/delete each game.<br>
                View orders Placed: Allows admins to view all existing orders made from all accounts<br>
            </p>
        </div>
        <div class="contents-box-3">
            <div class="about-item text-center">
                <h3>In Progess Features</h3>
                <hr>
                <p>
                    At the moment the team are developing a weekly newsletter feature for our users to stay
                    updated with all the latest games. It is found in the navbar and will be accessible for
                    all visiters of the site.
                </p>
            </div>
        </div>

    </div>

    <div class="admin-gif-2">
        <h2>Let's Get Started</h2>
        <button type="button" onclick=window.location.href="/adminPage" class="redir">View Users</button>
    </div>

    <br>


</div>
@endsection


