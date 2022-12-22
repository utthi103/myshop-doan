@extends('layouts.user')
 
@section('title')
    <title>Trang chủ</title>

@stop
{{-- @section('logo')
    <img src="{{ asset('img/cayphattai.jpg') }}" alt="">
@stop --}}

@section('content')
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
          
            <div class="col-lg-12">
                <?php
                $message = Session::get('message');
                $update = Session::get('update');
                if($message){
                    echo ' 
                <div class="alert alert-success">
                <span class="text-alert">'.$message.'</span>
                </div>
                ';
                    Session::put('message',null);
                }

                if($update){
                    echo ' 
                <div class="alert alert-success">
                <span class="text-alert">'.$update.'</span>
                </div>
                ';
                    Session::put('update',null);
                }
                ?>
                <div class="shoping__cart__table">
                    <?php
                    //      $total = 0;
                    // $carts = Cart::content();
   ?>   
                    <form action="{{ URL::to('/update_cart') }}" method="POST">
                        @csrf

                   
                    <table class="table table-bordered" style="	table-layout:fixed;
                    width:100%; 	border-collapse: collapse; text-align: center">
                        <thead style="    background: #e1e1e1;">
                            <tr>
                                <th>Image</th>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $total = 0;
                            if((Session::get('cart'))!=null){
                                 $carts = Session::get('cart');
                               
                            ?>

                            @foreach ($carts as $key=>$cart)
                            <?php
                        
                        $subtotal = $cart['qty']*$cart['price_product'];
                        $total = $total + $subtotal;
                            ?>
                                  <tr>
                                <td class="shoping__cart__item" style="text-align: center">
                                    <img src="{{ asset('img/'.$cart['img_product'].'') }}" width="100px" alt="">
                                   
                                </td>
                                <td class="" style="vertical-align: middle;">
                                    {{-- <h5>{{ number_format($cart['name_product'],0,',','.')}}</h5> --}}
                                    <h5>{{ $cart['name_product'] }}</h5>
                                 </td>
                                <td class="shoping__cart__price">
                                   ${{ $cart['price_product'] }}
                                   {{-- ${{ number_format($cart['price_product'],0,',','.')}} --}}
                                </td>
                                <td class="shoping__cart__quantity" style="vertical-align: middle;">
                                    <div class="quantity">
                                        {{-- <input type="number" min  value="{{ $cart['qty'] }}" name="qty_product[{{ $cart['session_id'] }}]"> --}}

                                        <div class="pro-qty">                                          
                                         <input type="text"  value="{{ $cart['qty'] }}" name="qty_product[{{ $cart['session_id'] }}]">
                                        </div>
                                    </div>

                                </td>
                                <td class="shoping__cart__total">
                                   <?php
                                        // $subtotal = $cart['qty']*$cart['price_product'];
                                        // echo '$'.number_format($subtotal,0,',','.');
                                        echo '$'.$subtotal;
                                   ?>
                                </td>
                                <td class="shoping__cart__item__close" style="line-height: 120px; text-align: center">
                                    {{-- <a href="{{ route('delete.cart',['rowId'=>$cart->rowId]) }}"></a> --}}
                                    <a href="{{ URL::to('/delete_card/'.$cart['session_id']) }}"><span style="color: #23711a;" class="fa-solid fa-xmark"></span></i></a>
                                   
                                </td>
                            </tr> 
                            @endforeach
                            <?php }else{ ?>
                                <div class="alert alert-danger" role="alert">
                                    Giỏ hàng trống
                                  </div>
                                <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('product.listproduct') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <button style="border-color: white;" type="submit" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</button>
                </div>
            </form>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form action="{{ URL::to('apply') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="code" placeholder="Nhập mã giảm giá" value="{{ old('code') }}">
                            <button type="submit" class="site-btn" style="font-family: initial;">Áp dụng mã giảm</button>
                        </form>
                        <form action="{{ URL::to('delete') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <button type="submit" class="site-btn" style="font-family: initial; margin-left: 48.5%; margin-top: 2%;
                        width: 41%;">Xóa mã giảm</button>
                        </form>
                        <?php
                        $success_coupon = Session::get('success_coupon');
                        $erro = Session::get('erro');
                        if($success_coupon){
                            echo ' 
                        <div class="alert alert-success" style="    margin-top: 3%;
    width: 90%;">
                        <span class="text-alert">'.$success_coupon.'</span>
                        </div>
                        ';
                            Session::put('success_coupon',null);
                        }
        
                        else if($erro){
                            echo ' 
                        <div class="alert alert-danger" style="    margin-top: 3%;
    width: 90%;">
                        <span class="text-alert">'.$erro.'</span>
                        </div>
                        ';
                            Session::put('erro',null);
                        }
                        ?>
                       </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng giỏ hàng</h5>
                    <ul>
                        <li>Tổng phụ <span><?php
                        //   echo '$'.number_format($total,0,',','.');
                        echo $total;
                            ?></span></li>

        <?php
    $id = Session::get('id_coupon');
    if(isset($id)){
        $percent = Session::get('percent');
        $discount = ($total * $percent )/100;
        $tong = $total - $discount;
        echo'
        <li> Số tiền được giảm <span>
             '.$discount.'
            </span></li>
        ';
    }

?>
                        <li>Tổng <span><?php
                               if(isset($id)){echo $tong ;}
                            else{echo $total; }
                                ?></span></li>
                    </ul>
                    <a href="{{ URL::to('/show_checkout') }}" class="primary-btn">Kiểm tra thông tin - Đặt hàng </a>

                </div>
            </div>
        </div>
    </div>
</section>

@stop



