<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use App\Models\userModel;
use App\Models\orderModel;
use App\Models\order_detailModel;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
session_start();

class orderController extends Controller
{

    public function checklogin(){
        $id_user = Session::get('id_admin');
        if($id_user){
            return Redirect::to('/admin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function display(){
        $this->checklogin();
        $order=orderModel::paginate(4);

        return view('order.order', ['order'=>$order]);
        // return $order;
    }
    public function duyet($id, Request $request){
        $this->checklogin();
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

    public function detail($id_order){
        $this->checklogin();
        $order_detail = order_detailModel::where('id_order',$id_order )->get();
        return view('order.order_detail',['order_details'=>$order_detail]);
    //  return redirect()->route('order.detail')->with('order_details',$order_detail);
    }

    public function delete($id){
        $this->checklogin();
        $data = orderModel::find($id);
        $data->delete();
        // Session:: put('msg', 'Xóa thành công');
        return redirect()->route('product.order');
    }
}
