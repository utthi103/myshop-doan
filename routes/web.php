<?php

use Illuminate\Support\Facades\Route;

// Admin
// form login admin
Route::get('/form_login', function () {
    return view('admin.login');
});


// button login
// Route::post('/admin-login','loginController@login_admin');
Route::post('admin-login', [\App\Http\Controllers\loginController::class, 'login_admin']);
// logout
Route::get('admin-logout', [\App\Http\Controllers\loginController::class, 'logout']);
// trang chu admin
Route::get('/admin', function () {
    return view('layouts.admin');

});

// quan ly danh muc
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

// quan ly san pham
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

// quan ly hoa don

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

    Route::get('/detail/{id_order}',[
        'as'=>'order.detail',
        'uses'=>'App\Http\Controllers\orderController@detail'
    ] );
    

});




// user
Route::get('/form_signin', function () {
    return view('layouts.login');
});

// buttion login
Route::post('user-login', [\App\Http\Controllers\userloginController::class, 'login']);
// logout
Route::get('user-logout', [\App\Http\Controllers\userloginController::class, 'logout']);


// trang chu user
Route::get('', [\App\Http\Controllers\shopController::class, 'home']);

Route::prefix('/')->group(function () {
    Route::post('/sign',[
        'as'=>'user.sign',
        'uses'=>'App\Http\Controllers\loginController@login'
    ] );

    // Route::get('/logout',[
    //     'as'=>'user.logout',
    //     'uses'=>'App\Http\Controllers\loginController@logout'
    // ] );
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

    Route::post('/search',[
        'as'=>'search.price',
        'uses'=>'App\Http\Controllers\shopController@search_price'
    ] );

    Route::post('/searchname',[
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

    Route::get('/cart/{session_id}',[
        'as'=>'delete.cart',
        'uses'=>'App\Http\Controllers\cartController@delete_cart'
    ] );

    Route::get('/updatecart/{rowId}',[
        'as'=>'update.cart',
        'uses'=>'App\Http\Controllers\cartController@delete_cart'
    ] );

});

// cart
Route::post('add_to_card', [\App\Http\Controllers\cartController::class, 'add']);
Route::get('show_card', [\App\Http\Controllers\cartController::class, 'display']);
Route::get('delete_card/{session_id}', [\App\Http\Controllers\cartController::class, 'delete_cart_product']);
Route::post('update_cart', [\App\Http\Controllers\cartController::class, 'update_cart']);

// wishlist
Route::get('show_wishlist', [\App\Http\Controllers\wishlistController::class, 'display']);
Route::post('add_to_wishlist', [\App\Http\Controllers\wishlistController::class, 'add']);
Route::get('delete_wishlist/{wishlist_id}', [\App\Http\Controllers\wishlistController::class, 'delete_wishlist_product']);





// check out

// Route::prefix('checkout')->group(function () {
//     Route::get('/check',[
//         'as'=>'user.checkout',
//         'uses'=>'App\Http\Controllers\checkoutController@display'
//     ] );
//         Route::post('/submit',[
//             'as'=>'checkout.submit',
//             'uses'=>'App\Http\Controllers\checkoutController@save'
//         ] );

// });

// check out
Route::get('show_checkout', [\App\Http\Controllers\checkoutController::class, 'display']);
Route::post('process_checkout', [\App\Http\Controllers\checkoutController::class, 'save']);

// forget password
// show form doi mat khau
Route::get('show_email', [\App\Http\Controllers\forgetController::class, 'display']);
// button tiep theo
Route::post('send_email', [\App\Http\Controllers\forgetController::class, 'sendmail']);
// show form doi mat khau
Route::post('show_code', [\App\Http\Controllers\forgetController::class, 'showcode']);
//reset pass
Route::post('reset_pass', [\App\Http\Controllers\forgetController::class, 'reset_pass']);

// account user
Route::get('myaccount', [\App\Http\Controllers\myaccountController::class, 'myaccount']);
Route::post('save', [\App\Http\Controllers\myaccountController::class, 'save']);

// register
Route::get('register', [\App\Http\Controllers\registerController::class, 'display']);


