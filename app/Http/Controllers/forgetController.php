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
use Mail;
use Session;
session_start();
class forgetController extends Controller
{
    public function display(){
        $catagories = categoryModel::all();
        return view('forgetpass.email', ['categories'=>$catagories]);
    }

    public function sendmail(Request $request){
        $email = $request->input('email');
        $list_email = userModel::where('email_user', $email )->first();
        if($list_email){
            Session::put('email_user', $email);
            $code = substr(md5(microtime()), rand(0,26), 9);
            Session::put('code', $code);
            $body_massage = 'ma xac minh của ban';
            $to_name = 'SHOP';
            
            $to_email = $email;//send to this email
            $data = array("code"=> $code); //body of
           
            Mail::send('forgetpass.sendmail',$data,function($message) use ($to_email, $to_name  ){
            $message->to($to_email)->subject('Mã xác minh tài khoản của bạn ');//send this mail with
            $message->from($to_email, $to_name);//send from this mail
            });
            return view('forgetpass.code');
        }else{
             Session::put('notfound', 'Không tồn tại email này');
            //  return view('forgetpass.email');
             return Redirect::to('/show_email')->withInput();
        }
    }

    public function showcode(Request $request){
        $code = $request->input('code');
        if($code==Session::get('code')){
            return view('forgetpass.resetpass');
        }else{
            Session::put('code_wrong', 'Sai mã xác nhận');
            // return Redirect::to('/show_code')->withInput();
            return view('forgetpass.code');
        }
    }

    public function reset_pass(Request $request){
        $pass = md5( $request->input('pass'));
        $confirm_pass = md5($request->input('confirm_pass'));
        if($pass==$confirm_pass){
            $email_user = Session::get('email_user');
            $user = userModel::find($email_user);
            $user->pass_user = $pass;
            // $user->save();
            // return  $user->pass_user ;
            // Session::put('pass_sucss', 'Mật khẩu không trùng khớp');
            // return view('forgetpass.resetpass');
        }else{
            Session::put('pass_wrong', 'Mật khẩu không trùng khớp');
            return view('forgetpass.resetpass');
        }
        // return $request->all();
    }
}
