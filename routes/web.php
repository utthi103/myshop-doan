<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return view('layouts.admin');
    // return "Xin chào";

});

// Route::get('/','loginController@display');
Route::get('/', function () {
    return view('layouts.login');
});


Route::prefix('user')->group(function () {
    Route::post('/sign',[
        'as'=>'user.sign',
        'uses'=>'App\Http\Controllers\loginController@login'
    ] );

    Route::get('/logout',[
        'as'=>'user.logout',
        'uses'=>'App\Http\Controllers\loginController@logout'
    ] );
});


Route::prefix('category')->group(function () {
    Route::get('/create',[
        'as'=>'category.create',
        'uses'=>'App\Http\Controllers\categoryController@create'
    ] );
    Route::get('/tabletype',[
        'as'=>'category.tabletype',
        'uses'=>'App\Http\Controllers\categoryController@display'
    ] );
    Route::post('/tabletype',[
        'as'=>'category.submit',
        'uses'=>'App\Http\Controllers\categoryController@submit'
    ] );
    Route::get('/edit/{id}',[
        'as'=>'category.showdata',
        'uses'=>'App\Http\Controllers\categoryController@showdata'
    ] );
    Route::post('/edit/{id}',[
        'as'=>'category.edit',
        'uses'=>'App\Http\Controllers\categoryController@edit'
    ] );

    Route::get('/delete/{id}',[
        'as'=>'category.delete',
        'uses'=>'App\Http\Controllers\categoryController@delete'
    ] );
});

Route::prefix('product')->group(function () {
    Route::get('/tableproduct',[
        'as'=>'product.tableproduct',
        'uses'=>'App\Http\Controllers\productController@display'
    ] );

    Route::get('/create',[
        'as'=>'product.create',
        'uses'=>'App\Http\Controllers\productController@create'
    ] );
  
    Route::post('/addproduct',[
        'as'=>'product.submit',
        'uses'=>'App\Http\Controllers\productController@submit'
    ] );
    Route::get('/showimage',[
        'as'=>'product.showimage',
        'uses'=>'App\Http\Controllers\productController@showimage'
    ] );

    Route::get('/delete/{id}',[
        'as'=>'product.delete',
        'uses'=>'App\Http\Controllers\productController@delete'
    ] );
    Route::get('/edit/{id}',[
        'as'=>'product.showdata',
        'uses'=>'App\Http\Controllers\productController@showdata'
    ] );
    Route::post('/edit/{id}',[
        'as'=>'product.edit',
        'uses'=>'App\Http\Controllers\productController@edit'
    ] );
});

Route::prefix('order')->group(function () {
    Route::get('/display',[
        'as'=>'product.order',
        'uses'=>'App\Http\Controllers\orderController@display'
    ] );
    Route::get('/duyet/{id}',[
        'as'=>'order.duyet',
        'uses'=>'App\Http\Controllers\orderController@duyet'
    ] );
    
    Route::get('/delete/{id}',[
        'as'=>'order.delete',
        'uses'=>'App\Http\Controllers\orderController@delete'
    ] );

    Route::get('/detail/{id_detail}',[
        'as'=>'order.detail',
        'uses'=>'App\Http\Controllers\orderController@detail'
    ] );
    

});

Route::prefix('account_user')->group(function () {
    Route::get('/account',[
        'as'=>'account.user',
        'uses'=>'App\Http\Controllers\accountController@display'
    ] );
    Route::get('/delete/{id}',[
        'as'=>'account.delete',
        'uses'=>'App\Http\Controllers\accountController@delete'
    ] );

    Route::get('/role/{id}',[
        'as'=>'account.role',
        'uses'=>'App\Http\Controllers\accountController@role'
    ] );

    

});


Route::prefix('myaccount')->group(function () {
    Route::get('/account',[
        'as'=>'account.detail',
        'uses'=>'App\Http\Controllers\myaccountController@display'
    ] );

    

});


Route::prefix('user')->group(function () {
    Route::get('/',[
        'as'=>'product.home',
        'uses'=>'App\Http\Controllers\shopController@home'
    ] );

    

});


Route::prefix('myshop')->group(function () {
    Route::get('/listproduct',[
        'as'=>'product.listproduct',
        'uses'=>'App\Http\Controllers\shopController@display'
    ] );

    Route::get('/listcategory/{id}',[
        'as'=>'product.listcategory',
        'uses'=>'App\Http\Controllers\shopController@listcategory'
    ] );

    
    Route::get('/detail/{id}',[
        'as'=>'product.detail',
        'uses'=>'App\Http\Controllers\shopController@detail'
    ] );

    Route::get('/search',[
        'as'=>'search.price',
        'uses'=>'App\Http\Controllers\shopController@search_price'
    ] );

    Route::get('/searchname',[
        'as'=>'search.nameca',
        'uses'=>'App\Http\Controllers\shopController@search_name'
    ] );
    Route::get('/blog',[
        'as'=>'product.blog',
        'uses'=>'App\Http\Controllers\blogController@display'
    ] );
    Route::get('/cart',[
        'as'=>'product.cart',
        'uses'=>'App\Http\Controllers\cartController@display'
    ] );

    Route::get('/addcart/{id}',[
        'as'=>'add.cart',
        'uses'=>'App\Http\Controllers\cartController@addcart'
    ] );

    Route::get('/cart/{rowId}',[
        'as'=>'delete.cart',
        'uses'=>'App\Http\Controllers\cartController@delete_cart'
    ] );

    Route::get('/updatecart/{rowId}',[
        'as'=>'update.cart',
        'uses'=>'App\Http\Controllers\cartController@delete_cart'
    ] );

});

// check out

Route::prefix('checkout')->group(function () {
    Route::get('/check',[
        'as'=>'user.checkout',
        'uses'=>'App\Http\Controllers\checkoutController@display'
    ] );
        Route::post('/submit',[
            'as'=>'checkout.submit',
            'uses'=>'App\Http\Controllers\checkoutController@save'
        ] );

    
    

});



