<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Productinformation;
use App\Models\Basket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use Session;



class ProductsController extends Controller
{
    public function products()
    {
        //Method created to get data from the 'productinformation' table and to show them on the products view.
        $products = Productinformation::all();
        return view('products', ['products' => $products]);
    }

    public static function listProducts()
    {
        //Method created to get data from the 'productinformation' table and to show them on the products view.
        $products = Productinformation::skip(0)->take(9)->get();
        return $products;
    }

    public function item($id)
    {
        //Method created to get a certain product from the table. If it not assigned an ID in the table it will not show.
        $item = Productinformation::findOrFail($id);
        return view('item', ['item' => $item]);
    }

    //method to add to basket
    public function addToBasket(Request $request)
    {
        //if the user is logged in
        if ($request->session()->has('user')) {
            //get the stock of the desired item
            $productStock = Productinformation::where('productID', $request->productID)
                ->where('productID', $request->productID)
                ->first()->stock;

            //only add to basket if enough stock of item is present
            if($productStock >= $request->qty){
            //get the price of the product from the productinformation table
             $productPrice = DB::table('productinformation')
                ->where('productID', $request->productID)
                ->value('price');

            $Basket = new Basket;

            //check if the item already exists in the basket, if so gets that row
            $basketQ = Basket::where('userID', Auth::user()->id)
                ->where('productID', $request->productID)
                ->first();

            //if requested item already exists in the basket, only increment quantity
            if ($basketQ) {
                $basketQ->increment('qty', $request->qty);
                $basketQ->update();
            } else {
                //otherwise add that item to the basket
                $Basket->email = Auth::user()->email;
                $Basket->productID = $request->productID;
                $Basket->qty = $request->qty;
                $Basket->price = $productPrice;
                $Basket->UserID = Auth::user()->id;
                $Basket->save();

            }
            return redirect()->back()->with('message', 'Product added to Basket');
        } else{
                return redirect()->back()->with('stockerr', 'Sorry only '.$productStock .' of this item available');
            }

        }
        //else if the user is a guest
        elseif (Auth::guest()) {
        //if no session_id assigned, assign one and put it in the session
            $sessionID= Session::get('session_id');
            if (empty ( $sessionID)){
                $sessionID= Session::getId();
                Session::put('session_id',  $sessionID);
            }
         //get the stock of the desired item
          $productStock = Productinformation::where('productID', $request->productID)
          ->where('productID', $request->productID)
          ->first()->stock;

      //only add to basket if enough stock of item is present
        if($productStock >= $request->qty){
        //get the price of the product from the productinformation table
      $productPrice = DB::table('productinformation')
          ->where('productID', $request->productID)
          ->value('price');

      $Basket = new Basket;

      //check if the item already exists in the basket, if so gets that row
      $basketQ = Basket::where('sessionID', $sessionID)
          ->where('productID', $request->productID)
          ->first();

      //if requested item already exists in the basket, only increment quantity
      if ($basketQ) {
          $basketQ->increment('qty', $request->qty);
          $basketQ->update();
      } else {
        //otherwise add that item to the basket
          $Basket->sessionID= $sessionID;
          $Basket->productID = $request->productID;
          $Basket->qty = $request->qty;
          $Basket->price = $productPrice;
          $Basket->save();

      } return redirect()->back()->with('message', 'Product added to Basket');
    } else {
            return redirect()->back()->with('stockerr', 'Sorry only '.$productStock .' of this item available');
        }
    }
    }

    //this method returns the number of items in the basket, used in navbar to show quantity of items in basket
    public static function numOfItems()
    {
        //if user is logged in get the num of items by their userID else get it by their sessionID
        if (auth()->user()) {
            return Basket::where('userID', Auth::user()->id)->sum('qty');
        } elseif (Auth::guest()) {
            return Basket::where('sessionID', Session::get('session_id'))->sum('qty');
        }
    }

    //gets the items in the basket
    public static function getBasket()
    {
    if (auth()->user()){
        $userID = Auth::user()->id;
        $data = Basket::where('userID', $userID)->get();
        return $data;
    } elseif (Auth::guest()) {
        $data =  Basket::where('sessionID', Session::get('session_id'))->get();
        return $data;
        }
    }

    //returns the basket items as a view
    public function listBasket()
    {
        $data = ProductsController::getBasket();
        return view('basket', ['products' => $data]);

    }

    //remove the specified item from the basket (using its specified id in the basket)
    public function removeBasketProduct($basket_id)
    {
        DB::table('basket')->where('id', $basket_id)->delete();
        return redirect('/basket')->with('msg', "Item Removed");
    }

    //this method is used to display the subtotal
    public static function basketTotal()
    {
        $total = 0;
        $data = ProductsController::getBasket();
        foreach ($data as $datas) {
            $total += $datas->qty * $datas->price;
        }
        return $total;
    }

    //returns the searched item, if search box empty it simply redirects to the same page
    public function searchProducts()
    {
        $search = $_GET['query'];
        if (!empty($search)) {
            $products = DB::table('productinformation')
                ->select('*')
                ->where('productName', 'LIKE', '%' . $search . '%')
                ->orWhere('productDescription', 'LIKE', '%' . $search . '%')
                ->get();
            return view('/search', compact('products'));
        } else {
            return redirect('/products');
        }
    }

    //function just for testing
    public function test()
    {

return dd( Session::get('session_id')); die;   //returns true if session has basket
}
}
