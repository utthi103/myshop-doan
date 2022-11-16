<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myaccountController extends Controller
{
    public function display(){
        return view('account.myaccount');
    }
}
