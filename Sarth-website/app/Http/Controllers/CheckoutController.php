<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use App\Http\Controllers\ProductsController;
class CheckoutController extends Controller
{
       public function placeOrder(){
        //return "Test";
        // $Checkout = new Checkout();
        
    //check the Basket where Auth email is equal to email in database
    $cartItems = Basket::where('email', Auth::user()->email)->get();
        //return Auth::user()->email; //gets the email
       foreach($cartItems as $item){
return $item;
       
$subtotal=ProductsController::basketTotal();
//a new Order is created and data is inserted
Checkout::create([
    'productID'->$item->productID,
    'email'->$item->email,
    'name'->$item->email,
    'price'->$subtotal
   //  'qty',
   // 'status'

]);
        }
}
}
