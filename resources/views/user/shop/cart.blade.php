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
                <div class="shoping__cart__table">
                    <?php
                    $carts = Cart::content();
   ?>
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
                            @foreach ($carts as $cart)
                                  <tr>
                                <td class="shoping__cart__item" style="text-align: center">
                                    <img src="{{ asset('img/'.$cart->options->img.'') }}" width="100px" alt="">
                                   
                                </td>
                                <td class="" style="vertical-align: middle;">
                                    <h5>{{ $cart->name }}</h5>
                                 </td>
                                <td class="shoping__cart__price">
                                   ${{ $cart->price }}
                                </td>
                                <td class="shoping__cart__quantity" style="vertical-align: middle;">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            
                                           <a href="{{ route('update.cart',['rowId'=>$cart->rowId]) }}"><span class="dec qtybtn" style="color: #691818; margin-left: -18px;">-</span></a> 
                                         <input type="text" value="{{ $cart->qty }}">
                                         <a href="{{ route('update.cart',['rowId'=>$cart->rowId]) }}">  <span class="inc qtybtn" style="color: #521212; margin-left: -18px;">+</span></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                   <?php
                                        $subtotal = $cart->qty*$cart->price;
                                        echo $subtotal;
                                   ?>
                                </td>
                                <td class="shoping__cart__item__close" style="line-height: 120px; text-align: center">
                                    <a href="{{ route('delete.cart',['rowId'=>$cart->rowId]) }}"><span class="fa-solid fa-xmark"></span></a>
                                    {{-- <a href="{{ route('delete.cart',['rowId'=>$cart->rowId]) }}"><i class="fa-solid fa-xmark"></i></a> --}}
                                   
                                </td>
                            </tr> 
                            @endforeach
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>{{ Cart::subtotal() }}</span></li>
                        <li>Total <span>{{ Cart::subtotal() }}</span></li>
                    </ul>
                    <a href="{{ route('user.checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>

@stop



