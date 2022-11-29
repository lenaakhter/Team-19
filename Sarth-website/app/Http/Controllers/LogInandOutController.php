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
use Session;


class LogInandOutController extends Controller
{

  // This method displays the login page
    public function Login() {
    // Show the form
    return view('/loginPage');
    }

    // This method logs in the user
public function doLogin(Request $request) {
//error_log($request ->email);
//the following gets the input from the fields
//$email = $request ->email;
//$password= $request->password;

$user= Userinformation::where(['email'=>$request->email])->first();  //check first the email supplied matches with the one in database.
if(!$user || !Hash::check($request->password,$user->password))  //Hash and check of the user input password and actuall password in database match
{
  //++recheck this block of code later
  $this->validate($request, [
  'email' => ['required'],
  'password' => ['required'],
   ]);
   if(!auth()->attempt($request->only('email', 'password'))){
    return back()->with('status', 'Invalid login details');
   }
  //++recheck this block of code later

}
else
{
    if( auth()->attempt($request->only('email', 'password'))){

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
  /*Added by Muniib */
    $request->session()->put('user',$user);


    // Added by Hasnain for admin redirection and user redirection.
    if($user->isadmin == true) {
      return redirect('/admin');
    } else {
      return redirect('/products');
    }

}
}

}


