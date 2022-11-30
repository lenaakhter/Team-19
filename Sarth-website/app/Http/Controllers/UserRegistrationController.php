<?php

namespace App\Http\Controllers;
use App\Models\Basket;
use App\Models\User;
use App\Models\Userinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
class UserRegistrationController extends Controller
{
    /*

    Displays the userRegistration view.

    */
    public function show(){
        return view('userRegistration');

    }

    /*

    Validates user information and creates a new user and logs them in.

     */
    public function storeUserInformation(Request $request){
        /*

        Validates the data inputted by the user matches the set rules.

        */
       $this->validate($request, [

        'Fullname' => ['required', 'max:255'],
        'Username' => ['required', 'max:255'],
        'email' => ['required', 'max:255', 'unique:userinformation,email,exists,0'],
        'password' => ['required','min:8' ,'max:255', 'confirmed'],
        'password_confirmation' => 'required'
       ]);

       /*

       If validation is a new account is created.

       */
       Userinformation::create([
        'username' => $request->Username,
        'name' => $request->Fullname,
        'password' => Hash::make($request->password),
        'email' =>$request->email
        ]);

        auth() ->attempt([
        'email' => $request-> email,
        'password' => $request->password
        ]);

    /*

    User is logged in after account is created

     */
    $user= Userinformation::where(['email'=>$request->email])->first();

    $request->session()->put('user',$user);
    if(session()->has('user')){
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
    return redirect('products');
    }
}
