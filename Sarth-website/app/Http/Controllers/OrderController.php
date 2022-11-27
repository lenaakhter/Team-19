<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showUserOrders()
{
    $userID=Auth::user()->id;
    $orders = Checkout::with('order_products')->where('userID', $userID)->get()->toArray();

    return view('/orders')->with(compact('orders'));

}

public function moreOrderDetails($id){
    $userID=Auth::user()->id;
    $moreDetails = Checkout::with('order_products')->where('id',$id)->where('userID', Auth::user()->id)->first();
    return view ('/more-details', compact('moreDetails'));

}
}
