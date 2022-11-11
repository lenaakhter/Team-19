<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Userinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App;
use Illuminate\Support\Facades\Auth;
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
  //++recheck this block of code later
    $incorrectDetails = "email or password incorrect";
    return $incorrectDetails;
}
else
{
  /*Added by Muniib */
  auth()->attempt($request->only('email', 'password'));
  /*Added by Muniib */

    $request->session()->put('user',$user);
  
    // $che =$request->session()->put('user');  
    // print_r($che);
    //print_r(session());

    // Added by Hasnain
    // added to direct users to correct page
    //not working in the right way
    // if(!(auth()->user()-> isAdmin == 'true')) {
    //     return view('admin.adminPage');
    // } else 
    return redirect('/products');

    //return error_log($user);

   // Session::get('user')['name'];   //used to get the name from the session[]
   // echo ("logged in now!");
    
}  
} 

}

/*$email= $r->email;
$password= $r->password;

$session= new App\Login::where('email', $email)->where('password', $password)->get();

if (count($session)>0){

}else{

}
    }

   */ 

  /**public function doLogin() {
    // Creating Rules for Email and Password
    $rules = array(
      'email' => 'required|email'
      'password' => 'required|alphaNum|min:8'
      // password has to be greater than 3 characters and can only be alphanumeric and);
      // checking all field
      $validator = Validator::make(Input::all() , $rules);
      // if the validator fails, redirect back to the form
      if ($validator->fails())
        {
        return Redirect::to('login')->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else
        {
        // create our user data for the authentication
        $userdata = array(
          'email' => Input::get('email') ,
          'password' => Input::get('password')
        );
        // attempt to do the login
        if (Auth::attempt($userdata))
          {
          // validation successful
          // do whatever you want on success
          }
          else
          {
          // validation not successful, send back to form
          return Redirect::to('checklogin');
          }
        }
      }*/

