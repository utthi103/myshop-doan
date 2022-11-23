<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use Illuminate\Support\File;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class productController extends Controller
{
    // use withFileUploads;
    // public $storedPath1;
    public function display(){
        $this->checklogin();
        $products = productModel::paginate(5);
        return view('product.tableproduct',['products'=>$products]);
        // return view('product.tableproduct'); 
    }
    public function checklogin(){
        $id_user = Session::get('id_admin');
        if($id_user){
            return Redirect::to('/admin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function create(){
        $this->checklogin();
        $categories = $this->showtype();

        return view('product.addproduct',['categories'=>$categories]);
    }
    public function showtype(){
        $this->checklogin();
        $categoty = categoryModel::all();
        return $categoty;

    }

    public function submit(Request $request){
        $this->checklogin();
        $data = new productModel;

        $data->name_product = $request->input('name_product');
        $data->name_category = $request->input('name_category');

        $data->price_product = $request->input('price_product');
        $data->count_product = $request->input('count_product');

        $data->image1 = $request->file('image1')->getClientOriginalName();
// https://toidicode.com/upload-files-trong-laravel-43.html
        $path1 = $request->file('image1')->store('img');
        $image1 = $request->file('image1');
        $storedPath1 = $image1->move('img', $image1->getClientOriginalName());
        // $imagename = Carbon::now()->timestamp().'.'.$this->storedPath1->extension();
      


        $data->image2 = $request->file('image2')->getClientOriginalName();
        $path2 = $request->file('image2')->store('img');
        $image2 = $request->file('image2');
        $storedPath2 = $image2->move('img', $image2->getClientOriginalName());

        $data->image3 = $request->file('image3')->getClientOriginalName();
        $path3 = $request->file('image3')->store('img');
        $image3 = $request->file('image3');
        $storedPath3 = $image3->move('img', $image3->getClientOriginalName());

        $data->decription_product = $request->input('decription_product');

        $data->sale_product = $request->input('sale_product');
        $data->outstand_product = $request->input('outstand_product');
        $data->price_sale = $data->price_product-($data->price_product*$data->sale_product)/100;
     
        $data->save();
        Session:: put('msg', 'Thêm thành công');
       
        return redirect()->route('product.tableproduct');
        // return $image1->getRealPath();;

    }

    public function showimage(){
            // $product = productModel::find($image);
        return view('product.addproduct');
        // return $product;
    }


    public function showdata($id){
        $this->checklogin();
        $categories = $this->showtype();
        $data = productModel::find($id);
        return view('product.edit',['data'=>$data, 'categories'=>$categories]);
    }

    public function edit($id, Request $request){
        $this->checklogin();
        $data = productModel::find($id);
        // $data->id_category = $request->input('id_category');
        $data->name_product = $request->input('name_product');

        $data->name_category = $request->input('name_category');

        $data->price_product = $request->input('price_product');
        $data->count_product = $request->input('count_product');

        $img_new1 = $request->file('image1');
        $img_old1 = $request->input('image_old');
        if ($img_new1) {
            $data->image1 = $request->file('image1')->getClientOriginalName();
            $path1 = $request->file('image1')->store('img');
            $image1 = $request->file('image1');
            $storedPath1 = $image1->move('img', $image1->getClientOriginalName());
    
        }else{
            $data->image1 = $request->input('image_old1');
        }

        $img_new2 = $request->file('image2');
        $img_old2 = $request->input('image_old');
        if ($img_new2) {
            $data->image2 = $request->file('image2')->getClientOriginalName();
            $path2 = $request->file('image2')->store('img');
            $image2 = $request->file('image2');
            $storedPath2 = $image2->move('img', $image2->getClientOriginalName());
    
        }else{
            $data->image2 = $request->input('image_old2');
         
        }

        $img_new3 = $request->file('image3');
        $img_old3 = $request->input('image_old');
        if ($img_new3) {
            $data->image3 = $request->file('image3')->getClientOriginalName();
            $path3 = $request->file('image3')->store('img');
            $image3 = $request->file('image3');
            $storedPath3 = $image3->move('img', $image3->getClientOriginalName());
    
        }else{
            $data->image3 = $request->input('image_old3');
        }


        $data->decription_product = $request->input('decription_product');

        $data->sale_product = $request->input('sale_product');
        $data->outstand_product = $request->input('outstand_product');
        $data->price_sale= $data->price_product- ( $data->price_product*$data->sale_product)/100;
     
        $data->save();
        Session:: put('msg', 'Sửa thành công');
        return redirect()->route('product.tableproduct');
    }

    public function delete($id){
        $this->checklogin();
        $data = productModel::find($id);
        $data->delete();
        // unlink('img/'.$data['image1'].'');
        // unlink('img/'.$data['image2'].'');
        // unlink('img/'.$data['image3'].'');
        Session:: put('msg', 'Xóa thành công');
        
        return redirect()->route('product.tableproduct');
       
    }
}
