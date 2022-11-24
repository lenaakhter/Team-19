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








/* Route for the registered users basket */
Route::get('/basket', [BasketController::class , 'show']);



//Route just for testing
Route::get('/test', [ProductsController::class,'test']);
//Route::get('/basket', [ProductsController::class,'basketTotal']);


/*Prevents admin and regular users that are signed in from being to access the sign in page and registration page.*/ 
Route::middleware(['guestAuthentication'])->group(function(){

    // route to show the login form
    Route::get('/login',[LogInandOutController::class, 'Login'])->name('login');

    // route to process/submit the form
    Route::post('/login', [LogInandOutController::class, 'doLogin']);

    /* Routes for the User Sign up Page */
    Route::get('/userRegistration', [UserRegistrationController::class , 'show']);
    Route::post('/userRegistration', [UserRegistrationController::class, 'storeUserInformation']);




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

});




/*Prevents admin users from accessing anything other than the admin routes*/
Route::middleware(['regularUserAuthentication'])->group(function(){
    
    /* Route for the products Page */
    Route::get('/products', [ProductsController::class , 'products']);

    /* Route for the individual product Page */
    Route::get('/products/{id}', [ProductsController::class, 'item']);




    //route to search through all the products
    Route::get('/search', [ProductsController::class,'searchProducts']);



    /* Simply returns a contact Page */
    Route::get('/contact', function () {
    return view('contact');
    });

    /* Simply returns a contact Page */
    Route::get('/about', function () {
    return view('about');
    });

    /* This route displays the first page (welcome page) */
    Route::get('/', function () {
    return view('welcome', ['products' => ProductsController::listProducts()]);
    });








});

/*Prevents users that are not logged in from accessing the logout route*/
Route::middleware(['auth'])->group(function(){
    // route to Log user out
    Route::get('/logout',[LogoutController::class, 'logout']);






});

/*Prevents admins and guests from accessing the routes related to basket and checking out.*/
Route::middleware(['checkoutAuthentication'])->group(function(){


    //route to post the data from basket and show the checkout page
    Route::post('/checkout',[CheckoutController::class,'placeOrder']);

     //route to add to Basket
     Route::post('basket',[ProductsController::class,'addToBasket']);

     //route to display the current Basket
     Route::get('/basket',[ProductsController::class,'listBasket']);

     Route::get('/removefrombasket/{basket_id}',[ProductsController::class,'removeBasketProduct']);

     //route to get the checkout page
    Route::get('/orders', [OrderController::class,'showUserOrders']);

    Route::get('/orders/{id}', [OrderController::class, 'moreOrderDetails']);




});

