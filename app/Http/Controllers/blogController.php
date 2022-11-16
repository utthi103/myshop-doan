<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\productModel;
use App\Models\categoryModel;

class blogController extends Controller
{
    public function display(){
        $catagories = categoryModel::all();
        return view('user.shop.blog',[ 'categories'=>$catagories]);
    }
}
