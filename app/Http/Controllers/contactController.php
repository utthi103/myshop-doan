<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModel;
use App\Models\categoryModel;
class contactController extends Controller
{
    public function display(){
        $categories = categoryModel::all();
        return view('user.shop.contact', ['categories'=>$categories  ]);
    }
}
