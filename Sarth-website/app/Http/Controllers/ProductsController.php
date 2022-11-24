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
            Session::push('basket', $Basket);  //storing cart in the session
            $basketQ = Basket::where('userID',Auth::user()->id)
            ->where('productID',$request->productID)
            ->exists();


            if($basketQ){                         //check if the product already exists in the database
            for($i = 0; $i < $request->qty; $i++){
            $Basket->increment('qty'); //*$request->qty
            }
            $Basket->update();   //if exists in the database only increment.

            } else{
            $Basket->email=Auth::user()->email;
            $Basket->productID=$request->productID;
            $Basket->qty=$request->qty;
            $Basket->price=  $productPrice;
            $Basket->UserID= Auth::user()->id;
            $Basket->save();

            }
            return redirect()->back()->with('message', 'Product added to Basket');
        }
        else
        {
            return redirect('/login')->with('BasketLoginMsg', 'Product added to Basket');
        }
    }
//this method can be left as static
    public static function numOfItems()
    {
        if (auth()->user()) {
       return Basket::where('userID',Auth::user()->id)->sum('qty');
        }
    }


    public static function getBasket(){

        $userID=Auth::user()->id;
        $data = Basket::where('userID', $userID)->get();
        return $data;
}

    public function listBasket() {
        $data= ProductsController::getBasket();
        return view('basket', ['products'=> $data]);

    }

    public function removeBasketProduct($basket_id) {
        DB::table('basket')->where('id', $basket_id)->delete();

        return redirect('/basket')->with('msg',"Item Removed"); //the message's not working but the redirection is (not cruicial)
    }

    //this method can be used to display subtotal for /basket and /checkout pages later
    public static function basketTotal() {
        $total=0;
        $data= ProductsController::getBasket();
    foreach($data as $datas){
        $total+=$datas->qty * $datas->price;
    }
    return $total;

}


public function searchProducts() {

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
public function test(){
    // $prod = Productinformation::where('productID',1)->first();
    // return $prod->stock;
//$orders = \App\Checkout::with('orderID')->get();

//get the most recent order
 $order = Checkout::with('order_products')->orderBy('id', 'DESC')->where('userID', Auth::user()->id)->first()->toArray();
    dd($order); die;
}
}

