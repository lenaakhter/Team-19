<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\LogInandOutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/













//Route just for testing
Route::get('/test', [ProductsController::class,'test']);
//Route::get('/basket', [ProductsController::class,'basketTotal']);




/*

Middlware that displays routes only authenticated users 
should be able to access.
Guests can not access these routes.
Guests that try to access these routes will be directed to the login page.

*/
Route::middleware(['auth'])->group(function(){

    /*

    This route takes logged in users to the logout page
    The middleware prevents non authenticated users from acessing it.
       */

    Route::get('/logout',[LogoutController::class, 'logout']);

});


/*
Middleware that displays the specified routes for guests.
Admin and regular users that try to access these pages will 
be redirected to the page that they were previously on.
*/

Route::middleware(['guestAuthentication'])->group(function(){

    /*

    This route displays the login page for users who are not logged in.
    This route will not work for admin users or regular users.

    */

    Route::get('/login',[LogInandOutController::class, 'Login'])->name('login');

    /*

    This route will login users after they have entered in their username and password.
    This route will not work for admin users or regular users.

     */

    Route::post('/login', [LogInandOutController::class, 'doLogin']);

    /* 

    This route will display the user registration page.
    This route will not work for admin users or regular users.

     */

    Route::get('/userRegistration', [UserRegistrationController::class , 'show']);

    /*

    This route will create a new account based on the inputted data.
    This route will validate if the inputted data matches the specified constraints.
    This route will not work for admin users or regular users.

     */

    Route::post('/userRegistration', [UserRegistrationController::class, 'storeUserInformation']);

});

/*
Midlleware that restricts admin users to only acess admin pages.
If an admin tries to access these pages they will be redirected
back to the page that there were on.
*/

Route::middleware(['regularUserAuthentication'])->group(function(){

    /* 

    This route displays the products page.
    This route will not work for admins users.

    */

    Route::get('/products', [ProductsController::class , 'products']);

    /* 

    Route for the individual product Page 
    This route works for displaying a specific product.
    This route will not work for admin users.

    */

    Route::get('/products/{id}', [ProductsController::class, 'item']);

    /*

    This route will search the products page for the inputted data.
    This route will not work for admin users.

     */

    Route::get('/search', [ProductsController::class,'searchProducts']);



    /* 

    This route will return the contact page view.
    This route will not work for admin users.

    */
    Route::get('/contact', function () {
    return view('contact');
    });

    /* 

    This route will return the about page view.
    This route will not work for admin users.

    */

    Route::get('/about', function () {
    return view('about');
    });

    /* 

    This route will display the welcome page.
    This route will not work for admin users.

    */

    Route::get('/', function () {
    return view('welcome', ['products' => ProductsController::listProducts()]);
    });


    /*

    This route will add items to the users basket
    This route will not work for admin users.

    */ 

    Route::post('basket',[ProductsController::class,'addToBasket']);

    /*

    This route will display the items in the users basket.
    This route will not work for admin users.

    */
    Route::get('/basket',[ProductsController::class,'listBasket']);

    //to remove item from basket
    
    /*

    This route removes specified items from the users basket.
    This route will not work for admin users. 

    */
    Route::get('/removefrombasket/{basket_id}',[ProductsController::class,'removeBasketProduct']);

});


/*

Middleware that restricts non-admin users from accessing routes
that only admins should be able to access.
Regular users that try to acess this page will be redirected
to the page that they were previously on.
Guests that try to access this page will be redirected to the
login page.

*/

Route::middleware(['adminAuthentication'])->group(function(){

    
    /*

    This route will display the admin home page.
    This route will not work for non-admin users

    */


    Route::get('/admin',[AdminController::class, 'show']);
    

    /*

    This route will display all the users for admin to view.
    This route will not work for non-admin users

    */

    Route::get('/admin/users',[AdminController::class, 'allUsers']);

    /*

    This route displays all the products for admins.
    This route will not work for non-admin users

    */

    Route::get('/admin/allProducts',[AdminController::class, 'allProducts']);

    /*

    This route displays the page where admins can update a game.
    This route will not work for non-admin users

    */

    Route::get('/admin/update/{id}',[AdminController::class, 'update']);

    /*

    This route will update the specified admin page.
    This route will not work for non-admin users

    */

    Route::post('/admin/update/{id}',[AdminController::class, 'updated']);

    /*
    This route displays all the placed orders for admins.
    This route will not work for non-admin users
    */

    Route::get('/admin/orders',[AdminController::class, 'orders']);

    /*

    This route displays the page where admins can add new games.
    This route will not work for non-admin users

    */
    Route::get('/admin/addNewGame',[AdminController::class, 'addGames']);

    /*

    This route will add a new game to the database.
    This route will not work for non-admin users

    */
    Route::post('/admin/allProducts',[AdminController::class, 'addToDatabase']);

    /*

    This route will delete the game specified by the admin.
    This route will not work for non-admin users.

    */

    Route::get('/admin/removeGame/{id}',[AdminController::class,'removeGame']);

    /*

    This route is used to update the admin status of users.
    If the user is already an admin they will become a regular user.
    If the user is already a regular user they will become an admin.
    This route will not work for non-admin users.
    
    */
    Route::get('/admin/status/{id}/{isadmin}', [AdminController::class, 'updateAdminStatus']);

    /*
    This route updates the status of a placed order.
    If the order is currently completed it will become pending.
    If the order is currently pending it will become completed.
    This route will not work for non-admin users.

     */

    Route::get('/admin/orders/{id}/{status}/{userID}', [AdminController::class, 'updateOrderStatus']);

});






/*

Middleware that prevents admins and guests from accessing routes
related to checking out and accessing orders.
If an admin or guest tries to access these routes they will be
redirected back to the page they were on.

*/

Route::middleware(['checkoutAuthentication'])->group(function(){


    /*

    This route posts the data from basket and shows the checkout page.
    This route will not work for admins or guests.

     */
    
    Route::post('/checkout',[CheckoutController::class,'placeOrder']);

    /*

    //
    This route displays the previous orders that a user has placed.
    This route will not work for admins or guests.

     */

    Route::get('/orders', [OrderController::class,'showUserOrders']);

    /*
    
    This route will show an indepth breakdown for a specified order.
    This route will not work for admins or guests.

     */

    Route::get('/orders/{id}', [OrderController::class, 'moreOrderDetails']);

});