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

class orderController extends Controller
{
    public function display(){
        $order=orderModel::all();

        return view('order.order', ['order'=>$order]);
        // return $order;
    }
    public function duyet($id, Request $request){
          
        $order_edit = orderModel::find($id);
        if( $order_edit['status']==0){
             $order_edit->status = 1;
             $order_edit->save();
            
        }else{
            $order_edit->status = 0;
            $order_edit->save();
          
        }
        $order=orderModel::all();
        return redirect()->route('product.order')->with('order',$order);
        // return view('order.order', ['order'=>$order,'check'=>$check ]);
    }

    public function detail($id_user){
        // $order_detail = order_detailModel::find($id_user);
        $data = order_detailModel::where('id_user', $id_user)->get();
        // $date = 
        $user  = orderModel::where('id_user', $id_user)->first();
        $date = $user['date'];
         $detail =  order_detailModel::where('id_user', $id_user)->where('date', $date)->get();
         return $detail;
    }

    public function delete($id){
        $data = orderModel::find($id);
        $data->delete();
        // Session:: put('msg', 'Xóa thành công');
        return redirect()->route('product.order');
    }
}
