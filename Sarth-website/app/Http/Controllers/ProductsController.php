<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productinformation;
use App\Models\Basket;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;


class ProductsController extends Controller
{   
    public function products() {
        //Method created to get data from the 'productinformation' table and to show them on the products view. 
        $products = Productinformation::all();
        return view('products', ['products' => $products]);
    }

    public function item($id) {
        //Method created to get a certain product from the table. If it not assigned an ID in the table it will not show.
        $item = Productinformation::findOrFail($id);
        return view('item', ['item' => $item]);
    }

   public function addToBasket(Request $request)
    {
        if($request->session()->has('user'))
        {
            $Basket= new Basket;
            $Basket->email=$request->session()->get('user')['email'];
            $Basket->productID=$request->productID;
            $Basket->save();
            return redirect('/basket');  //redirect to basket page

        }
        else
        {
            return redirect('/login');
        }
    }
    
    public static function numOfItems()
    {
        //if(($request)->session()->has('user')){
           if (auth()->user()) {
        $email= Session::get('user')['email'];
        $numberOfItems = Basket::where('email',$email)->count();
        return $numberOfItems;
    }
    }
}
