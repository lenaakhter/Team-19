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
        $orders = Checkout::all();
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

        $newGame->save();

        return redirect('/admin/allProducts');
    }

    public function removeGame($id){
        DB::table('productinformation')->where('productID', $id)->delete();
        return redirect('/admin/allProducts');
    }
}
