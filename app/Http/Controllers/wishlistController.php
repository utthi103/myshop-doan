<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class wishlistController extends Controller
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
        // Session::put('wishlist', null);
        $categories = categoryModel::all();
        return view('user.shop.wishlist',['categories'=>  $categories ]);
    }

    public function add(Request $request){
        $this->checklogin();
        $data = $request->all();
        $wishlist_id = substr(md5(microtime()), rand(0,26), 5);
        $wishlist = Session::get('wishlist');
    

        if($wishlist==true){
            $check = 0;
            foreach ($wishlist as $key => $value) {
               if($value['id_product']==$data['id_product']){
                $check = $check+1;
               }

               if($check==0){
                    $wishlist[] = array(
                   'wishlist_id'=> $wishlist_id  ,
                   'id_product'=>$data['id_product'],
                   'name_product'=>$data['name_product'],
                   'img_product'=>$data['img_product'],
                   'price_product'=>$data['price_product'],
                   'count'=>$data['count'],
                   'qty'=>$data['qty'],
               );
                Session::put('wishlist', $wishlist);
               }
            }
        }else{
                 $wishlist[] = array(
                'wishlist_id'=> $wishlist_id  ,
                'id_product'=>$data['id_product'],
                'name_product'=>$data['name_product'],
                'img_product'=>$data['img_product'],
                'price_product'=>$data['price_product'],
                'count'=>$data['count'],
                'qty'=>$data['qty'],
            );
           
        }
        Session::put('wishlist', $wishlist);
        Session::save();
    }

    public function delete_wishlist_product($wishlist_id){
        $this->checklogin();
        // Session::put('wishlist', null);
        $wishlist = Session::get('wishlist');
        if($wishlist==true){
            foreach ($wishlist as $key => $value) {
                if($value['wishlist_id']==$wishlist_id){
                    unset($wishlist[$key]);
                }
            }
            Session::put('wishlist', $wishlist);
            Session::put('message', 'Xóa thành công');
        }
            return redirect()->back();

    }

}
