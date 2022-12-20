<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\productModel;
use App\Models\categoryModel;
use App\Models\blogModel;
use Session;
session_start();

class blogController extends Controller
{

    // quan li admin
    public function tableblog(){
        $blog = blogModel::paginate(5);
        return view('blog.tableblog', ['blog'=>$blog]);
    }


    public function form(){
        
        return view('blog.add');
    }


    public function add(Request $request){
        $blog = blogModel::paginate(5);
        $data = new blogModel;

        $data->category = $request->input('category');
        $data->title = $request->input('title');
        $data->image = $request->file('image')->getClientOriginalName();
// https://toidicode.com/upload-files-trong-laravel-43.html
        $path1 = $request->file('image')->store('img');
        $image = $request->file('image');
        $storedPath1 = $image->move('img', $image->getClientOriginalName());
        // $imagename = Carbon::now()->timestamp().'.'.$this->storedPath1->extension()
        $data->content = $request->input('content');
        $data->save();
        Session:: put('msg', 'Thêm thành công');
        // return view ('blog.tableblog', ['blog'=>$blog]);
        return redirect()->route('blog');
    }


    public function delete($id, Request $request){
        $blog = blogModel::paginate(5);
        $data = blogModel::find($id);
        $data->delete();
        unlink('img/'.$data['image'].'');
        Session:: put('msg', 'Xóa thành công');
        // return view ('blog.tableblog', ['blog'=>$blog]);
        return redirect()->route('blog');
        // return $data;
    }

    public function edit($id, Request $request){
        $data = blogModel::find($id);
        // $data->id_category = $request->input('id_category');
        $data->title = $request->input('title');

        $data->category = $request->input('category');

        $img_new1 = $request->file('image');
        $img_old1 = $request->input('image_old');
        if ($img_new1) {
            $data->image = $request->file('image')->getClientOriginalName();
            $path1 = $request->file('image')->store('img');
            $image = $request->file('image');
            $storedPath1 = $image->move('img', $image->getClientOriginalName());
    
        }else{
            $data->image = $request->input('image_old1');
        }

        $data->content = $request->input('content');
        $data->save();
        Session:: put('msg', 'Sửa thành công');
        return redirect()->route('blog');
    }

    public function form_edit($id, Request $request){
        $data = blogModel::find($id);
        // $categories = $data->name_category;
        return view('blog.edit', ['data'=>$data]);
    }
    public function display(){
        $catagories = categoryModel::all();
        $blog_category = blogModel::paginate(2);
        // return $blog_category ;
        return view('user.shop.blog',[ 'categories'=>$catagories,'blog_category'=>$blog_category]);
    }

    public function blog_detail($id, Request $request){
        $blog_category = blogModel::paginate(2);
        $catagories = categoryModel::all();
        $blog = blogModel::find($id);
        return view('user.shop.blog_detail', [ 'categories'=>$catagories,'blog_category'=>$blog_category, 'bloge'=>$blog]);
    }
}
