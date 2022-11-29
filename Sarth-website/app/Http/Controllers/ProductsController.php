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

    public function addToBasket(Request $request)
    {

        if ($request->session()->has('user')) {
            //dd();die;
            $productStock = Productinformation::where('productID', $request->productID)
                ->where('productID', $request->productID)
                ->first()->stock;
            //only add to basket if enough stock of item is present

            if($productStock >= $request->qty){


            $productPrice = DB::table('productinformation')
                ->where('productID', $request->productID)
                ->value('price');

            $Basket = new Basket;
            //Session::push('basket', $Basket);  //storing basket in the session

            //check if the item already exists in the basket, if so gets that row
            $basketQ = Basket::where('userID', Auth::user()->id)
                ->where('productID', $request->productID)
                ->first();

            //if requested item already exists in the basket, only increment quantity
            if ($basketQ) {
                $basketQ->increment('qty', $request->qty);
                $basketQ->update();
            } else {
                $Basket->email = Auth::user()->email;
                $Basket->productID = $request->productID;
                $Basket->qty = $request->qty;
                $Basket->price = $productPrice;
                $Basket->UserID = Auth::user()->id;
                $Basket->save();

            }
            return redirect()->back()->with('message', 'Product added to Basket');
        } else{
                return redirect()->back()->with('stockerr', 'Sorry only '.$productStock .' available');
            }

        }
//if the logged in user is a guest
        elseif (Auth::guest()) {

            $sessionID= Session::get('session_id');
            if (empty ( $sessionID)){
                $sessionID= Session::getId();
                Session::put('session_id',  $sessionID);
            }
         // echo  print_r( Session::getId());die;
          $productStock = Productinformation::where('productID', $request->productID)
          ->where('productID', $request->productID)
          ->first()->stock;
      //only add to basket if enough stock of item is present

      if($productStock >= $request->qty){


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
          $Basket->sessionID= $sessionID;
          $Basket->productID = $request->productID;
          $Basket->qty = $request->qty;
          $Basket->price = $productPrice;
          $Basket->save();

      } return redirect()->back()->with('message', 'Product added to Basket');
    } else {
            return redirect()->back()->with('stockerr', 'Sorry only '.$productStock .' available');
        }
    }
}





    //this method can be left as static
    public static function numOfItems()
    {
        if (auth()->user()) {
            return Basket::where('userID', Auth::user()->id)->sum('qty');
        } elseif (Auth::guest()) {
            return Basket::where('sessionID', Session::get('session_id'))->sum('qty');
        }
    }


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

    public function listBasket()
    {

        $data = ProductsController::getBasket();
        return view('basket', ['products' => $data]);

    }

    public function removeBasketProduct($basket_id)
    {
        DB::table('basket')->where('id', $basket_id)->delete();

        return redirect('/basket')->with('msg', "Item Removed"); //the message's not working but the redirection is (not cruicial)
    }

    //this method can be used to display subtotal for /basket and /checkout pages later
    public static function basketTotal()
    {
        $total = 0;
        $data = ProductsController::getBasket();
        foreach ($data as $datas) {
            $total += $datas->qty * $datas->price;
        }
        return $total;

    }


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
