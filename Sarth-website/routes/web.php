<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\LogInandOutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BasketController;



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

Route::get('/logout',[LogoutController::class, 'logout']);

//route to add to Basket
Route::post('basket',[ProductsController::class,'addToBasket']);