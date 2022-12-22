<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use App\Models\userModel;
use App\Models\orderModel;
// use App\Models\userModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
session_start();
class accountController extends Controller
{
    
  
    
    public function display(){
        $id_admin = Session::get('id_admin');
        $user = userModel::where('id_user','<>',$id_admin )->get();
        // $user = userModel::all();
        return view('account.account', ['user'=>$user]);
    }


    public function delete($id){
        $account = userModel::find($id);
        $account->delete();
        // Session:: put('msg', 'Xóa thành công');
        return redirect()->route('account.user');
    }

    public function role($id){
        $user = userModel::find($id);
    //    $id_auth =  $user['id_auth'];
       if($user['id_auth'] == 1){
        $user->id_auth = 2;
        $user->save();
       }else{
        $user->id_auth = 1;
        $user->save();
       }
       return redirect()->route('account.user');
    }
    
}
