<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\LogInandOutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AdminController;



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

/* This route displays the first page (welcome page) */ 
Route::get('/', function () {
    return view('welcome');
});

/* Route for the products Page */ 
Route::get('/products', [ProductsController::class , 'products']);

/* Routes for the User Sign up Page */ 
Route::get('/userRegistration', [UserRegistrationController::class , 'show']);
Route::post('/userRegistration', [UserRegistrationController::class, 'storeUserInformation']);


/* Route for the individual product Page */ 
Route::get('/products/{id}', [ProductsController::class, 'item']);

/* Route for the registered users basket */ 
Route::get('/basket', [BasketController::class , 'show']); 

/* Simply returns a contact Page */
Route::get('/contact', function () {
    return view('contact');
});

// route to show the login form
Route::get('/login',[LogInandOutController::class, 'Login']);

// route to process/submit the form
Route::post('/login', [LogInandOutController::class, 'doLogin']);
/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
// route to Log user out
Route::get('/logout',[LogoutController::class, 'logout']);

//route to add to Basket
Route::post('basket',[ProductsController::class,'addToBasket']);

//route to display the current Basket
Route::get('/basket',[ProductsController::class,'listBasket']); 

Route::get('/removefrombasket/{basket_id}',[ProductsController::class,'removeBasketProduct']);

//route to show the main admin page
Route::get('/admin',[AdminController::class, 'show']);

//route to show the admin all products
Route::get('/admin/allProducts',[AdminController::class, 'allProducts']);

//route to show the admin a page thats adds new games into products page
Route::get('/admin/addNewGame',[AdminController::class, 'addGames']);
Route::post('/admin',[AdminController::class, 'addToDatabase']);