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

    public static function listProducts() {
        //Method created to get data from the 'productinformation' table and to show them on the products view. 
        $products = Productinformation::skip(0)->take(9)->get();
        return $products;
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
            $productPrice =DB::table('productinformation')
            ->where('Productinformation.productID', $request->productID)
            ->value('price');  


            $Basket= new Basket;
            $basketQ = Basket::where('email',Auth::user()->email)
            ->where('productID',$request->productID)
            ->first();

            if($basketQ){
            $Basket->increment('qty');
           
            } else{
            $Basket->email=Auth::user()->email;
            $Basket->productID=$request->productID;
            $Basket->qty=$request->qty;    
            $Basket->price=  $productPrice;   
            $Basket->save();
              
            }
            return redirect()->back()->with('message', 'Product added to Basket');
        }
        else
        {   
            return redirect('/login')->with('BasketLoginMsg', 'Product added to Basket');
        }
    }

    public static function numOfItems()
    {
        if (auth()->user()) {
       return Basket::where('email',Auth::user()->email)->sum('qty');
        }
    }
    

    public static function  getBasket(){
  
  $email=Auth::user()->email;
  $data = DB::table('basket')
    ->join('productinformation','basket.productID','productinformation.productID')
    ->select('productinformation.*','basket.id as basket_id','basket.qty as qty')
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

public function searchProducts(){
   
    $search = $_GET['query'];
    if (!empty($search)){
    $products =  DB::table('productinformation')
    ->select('*')
    ->where ('productName','LIKE','%'.$search.'%')
    ->orWhere('productDescription','LIKE','%'.$search.'%')
    ->get();
return view('/search', compact('products'));

}else{
   return redirect('/products');
}

}

//function just for testing
// public function test(){
//    $productPrice =DB::table('productinformation')
//    ->where('Productinformation.productID', 2)
//    ->value('price');

// return $productPrice;
// }
}
