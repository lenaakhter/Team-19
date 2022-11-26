<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use App\Models\OrderProduct;
use App\Models\Productinformation;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\DB;
use DateTime;

class CheckoutController extends Controller
{
public function placeOrder(Request $request)
       {
        $subtotal= ProductsController::basketTotal();

        $checkout = new Checkout();
        $checkout->userID = Auth::id();
        $checkout->email = Auth::user()->email;
        $checkout->name = Auth::user()->name;
        $checkout->subtotal = $subtotal;
        $checkout->status = "pending";
        $checkout->save();

        $checkout->id;

        $basketItems = Basket::where('email', Auth::user()->email)->get();

        foreach ($basketItems as $item){

            OrderProduct::create([
                'orderID'=>$checkout->id,
                'productID'=> $item->productID,
                'price'=> $item->products->price,
                'qty'=> $item->qty,

            ]);

            $product = Productinformation::where('productID',$item->productID)->first();
            $product->stock = $product->stock - $checkout->qty=$item->qty;
            $product->update();
        }

        $basketDestroy = Basket::where('userID', Auth::user()->id)->get();
        Basket::destroy($basketDestroy);

        $order = Checkout::with('order_products')->orderBy('id', 'DESC')->where('userID', Auth::user()->id)->first();
        return view ('/checkout', compact('order'));
}


}
