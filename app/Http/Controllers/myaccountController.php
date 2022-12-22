<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\File;
use App\Models\productModel;
use App\Models\categoryModel;
use App\Models\userModel;
use App\Models\orderModel;
use App\Models\order_detailModel;

use Session;
session_start();
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
    // public function display(){
    //     $this->checklogin();
    //     return view('account.myaccount');
    // }

    public function myaccount(){
        $categories = categoryModel::all();
        $id = Session::get('id_user');
        $user = userModel::find($id);
        return view('account.myaccount', ['categories'=>$categories, 'user'=>$user]);
    }

    public function save(Request $request){
        $this->checklogin();
        $categories = categoryModel::all();
        $id = Session::get('id_user');
        $user = userModel::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->gender_user = $request->input('gender_user');
        $user->phone = $request->input('phone');
        $user->address_user = $request->input('address_user');

        $avt = $request->file('avt');
        if($avt!=null){
            
             $user->avt = $request->file('avt')->getClientOriginalName();
        $path2 = $request->file('avt')->store('img');
        $image2 = $request->file('avt');
        $storedPath2 = $image2->move('img', $image2->getClientOriginalName());
        $name = $request->input('path_avt');
        unlink('img/'.$name.'');
        }
       
        $pass_old = $request->input('pass_old');
        $pass_new = $request->input('pass_new');
        $pass = $request->input('password');

        if( $pass_old !=null && $pass_new !=null &&  $pass !=null ){
            $pass_db = $user['pass_user'];
            if($pass_db == (md5($pass_old))){
                if($pass_new == $pass ){
                    $user->pass_user = md5( $pass_new);
                    Session::put('pass_mess','Đổi mật khẩu thành công');
                }else{
                    Session::put('pass_mess','Mật khẩu không trùng khớp');
                }
            }else{
                Session::put('pass_mess','Mật khẩu không đúng');
            }
        }
        $user->update();
        // Session::put('info','Thay đổi thông tin thành công');
       
        // return view('account.myaccount', ['categories'=>$categories, 'user'=>$user]);
        // return redirect()->back();
        return Redirect::to('/myaccount')->withInput();

    }

    public function history(){
        $categories = categoryModel::all();
        $id_user = Session::get('id_user');
        $order = orderModel::where('id_user', $id_user)->where('status',1)->get();
        $not_order = orderModel::where('id_user', $id_user)->where('status',0)->get();
        return view('user.shop.table_history',['categories'=>$categories,'order'=>$order, 'not_order'=>$not_order]);
        // return $order;
    }

    public function history_detail($id){
        $categories = categoryModel::all();
        $order_detail = order_detailModel::where('id_order', $id)->get();
        // $notorder_detail = order_detailModel::where('id_order', $id)->get();
        return view('user.shop.history_detail',['categories'=>$categories,'order_detail'=>$order_detail
    ]);
        // return $order_detail;
    }
}
