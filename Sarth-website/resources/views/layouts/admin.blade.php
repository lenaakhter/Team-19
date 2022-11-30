<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/c2e7142f29.js" crossorigin="anonymous"></script>


    <title>Sarth</title>
    <link rel="icon" type="image/x-icon" href="images/sarthicon.ico">

</head>

<!-- <div class="header">
    <a href="/admin" class="logo2" id="hoverable">Admin Dashboard</a>
    <div class="header-left">
        <a href="/admin/users" id="hoverable">View all users</a>
        <a href="/admin/addNewGame" id="hoverable">Add new game to products list</a>
        <a href="/admin/allProducts" id="hoverable">View all products available</a>
        <a href="/admin/orders" id="hoverable">View orders placed</a>
    </div>
    <div class="header-right">
        <a href="/admin">{{Session::get('user')['name']}}</a>
        <a href="/logout" id="hoverable">Logout</a>
    </div>
</div> -->

    <div class="header">
        <a href="/admin" class="logo2" id="hoverable">Admin Dashboard</a>
            <div class="header-right">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" id="hoverable"
                        data-bs-toggle="dropdown" style = "padding-top: 12px;">
                        <i class = "fa-solid fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdown-menu-button" style = "background-color: #11376B;">
                        <a href="/admin/home" id="hoverable">Admin Home</a>
                        <a href="/admin" id="hoverable">View all Users</a>
                        <a href="/admin/addNewGame" id="hoverable">Add new game</a>
                        <a href="/admin/allProducts" id="hoverable">All products</a>
                        <a href="/admin/orders" id="hoverable">Orders placed</a>
                    </ul>
                </div>
                <br>
                <a href="/logout" id="hoverable">Log Out</a>
            </div>
    </div>

<body>

    @yield('page')

</body>

<footer>
    <div class="footer">
        <br>
        <br>
        <div class="footer-content">
            <div class="footer-section-about" id="foot-content-box">
                <h4>Admin Features!</h4>
                <p>As a Sarth admin, you have access to a wide range of
                    features such and removing a game, updating a game,
                    viewing all users and all orders and being able to grant/revoke
                     admin status' on accounts.
                </p>
            </div>
            <div class="footer-section-links" id="foot-content-box">
                <a href="/admin/home">Admin home</a><br>
                <br>
                    <a href="/admin" id="hoverable">View all Users</a> <br>
                    <a href="/admin/addNewGame" id="hoverable">Add new game</a> <br>
                    <a href="/admin/allProducts" id="hoverable">All products</a> <br>
                    <a href="/admin/orders" id="hoverable">Orders placed</a>
                <br>
                <a href="/logout">Logout</a><br>
            </div>
            <div class="footer-section-info" id="foot-content-box">
                <h4>New/ In Progress Features!</h4>
                <p>We are currently developing a new newsletter feature. 
                    At the moment it takes in emails of whoever subscribes
                    and our next steps are to create a new admin feature so we
                    can send an email to these users. New updates to this shortly.
                </p>
            </div>
        </div>
    </div>
</footer>



</html>