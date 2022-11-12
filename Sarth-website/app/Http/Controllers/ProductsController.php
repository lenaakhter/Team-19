<?php

namespace App\Http\Controllers;

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
          //  $Basket->email=$request->session()->get('user')['email'];
            $Basket->email=Auth::user()->email;
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
           if (auth()->user()) {
        $email= Session::get('user')['email'];
        $numberOfItems = Basket::where('email',$email)->count();
        return $numberOfItems;
    }
    }

    public static function  getBasket(){
  
  $email=Session::get('user')['email'];
  $data =  DB::table('basket')
    ->join('productinformation','basket.productID','productinformation.productID')
    ->select('productinformation.*','basket.id as basket_id')
    ->where('basket.email', $email)   //get data where session email matches the email in database
    ->get();

return $data;
    //return view('basket', ['products'=> $data]);

    }

    public function listBasket(){
        $data= ProductsController::getBasket();
        return view('basket', ['products'=> $data]);

    }

    public function removeBasketProduct($basket_id){
    DB::table('basket')->where('id', $basket_id)->delete();

    return redirect('/basket')->with('msg',"Item Removed"); //the message's not working but the redirection is (not cruicial)
    }

    public static function basketTotal()
{

    $data= ProductsController::getBasket();
  $total=$data->sum('price');
  return $total;
}
}
