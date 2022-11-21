<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\userModel;
use App\Models\adminModel;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class userloginController extends Controller
{

        public function login(Request $request){
            $account_user = $request->input('account_user');
            $pass_user = md5($request->pass_user);
            $user =  userModel::where('account_user', $account_user)->where('pass_user', $pass_user)->first();
            if($user){
                Session::put('account_user', $user->account_user);
                Session::put('id_user',$user->id_user);
                return Redirect::to('/');
            }else{
                Session::put('message','Mật khẩu hoặc tên đăng nhập không đúng. Vui lòng kiểm tra lại thông tin');
                return Redirect::to('/form_signin')->withInput();
            }
         
        } 
        
        public function checklogin(){
            $id_user = Session::get('id_user');
            if($id_user){
                return Redirect::to('/');
            }else{
                return Redirect::to('/form_signin')->send();
            }
        }
        
        
        public function logout(){
             $this->checklogin();
            Session::put('account_user',null);
    		Session::put('id_user',null);
            return Redirect::to('/');
        }
}
