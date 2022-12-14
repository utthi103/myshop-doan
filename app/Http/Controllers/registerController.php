<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\userModel;
use Session;
session_start();

class registerController extends Controller
{
    public function display(){
        return view('layouts.register');
    }

    public function register(Request $request){ 
        // $id_user = $request->input('');
        $data = new userModel;
        $data->first_name = $request->input('first_name');
        $data->last_name = $request->input('last_name');
        $data->gender_user = $request->input('gender');
        $data->phone = $request->input('phone');
        $data->email_user = $request->input('email');
        $data->address_user = $request->input('address_user');
        $data->account_user = $request->input('account_user');
        $data->pass_user = md5($request->pass);
        $pass_user = md5($request->pass);
       $re_pass = md5($request->re_pass);
        $data->id_auth = 2;
        if($pass_user ==  $re_pass ){
            
            $data->save();
            return Redirect::to('/form_signin')->withInput();
        }else{
            Session:: put('msg', 'Mật khẩu không trùng khớp');
            
            return Redirect::to('/register')->withInput();
        }
        
    }
}
