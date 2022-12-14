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
                         $total = 0;
                    $carts = Cart::content();
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
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if((Session::get('wishlist'))!=null){
                                 $wishlists = Session::get('wishlist');
                               
                            ?>

                            
                            @foreach ($wishlists as $key=>$wishlist)
                                  <tr>
                                <td class="shoping__cart__item" style="text-align: center">
                                    <img src="{{ asset('img/'.$wishlist['img_product'].'') }}" width="100px" alt="">
                                   
                                </td>
                                <td class="" style="vertical-align: middle;">
                                    {{-- <h5>{{ number_format($cart['name_product'],0,',','.')}}</h5> --}}
                                    <h5>{{ $wishlist['name_product'] }}</h5>
                                 </td>
                                <td class="shoping__cart__price">
                                   ${{ $wishlist['price_product'] }}
                                   {{-- ${{ number_format($cart['price_product'],0,',','.')}} --}}
                                </td>
                                <td class="shoping__cart__quantity" style="vertical-align: middle;">
                                    <a href="{{ route('product.detail',['id'=> $wishlist['id_product']]) }}"
                                    style="    background: #79a206;  font-size: 12px;  font-weight: 500;  height: 38px;  line-height: 18px;  padding: 10px 20px;  color: #ffffff;  text-transform: uppercase;  border-radius: 3px;    cursor: pointer;">
                                        Xem chi tiet</a>
                                </td>
                                <td class="shoping__cart__item__close" style="line-height: 120px; text-align: center">
                                    <a href="{{ URL::to('/delete_wishlist/'.$wishlist['wishlist_id']) }}"><span style="color: #23711a;" class="fa-solid fa-xmark"></span></i></a>
                                   
                                </td>
                            </tr> 
                            @endforeach
                            <?php }else{ ?>
                                <div class="alert alert-danger" role="alert">
                                    Danh sách trống
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
                </div>
            </form>
            </div>
     
        </div>
    </div>
</section>

@stop



