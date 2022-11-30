<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Userinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Basket;
use App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;



class LogInandOutController extends Controller
{

  // This method displays the login page
    public function Login() {
    // Show the form
    return view('/loginPage');
    }

    // This method logs in the user
public function doLogin(Request $request) {

$user= Userinformation::where(['email'=>$request->email])->first();  //check first the email supplied matches with the one in database.
if(!$user || !Hash::check($request->password,$user->password))  //if no match
{
  $this->validate($request, [
  'email' => ['required'],
  'password' => ['required'],
   ]);
   if(!auth()->attempt($request->only('email', 'password'))){
    return back()->with('status', 'Invalid login details');
   }
}
else
{
    if(auth()->attempt($request->only('email', 'password'))){
//if before logging in a guest session a basket exists, relate it to the user that is logging in
  if (Basket::where('sessionID', Session::get('session_id'))->exists()){
    $basketData= Basket::where('sessionID', Session::get('session_id'))->get();
    foreach ($basketData as $id=>$basket){

     $Basket = new Basket();
     $Basket['userID'] = Auth::user()->id;
     $Basket['email']= Auth::user()->email;
     $Basket['productID'] = $basket['productID'];
     $Basket['qty'] = $basket['qty'];
     $Basket['price'] = $basket['price'];
     $Basket->save();
    }
    //delete the old guest basket
    DB::table('basket')->where('sessionID', Session::get('session_id'))->delete();
}
    }
  auth()->attempt($request->only('email', 'password'));
    $request->session()->put('user',$user);
  // if the user logging in is an admin, send them to a different page
    if($user->isadmin == true) {
      return redirect('/admin');
    } else {
      return redirect('/products');
    }

}
}

}



