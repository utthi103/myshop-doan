<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\categoryModel;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class categoryController extends Controller
{

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
        return view(view: 'category.addtype');
    }

    public function submit(Request $request){
        $this->checklogin();
    $data = new categoryModel;
    $data->name_category = $request->input('name_category');
    $data->note = $request->input('note_category');
    $result = $data->save();
    Session:: put('msg', 'Thêm thành công');
    return redirect()->route('category.tabletype');

    }

    public function display(){
        $this->checklogin();
        $catagories = categoryModel::paginate(5);
        return view('category.tabletype',['categories'=>$catagories]);
}

public function showdata($id){
    $this->checklogin();
    $data = categoryModel::find($id);
    return view('category.edit',['data'=>$data]);
}
public function edit( $id, Request $request){
    $this->checklogin();
    //  $data = new categoryModel;
    $data = categoryModel::find($id);
    //
    $data->name_category = $request->name_category;
    // tinyMCE.activeEditor.getContent();
    $data->note          = $request->note_category;
    $data->save();
    Session:: put('msg', 'Sửa thành công');
    return redirect()->route('category.tabletype');
}

public function delete($id){
    $this->checklogin();
    $data = categoryModel::find($id);
    $data->delete();
    Session:: put('msg', 'Xóa thành công');
    return redirect()->route('category.tabletype');
}

}
