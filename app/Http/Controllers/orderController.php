<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use App\Models\userModel;
use App\Models\order_tableModel;
use App\Models\order_detailModel;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;
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
        $order=order_tableModel::paginate(4);

        return view('order.order', ['order'=>$order]);
        // return $order;
    }

    public function not_order(){
        $order=order_tableModel::where('status', 0)->paginate(4);
        return view('order.not_order', ['order'=>$order]);
    }
    public function duyet($id, Request $request){
        $this->checklogin();
        $order_edit = order_tableModel::find($id);
        $id_user =  $order_edit->id_user;
        $user = userModel::find($id_user);
        $email_user = $user->email_user;

        if( $order_edit['status']==0){
             $order_edit->status = 1;
             $order_edit->save();
             $to_name = 'SHOP';
            
             $to_email =  $email_user ;
             $data = array("code"=> $id );
             Mail::send('order.duyet',$data,function($message) use ($to_email, $to_name  ){
              $message->to($to_email)->subject('Duyệt đơn hàng');//send this mail with
              $message->from($to_email, $to_name);//send from this mail
              });
            
        }
        // else{
        //     $order_edit->status = 0;
        //     $order_edit->save();
          
        // }
        $order=order_tableModel::all();
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
        $data = order_tableModel::find($id);
        $data->delete();
        // Session:: put('msg', 'Xóa thành công');
        return redirect()->route('product.order');
    }
}
