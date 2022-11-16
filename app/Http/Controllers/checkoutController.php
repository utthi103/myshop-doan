<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use App\Models\userModel;
use App\Models\orderModel;
use App\Models\order_detailModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
session_start();
class checkoutController extends Controller
{
    public function display(){
        $id_user = Session::get('id_user');
        $catagories = categoryModel::all();
            if(isset( $id_user )){
                $user= userModel::find($id_user);
            }

            // return $user['last_name'];
        return view('user.shop.checkout', ['categories'=>$catagories, 'users'=>$user]);

    }

    public function save(Request $request){
        $order = new orderModel;
        $order->id_user = Session::get('id_user');
       $first = $request->input('first_name');
       $last  = $request->input('last_name');
       $order->name_user = $first.' '.$last;
       $order->phone = $request->input('phone');
       $order->address = $request->input('address');
       $order->pay = $request->input('pay');
       $order->total = Cart::subtotal();
       $order->status = 0;
       $order->order_note = $request->input('note');
        $order->save();
        $cart = Cart::content();
        foreach ($cart as $key) {
            $order_detail = new order_detailModel;
            $order_detail->id_user = Session::get('id_user');
            $order_detail->id_product = $key->id;
            $order_detail->count = $key->qty;
            $order_detail->price = $key->price*$key->qty;
            $order_detail->save();
        }
        

    }
}
