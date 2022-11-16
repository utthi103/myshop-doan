<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
session_start();
class cartController extends Controller
{
    public function display(){
        $catagories = categoryModel::all();
        return view('user.shop.cart', ['categories'=>$catagories]);
    }

    public function addcart($id){
        $catagories = categoryModel::all();
        $product= productModel::find($id);
        $data = Cart::content();
        $check = false;
        $cart = Session::get('cart');
        $cart['id'] = $product->id_product;
        $cart['qty'] = 1;
        $cart['name'] = $product->name_product;
        $cart['price'] = $product->price_sale;
        $cart['weight'] = $product->price_sale;
        $cart['options']['img'] = $product->image1;
        
        // $cart['options']['id_user'] = Session::get('id_user');
       
        Cart::add($cart);
         return redirect()->route('product.cart');
        // return $i ;
    
        
    }



    public function delete_cart($rowId){
        Cart::update($rowId, 0);
        $catagories = categoryModel::all();
        // return view('user.shop.cart',['categories'=>$catagories]);
        // return Redirect::to('/cart');
        return redirect()->route('product.cart');
    }

    public function update($rowId){
        return Cart::search($rowId);
    }
}
