<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use App\Models\Productinformation;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\DB;
use DateTime;

class CheckoutController extends Controller
{
public function placeOrder()
       {
  $basketItems = Basket::where('email', Auth::user()->email)->get();

    foreach($basketItems as $item){

$subtotal= ProductsController::basketTotal();

$checkout = new Checkout();
    $checkout->productID=$item->productID;
    $checkout->userID=Auth::id();
    $checkout->email=$item->email;
    $checkout->name=Auth::user()->name;
    $checkout->subtotal=$subtotal;
    $checkout->qty=$item->qty;
    $checkout->save();
}

$basketItems = Basket::where('userID', Auth::user()->id)->get();
Basket::destroy($basketItems);
$order= DB::table('orders')
  ->join('productinformation','orders.productID','productinformation.productID')
  ->where('orders.userID',Auth::user()->id)
  ->get();

  return view('/checkout',['order'=>$order]);
}


}
