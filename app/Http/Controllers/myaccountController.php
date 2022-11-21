<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class myaccountController extends Controller
{
    public function checklogin(){
        $id_user = Session::get('id_user');
        if($id_user){
            return Redirect::to('/');
        }else{
            return Redirect::to('/form_signin')->send();
        }
    }
    public function display(){
        $this->checklogin();
        return view('account.myaccount');
    }
}
