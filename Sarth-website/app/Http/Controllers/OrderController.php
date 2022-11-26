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

//use the following functon to show all the orders in the database for the admin to view
public function showAllOrders()
{
    $orders = Checkout::all();
    $order= DB::table('orders')
    ->join('productinformation','orders.productID','productinformation.productID')
    ->get();
    return view('', ['orders' => $orders]);
}

public function moreOrderDetails($id){
    $userID=Auth::user()->id;
    $moreDetails = Checkout::with('order_products')->where('id',$id)->where('userID', Auth::user()->id)->first();
    return view ('/more-details', compact('moreDetails'));

}


}
