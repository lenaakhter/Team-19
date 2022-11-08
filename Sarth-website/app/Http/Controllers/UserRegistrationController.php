<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistrationController extends Controller
{
    public function show(){
        return view('userRegistration');

    }

    public function store(){
        return ("works");
    }
}
