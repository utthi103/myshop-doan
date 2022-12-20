<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use App\Models\blogModel;
// use App\Models\categoryModel;
use Illuminate\Support\File;
use Session;
session_start();

class shopController extends Controller
{

    public function display(){
        $product = productModel::paginate(6);
        $catagories = categoryModel::all();
        return view('user.shop.myshop',['products'=>$product, 'categories'=>$catagories]);
}

public function detail($id){
    // $product = productModel::paginate(3);
    $product= productModel::find($id);
    $similar_product = productModel::all();
        $catagories = categoryModel::all();
        return view('user.shop.shopdetail',[ 'products'=>$product,'categories'=>$catagories,'similar_product'=> $similar_product]);
}


public function home(){
        $catagories = categoryModel::all();
        // $product_oustand = DB::table('product')->where('outstand_product', 'có')->get();
        $product_oustand = productModel::where('outstand_product', 'có')->get();
        $product_new = productModel::orderBy('date_product', 'desc')->take(4)->get();
        $blog = blogModel::all();
       
        return view('user.shop.shophome',[ 'categories'=>$catagories,
        'product_oustand'=>$product_oustand,
            'product_new'=>$product_new,
            'blog'=>$blog
        ]);
        // return $product_new ;
}


public function listcategory($id){
    $product=productModel::where('name_category', $id)->paginate(6);
    $catagories = categoryModel::all();
    // return $product;
    return view('user.shop.myshop', ['productt'=>$product, 'categories'=>$catagories]);
}

public function search_price(Request $request){
    $min = $request->input('min_price');
    $max = $request->input('max_price');
    $min = explode('$', $min);
    $max = explode('$', $max);
    $min =  $min[1];
    $max = $max[1];
        $catagories = categoryModel::all();
    $price_sale = productModel::whereBetween('price_sale', [$min,$max])->paginate(6);
    // return $min[1];
    return view('user.shop.myshop', ['price_sale'=>$price_sale,'categories'=>$catagories]);
    // return $max;
}
    public function search_name(Request $request){
        $name_product = $request->input('name_product');
         $catagories = categoryModel::all();
        $results = productModel::where('name_product', 'LIKE', '%'.$name_product.'%')->paginate(6);
        // return $min[1];
        // $productg = productModel::whereLike('name_product', $name_product)->get();
 
    //  return view('user.shop.myshop', ['results '=>$results,'categories'=>$catagories]);
    return view('user.shop.myshop')->with('results',$results)->with('categories',$catagories);
    // return  $results;

    }
    



}
