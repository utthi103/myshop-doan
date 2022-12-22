<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\userModel;
use App\Models\couponModel;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class couponController extends Controller
{
   public function apply(Request $request){
    $code = $request->input('code');
    $coupon = couponModel::where('code', $code)->where('number', '>', 0)->first();
    if($coupon){

        Session::put('id_coupon', $coupon->id);
        Session::put('percent', $coupon->percent);
        Session::put('success_coupon', 'Áp dụng thành công');
    }else{
        Session::put('erro', 'Mã giảm giá không tồn tại');
    }
    return Redirect::to('/show_card')->withInput();
    // return $coupon->percent;
   }

   public function delete(){
    $id = Session::get('id_coupon');
    if(isset( $id)){
        Session::put('id_coupon', null);
    Session::put('percent',null);
    Session::put('success_coupon', 'Xóa mã thành công');
    }
   return Redirect::to('/show_card');

   }



//    ADMIN

public function coupon(){
    $coupon = couponModel::paginate(5);
    return view('user.coupon.list_coupon',['coupon'=>$coupon]);
}

}
