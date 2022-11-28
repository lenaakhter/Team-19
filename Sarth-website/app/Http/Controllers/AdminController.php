<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productinformation;
use App\Models\Userinformation;
use App\Models\Checkout;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show() {
        $users = Userinformation::all();
        return view('admin.adminPage', ['users' => $users]);
    }

    public function addGames() {
        return view('admin.addNew');
    }

    public function allProducts() {
        $products = Productinformation::all();
        return view('admin.allProducts', ['products' => $products]);
    }

    public function orders() {
        $orders = Checkout::with('order_products')->get();
        return view('admin.orders', ['orders' => $orders]);
    }

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
}
