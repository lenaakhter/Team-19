<div class="bg-admin">
    @extends('layouts.admin')
    @section('page')

    <br>
    <div class="admin-gif">
        <h1>Admin Homepage</h1>
    </div>
    <br>

    <div class="about-contents">
        <div class="contents-box-1">
            <h3>About Admin Accounts/ Basic Navigation</h3>
            <hr>
            <p>
                Welcome to our admin homepage. Here you will have access to a range of features 
                listed below. Quick developer updates and a reminder of what our available features are located 
                at the footer for a quick glance or come back to the admin homepage for a more in-depth update. 
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
                    We are currently developing a new newsletter feature. 
                    At the moment it takes in emails of whoever subscribes
                    and our next steps are to create a new admin feature so we
                    can send an email to these users. Sign up has been released 
                    early to build up the Sarth community and give time
                    for those who may be conflicted in joining (although sign up will still be
                    accessible once fully finished). New updates to this shortly.
                </p>
            </div>
        </div>

    </div>

    <div class="admin-gif-2">
        <h2>Let's Get Started</h2>
        <button type="button" onclick=window.location.href="/admin/users" class="redir">View Users</button>
    </div>

    <br>


</div>
@endsection


