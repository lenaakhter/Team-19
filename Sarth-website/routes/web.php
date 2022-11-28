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




/*Prevents users that are not logged in from accessing the logout route*/
Route::middleware(['auth'])->group(function(){
    /*
    This route takes logged in users to the logout page
    The middleware prevents non authenticated users from acessing it.
     */
    Route::get('/logout',[LogoutController::class, 'logout']);






});


/*
Middleware that works displays the specified routes for guests.
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
Middleware that restricts admin users to only access admin pages.
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



    /* Simply returns a contact Page 
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

/*Prevents non admin users from accessing the admin routes*/
Route::middleware(['adminAuthentication'])->group(function(){
    //route to show the main admin page
    Route::get('/admin',[AdminController::class, 'show']);
    //route to show the admin all products
    Route::get('/admin/allProducts',[AdminController::class, 'allProducts']);

    //route for admin to update game information
    Route::get('/admin/update/{id}',[AdminController::class, 'update']);
    Route::post('/admin/update/{id}',[AdminController::class, 'updated']);

    //route to show the admin orders by users
    Route::get('/admin/orders',[AdminController::class, 'orders']);

    //route to show the admin a page thats adds new games into products page
    Route::get('/admin/addNewGame',[AdminController::class, 'addGames']);
    Route::post('/admin/allProducts',[AdminController::class, 'addToDatabase']);

    //route to delete games from product list
    Route::get('/admin/removeGame/{id}',[AdminController::class,'removeGame']);

    /*

    This route is used to update the admin status of users.
    If the user is already an admin they will become a regular user.
    If the user is already a regualr user they will become an admin.
    
    */
    Route::get('/admin/status/{id}/{isadmin}', [AdminController::class, 'updateAdminStatus']);

    /*
    
    This route updates the status of a placed order.
    If the order is currently completed it will become pending.
    If the order is currently pending it will become completed.
     */
    Route::get('/admin/orders/{id}/{status}/{userID}', [AdminController::class, 'updateOrderStatus']);


});





/*Prevents admins and guests from accessing the routes related to basket and checking out.*/
Route::middleware(['checkoutAuthentication'])->group(function(){

    //route to post the data from basket and show the checkout page
    Route::post('/checkout',[CheckoutController::class,'placeOrder']);

     //route to get previous orders (/orders) page
    Route::get('/orders', [OrderController::class,'showUserOrders']);

    //route to get the more-details page that shows all products in the order
    Route::get('/orders/{id}', [OrderController::class, 'moreOrderDetails']);




});
