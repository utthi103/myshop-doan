<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    public function display(){
        return view('layouts.register');
    }

    public function register(Request $request){
        return $request->all();
    }
}
