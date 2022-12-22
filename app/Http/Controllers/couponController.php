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

    public function checklogin(){
        $id_user = Session::get('id_admin');
        if($id_user){
            return Redirect::to('/admin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

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
    $this->checklogin();
    $coupon = couponModel::paginate(5);
    return view('user.coupon.list_coupon',['coupon'=>$coupon]);
}

public function form_coupon(){
    $this->checklogin();
    return view('user.coupon.add_coupon');
}

        public function add_coupon(Request $request){
            $this->checklogin();
            $coupon = new couponModel;
            $coupon->name = $request->input('name');
            $coupon->code = $request->input('code');
            $coupon->percent = $request->input('percent');
            $coupon->number = $request->input('number');
            $coupon->save();
            Session:: put('msg', 'Thêm mã thành công');
            return Redirect::to('/coupon');
        }

        public function delete_coupon($id){
            $this->checklogin();
            $coupon = couponModel::find($id);
            $coupon->delete();
            Session:: put('msg', 'Xóa thành công');
            return Redirect::to('/coupon');
        }

        public function form_edit_coupon($id){
            $this->checklogin();
            $coupon = couponModel::find($id);
            return view('user.coupon.edit_coupon', ['coupon'=>$coupon]);
        }

        public function edit_coupon($id, Request $request){
            $this->checklogin();
            $coupon = couponModel::find($id);
            $coupon->name = $request->input('name');
            $coupon->code = $request->input('code');
            $coupon->percent = $request->input('percent');
            $coupon->number = $request->input('number');
            $coupon->save();
            Session:: put('msg', 'Sửa thành công');
            return Redirect::to('/coupon');
        }

}
