<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    return redirect('products');
    }
}
