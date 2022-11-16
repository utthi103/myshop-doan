<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\userModel;
use App\Models\productModel;
use App\Models\categoryModel;
// use App\Models\userModel;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class loginController extends Controller
{

    public function display(){
        return view('layouts.login');
    }
        public function login(Request $request){
            // $user = new userModel;
          
                    $account_user = $request->input('account_user');
                    $user = userModel::where('account_user', $account_user)->first();
                    if($user){
                           $id_auth = $user->id_auth;
                    }
                   
                 
                    $pass_user = $request->input('pass_user');
                    $result = userModel::where('account_user', $account_user)->where('pass_user', $pass_user)->first();
                    
                    if($result && ($id_auth==1)){
                        Session::put('account_user',$result->account_user);
                        Session::put('id_user',$result->id_user);
                        return view('layouts.admin');
                        // return redirect()->route('product.home');
                        // return $user;
                    }else if($result && ($id_auth==2)){
                        Session::put('account_user',$result->account_user);
                        Session::put('id_user',$result->id_user);
                        // return redirect()->route('product.home');
                        // return Redirect::to('/user');
                        $catagories = categoryModel::all();
                        $product_oustand = productModel::where('outstand_product', 'có')->get();
        $product_new = productModel::orderBy('date_product', 'desc')->take(4)->get();
                        return view('user.shop.shophome',[ 'categories'=>$catagories,
                        'product_oustand'=>$product_oustand,
                            'product_new'=>$product_new
                        ]);
                    }else 
                    
                    {
                        Session::put('message','Mật khẩu hoặc tên đăng nhập không đúng. Vui lòng kiểm tra lại thông tin');
                        // return Redirect::to('/admin');
                        // return redirect()->route('user.sign');
                        // return Redirect::to('/');
                        return view('layouts.login');
                    }
                
         
        } 
        
        
        public function logout(){
            Session::put('account_user',null);
    		Session::put('id_user',null);
            return view('layouts.login');
        }
}
