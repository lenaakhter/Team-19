<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegistrationController extends Controller
{
    public function show(){
        return view('userRegistration');

    }

    public function storeUserInformation(Request $request){
       $this ->validate($request, [
        'email' => ['required', 'email', 'max:50'],
        'Fullname' => ['required', 'max:255'],
        'Username' => ['required', 'max:255'],
        'password' => ['required','min:8' ,'max:255', 'confirmed'],
        'password_confirmation' => 'required'
       ]);

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
    
    
    $user= Userinformation::where(['email'=>$request->email])->first();

    $request->session()->put('user',$user);

    
    
    return redirect('products');
    }
}
