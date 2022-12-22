<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use App\Models\userModel;
use App\Models\orderModel;
use App\Models\order_detailModel;
use App\Models\couponModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Session;
use Mail;
session_start();
class checkoutController extends Controller
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
        $id_user = Session::get('id_user');
        $catagories = categoryModel::all();
            if(isset( $id_user )){
                $user= userModel::find($id_user);
            }

            // return $user['last_name'];
        return view('user.shop.checkout', ['categories'=>$catagories, 'users'=>$user]);

    }
    public function save(Request $request){
            $this->checklogin();
            $carts = Session::get('cart');
            $total = 0;
            foreach ($carts as $key => $value) {
                $total+=($value['qty']*$value['price_product']);
            }
            // insert table order
            $order = array();
        $order['id_user'] = Session::get('id_user');
       $first = $request->input('first_name');
       $last  = $request->input('last_name');
       $order['name_user'] = $first.' '.$last;
       $order['phone'] = $request->input('phone');
       $order['address'] = $request->input('address');
       $order['pay'] = $request->input('pay');
       $order['total'] = $total;
       $order['status'] = 0;
       $order['order_note'] = $request->input('note');
       $order_id =DB::table('order')->insertGetId($order);

    //    insert order_detail
    
    foreach ($carts as $key => $cart) {
        $order_detail = new order_detailModel;
            $order_detail->id_order = $order_id;
            $order_detail->id_product = $cart['id_product'];
            $order_detail->name_product = $cart['name_product'];
            $order_detail->count = $cart['qty'];
            $order_detail->price = $cart['price_product']*$cart['qty'];
            $order_detail->save();
    }
       foreach ($carts as $key => $update) {
        $product = productModel::where('id_product',$update['id_product'])->first(); 
        $product->count_product = $product->count_product - $update['qty'];
        $product->save();
       }
       Session::put('checkout', 'Cảm ơn bạn đã đặt hàng, đơn hàng của bạn đang chờ xét duyệt');
       $to_name = 'SHOP';
            
       $to_email =Session::get('email_user');
       $data = array("code"=> 'Đơn hàng của bạn đã được đặt thành công, vui lòng chờ xét duyệt');
       Mail::send('forgetpass.duyet',$data,function($message) use ($to_email, $to_name  ){
        $message->to($to_email)->subject('Xác nhận đơn hàng');//send this mail with
        $message->from($to_email, $to_name);//send from this mail
        });

        // coupon
        $id = Session::get('id_coupon');
        if(isset( $id)){
            $coupon = couponModel::where('id', $id)->first();
            $coupon->number =  $coupon->number - 1;
            $coupon->save();
            Session::put('id_coupon', null);
        Session::put('percent',null);
        }
        Session::put('cart',null);

    return Redirect::to('/show_checkout')->withInput();
    // return view('user.shop.checkout');

    }
}
