<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\categoryModel;
use Session;
session_start();
class categoryController extends Controller
{
    public function create(){
        return view(view: 'category.addtype');
    }

    public function submit(Request $request){
    $data = new categoryModel;
    $data->name_category = $request->input('name_category');
    $data->note = $request->input('note_category');
    $result = $data->save();
    Session:: put('msg', 'Thêm thành công');
    return redirect()->route('category.tabletype');

    }

    public function display(){
        $catagories = categoryModel::paginate(5);
        return view('category.tabletype',['categories'=>$catagories]);
}

public function showdata($id){
    $data = categoryModel::find($id);
    return view('category.edit',['data'=>$data]);
}
public function edit( $id, Request $request){
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
    $data = categoryModel::find($id);
    $data->delete();
    Session:: put('msg', 'Xóa thành công');
    return redirect()->route('category.tabletype');
}

}
