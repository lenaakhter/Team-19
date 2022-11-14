<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showCurrentOrder()
{
  $order= DB::table('orders')
  ->join('productinformation','orders.productID','productinformation.productID')
  ->where('orders.email',Auth::user()->email)
  ->get();
    return view('/orders', ['orders' => $order]);
}

//use the following functon to show all the orders in the database for the admin to view
public function showAllOrders()
{
    $orders = Checkout::all();
    $order= DB::table('orders')
    ->join('productinformation','orders.productID','productinformation.productID')
    ->get();
    return view('', ['orders' => $orders]);   
}
}
