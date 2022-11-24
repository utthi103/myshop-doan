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
class cartController extends Controller
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
        $catagories = categoryModel::all();
        return view('user.shop.cart', ['categories'=>$catagories]);
    }

    // public function addcart($id){
    //     $this->checklogin();
    //     $catagories = categoryModel::all();
    //     $product= productModel::find($id);
    //     $data = Cart::content();
    //     $check = false;
    //     $cart = Session::get('cart');
    //     $cart['id'] = $product->id_product;
    //     $cart['qty'] = 1;
    //     $cart['name'] = $product->name_product;
    //     $cart['price'] = $product->price_sale;
    //     $cart['weight'] = $product->price_sale;
    //     $cart['options']['img'] = $product->image1;
        
    //     // $cart['options']['id_user'] = Session::get('id_user');
       
    //     Cart::add($cart);
    //      return redirect()->route('product.cart');
    //     // return $i ;
    
        
    // }



    public function delete_cart($rowId){
        
        $this->checklogin();
        Cart::update($rowId, 0);
        $catagories = categoryModel::all();
        // return view('user.shop.cart',['categories'=>$catagories]);
        // return Redirect::to('/cart');
        return redirect()->route('product.cart');
    }

    public function update($rowId){
        return Cart::search($rowId);
    }



    public function add(Request $request){
        $this->checklogin();
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0,26), 5);
        $cart = Session::get('cart');
    

        if($cart==true){
            $check = 0;
            foreach ($cart as $key => $value) {
               if($value['id_product']==$data['id_product']){
                $check = $check+1;
               }

               if($check==0){
                if($data['qty']<=$data['count']){
                    $cart[] = array(
                   'session_id'=> $session_id ,
                   'id_product'=>$data['id_product'],
                   'name_product'=>$data['name_product'],
                   'img_product'=>$data['img_product'],
                   'price_product'=>$data['price_product'],
                   'count'=>$data['count'],
                   'qty'=>$data['qty'],
               );
               }else{
                    die();
               }
                Session::put('cart', $cart);
               }
            }
        }else{
            if($data['qty']<=$data['count']){
                 $cart[] = array(
                'session_id'=> $session_id ,
                'id_product'=>$data['id_product'],
                'name_product'=>$data['name_product'],
                'img_product'=>$data['img_product'],
                'price_product'=>$data['price_product'],
                'count'=>$data['count'],
                'qty'=>$data['qty'],
            );
            }else{
             die();
            }
           
        }
        Session::put('cart', $cart);
        Session::save();
    }

    public function delete_cart_product($session_id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach ($cart as $key => $value) {
                if($value['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            Session::put('message', 'Xóa thành công');
        }
            return redirect()->back();

    }

    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        $check = false;
        if($cart==true){
            foreach ($data['qty_product'] as $key => $qty) {
                // echo $value. '<br>';
                foreach ($cart as $session_cart => $val) {
                    if($val['session_id']==$key){
                        // if($cart['count'])
                        //  $cart[$session_cart]['qty'] = $qty;
                        if(($cart[$session_cart]['count']) < ($qty)){
                            Session::put('update', $val['name_product'].' vượt quá số lượng, vui lòng kiểm tra lại');
                            return redirect()->back();
                        }else{
                            // $check = true;
                            $cart[$session_cart]['qty'] = $qty;
                            Session::put('cart', $cart);
                            
                        }
                    }
                   
                }

            }
           
            // Session::put('cart', $cart);
        }
        // return redirect()->back();
 return redirect()->back();
    }
}
