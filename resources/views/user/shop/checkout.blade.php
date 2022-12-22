@extends('layouts.user')
 
@section('title')
    <title>Trang chủ</title>

@stop

@section('logo')
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('img/slide1.png') }}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
           <h3 style="font-size: 54px;">BIG SALE</h3>
          <p style="color:  #79a206;">Disscount 20% off</p>
          <a href="{{ route('product.listproduct') }}" class="button">Shop Now</a>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('img/slide2.png') }}" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
           <h3 style="font-size: 54px;">TOP SALE</h3>
          <p style="color:  #79a206;">Disscount 20% off</p>
          <a href="{{ route('product.listproduct') }}" class="button" >Shop Now</a>
        </div>
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/slide3.png') }}" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
             <h3 style="font-size: 54px;">LOVELY PLANTS</h3>
            <p style="color:  #79a206;">Disscount 20% off</p>
            <a href="{{ route('product.listproduct') }}" class="button">Shop Now</a>
          </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
@stop

@section('content')
<section class="checkout spad" style="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                        $checkout = Session::get('checkout');
                        if($checkout){
                    echo ' 
                <div class="alert alert-success">
                <span class="text-alert">'.$checkout.'</span>
                </div>
                ';
                    Session::put('checkout',null);
                }
                ?>
                {{-- <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6> --}}
            </div>
        </div>
        <div class="checkout__form" style="    padding-left: 2%;
        padding-right: 2%;">
            <h4>Chi tiết thanh toán</h4>
            <form action="{{URL::to('/process_checkout') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ<span>*</span></p>
                                    <input type="text" value={{ $users['first_name'] }} name="first_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Tên<span>*</span></p>
                                    <input type="text" value="{{ $users['last_name'] }}" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" value="{{ $users['address_user'] }}" name="address"> 
                           
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số diện thoại<span>*</span></p>
                                    <input type="text" value="{{ $users['phone'] }}" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" value={{ $users['email_user'] }} name="email">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú<span>*</span></p>
                                {{-- <textarea  name="note" id="" cols="30" rows="10" style="width: 100%;text-align: left;"  placeholder="Notes about your order, e.g. special notes for delivery."> --}}
                                {{-- </textarea> --}}
                                <input type="textarea" name="note" id="note"  value="{{ old('note') }}" cols="30" rows="10" style="width: 100%;text-align: left; height: 180px;"  placeholder="Notes about your order, e.g. special notes for delivery." >
        
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <?php
                            $total_cart = 0;
                            $total = 0;
                        $price= 0;
                        $carts = Session::get('cart');
                        if((Session::get('cart'))!=null ){
                            $carts  = Session::get('cart');
                            foreach ($carts as $key => $cart) {
                            $total += $cart['qty']*$cart['price_product'];
                        }

                        }

                            ?>
                            <h4>Đơn hàng</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                            <ul>
                                @foreach ( $carts   as $cart)
                                     <li>{{$cart['name_product'] }} <span>$<?php
                                        $price =$cart['qty']*$cart['price_product'];
                                        echo  $price;
                                   ?></span></li>
                                
                                @endforeach
                               
                            </ul>
                            <div class="checkout__order__subtotal">Tạm tính <span>$<?php echo $total;  ?></span></div>
                            <?php
    $id = Session::get('id_coupon');
    if(isset($id)){
        $percent = Session::get('percent');
        $discount = ($total * $percent )/100;
        $tong = $total - $discount;
        echo'
        <div class="checkout__order__total">Số tiền được giảm <span>'. $discount  .'</span></div>
        ';
    }

?>
                            <div class="checkout__order__total">Tổng <span>$<?php if(isset($id)){echo $tong;}
                            else{echo $total;}
                            
                            ;  ?></span></div>
                            
                            <div class="checkout__input__checkbox">
                             
                                    <input type="radio" id="html" name="pay" value="Check Payment">
                                    <label for="html">Check Payment</label><br>
                                    <input type="radio" id="html" name="pay" value="Paypal">
                                    <label for="html">Paypal</label><br>
                                    <span class="checkmark"></span>
                            
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@stop