<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productinformation;
use App\Models\Userinformation;
use App\Models\Checkout;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;


class AdminController extends Controller
{

    //This function gets all the users information from 
    //the database and displays it on the page.
    public function show() {
        $users = Userinformation::all();
        return view('admin.adminPage', ['users' => $users]);
    }

    //this is a view for the add new game page
    public function addGames() {
        return view('admin.addNew');
    }

    //This function gets all the products information from 
    //the database and displays it on the page.
    public function allProducts() {
        $products = Productinformation::all();
        return view('admin.allProducts', ['products' => $products]);
    }

    //This function gets all the orders information from 
    //the database and displays it on the page.
    public function orders() {
        $orders = Checkout::with('order_products')->get();
        return view('admin.orders', ['orders' => $orders]);
    }

    // this functions was made to update products that are currently in the database.
    public function addToDatabase(Request $request) {

        $newGame = new Productinformation();
        //To check if a file is uploaded and puts the image uploaded into the right folder so it can be viewed on products page
        if ($request->hasFile('imageLocation')){
            $gameImage = $request->file('imageLocation');
            $extension = $gameImage->getClientOriginalExtension();
            $image = time().'.'. $extension;
            $gameImage->move('imagesOfGames', $image);
            $newGame->imageLocation = '/imagesOfGames/'.$image;
        }
        $newGame->productName = request('productName');
        $newGame->productDescription = request('productDescription');
        $newGame->price = request('price');
        $newGame->ageRating = request('ageRating');
        $newGame->stock = request('stock');

        $newGame->save();

        return redirect('/admin/allProducts');
    }

    //this function is for deleting products from the database 
    public function removeGame($id, Request $request){
        DB::table('productinformation')->where('productID', $id)->delete();

        $request->session()->flash('messageDelete', 'Game has been removed successfully');

        return redirect('/admin/allProducts');
    }

    // these two function were created for displaying the current details of a game on a page and 
    // for updating products information in the database
    public function update($id) {
        $game = Productinformation::findOrFail($id);
        return view('admin.update', ['game' => $game]);
    }

    public function updated(Request $request, $id) {

        $updatedGame = Productinformation::findOrFail($id);

        if ($request->hasFile('imageLocation')){
            $deleteOld = 'imagesOfGames'. $updatedGame->imageLocation;
            if(File::exists($deleteOld)) {
                File::delete($deleteOld);
            }
            $gameImage = $request->file('imageLocation');
            $extension = $gameImage->getClientOriginalExtension();
            $image = time().'.'. $extension;
            $gameImage->move('imagesOfGames', $image);
            $updatedGame->imageLocation = '/imagesOfGames/'.$image;
        }

        $updatedGame->productName = request('productName');
        $updatedGame->productDescription = request('productDescription');
        $updatedGame->price = request('price');
        $updatedGame->ageRating = request('ageRating');
        $updatedGame->stock = request('stock');

        $updatedGame->save();

        $request->session()->flash('messageUpdate', 'Game has been updated successfully');

        return redirect('/admin/allProducts');
    }


    // this function was created to allow current admins of the website to have the ability 
    // to give new users the admin role or to take the admin role away from current admins
    // which will be reflected in the database of userinformation
    public function updateAdminStatus($id,$isadmin){
        $users = Userinformation::all();
        $user = DB::select('select * from userinformation where id = ?', [$id]);
      
        //dd($isadmin);die;

        if($isadmin){
            DB::update('update userinformation set isadmin = false where id = ?', [$id]);

        } else {
            DB::update('update userinformation set isadmin = true where id = ?', [$id]);
        }
        
        return Redirect::back();

    }

    
    // this function was created to give the admin the ability to 
    // change the order status from pending to complete  
    public function updateOrderStatus($id, $status, $userID){

        if($status == "pending"){
            
            DB::update('update orders set status = "completed" where userID = ? and id = ?', [$userID, $id] );
        } else {
            DB::update('update orders set status = "pending" where userID = ? and id = ?', [$userID, $id] );
        }

        return Redirect::back();
    }
}
