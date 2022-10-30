<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productinformation;

class ProductsController extends Controller
{
    public function products() {
        //Method created to get data from the 'productinformation' table and to show them on the products view. 
        $products = Productinformation::all();
        return view('products', ['products' => $products]);
    }
}
