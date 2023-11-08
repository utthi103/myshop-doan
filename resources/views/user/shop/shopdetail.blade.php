@extends('layouts.user')
 
@section('title')
    <title>Chi tiết sản phẩm</title>

@stop
{{-- @section('logo')
    <img src="{{ asset('img/cayphattai.jpg') }}" alt="">
@stop --}}

@section('content')
<section class="product-details spad">
    <div class="container">
        <?php
                $error = Session::get('error');
                if($error){
                    echo ' 
                <div class="alert alert-success">
                <span class="text-alert">'.$error.'</span>
                </div>
                ';
                    Session::put('error',null);
                }

                ?>
        <form>
        <div class="row">
                <input type="hidden" name="" value="{{ $products->id_product }}" class="cart_product_id_{{ $products->id_product }}">
                <input type="hidden" name="" value="{{ $products->name_product }}" class="cart_product_name_{{ $products->id_product }}">
                <input type="hidden" name="" value="{{ $products->image1 }}" class="cart_product_img_{{  $products->id_product}}">
                <input type="hidden" name="" value="{{ $products->price_sale }}" class="cart_product_price_sale_{{ $products->id_product }}">
                <input type="hidden" name="" value="{{ $products->count_product }}" class="cart_product_count_{{ $products->id_product }}">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        
                        <img class="product__details__pic__item--large"
                            src="{{ asset('img/'.$products['image1'].'') }}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="{{ asset('img/'.$products['image1'].'') }}"
                            src="{{ asset('img/'.$products['image1'].'') }}" alt="">
                        <img data-imgbigurl="{{ asset('img/'.$products['image2'].'') }}"
                            src="{{ asset('img/'.$products['image2'].'') }}" alt="">
                        <img data-imgbigurl="{{ asset('img/'.$products['image3'].'') }}"
                            src="{{ asset('img/'.$products['image3'].'') }}" alt="">
                        
                    </div>
                </div>
            </div>
       

            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $products['name_product'] }}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    
             
                    <div class="product__details__price">${{ $products['price_sale'] }}</div>
                 
                        <div>{!! $products['decription_product'] !!}</div>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text"   name="qty"  class="cart_product_qty_{{ $products->id_product }}" > 
                            </div>
                        </div>
                    </div>
                    <a type="button" style="padding: 13px 28px 14px; color: white;
                    background: #7fad39;" data-id_product="{{  $products->id_product}}" class="add_to_cart">Thêm vào giỏ hàng</a>
                    <a type="button" data-id_product="{{  $products->id_product}}" class="heart-icon add_to_wishlist"><span class="icon_heart_alt"></span></a>
               
                    <ul>
                        <li><b>Phí giao hàng</b> <span>Miễn phí giao hàng.</span></li>
                        <li><b>Share</b>
                            <div class="share">
                                <a href="#" style="font-size: 20px; color: #7fad39;"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#" style="font-size: 20px;  color: #7fad39;"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#" style="font-size: 20px; color: #7fad39;"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" style="font-size: 20px; color: #7fad39;"><i class="fa-brands fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Mô tả</a>
                        </li>
                     
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc" style="    padding-left: 5%;">
                                <h6>Thông tin sản phẩm</h6>
                                <div>{!! $products['decription'] !!}</div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>

@stop

@section('product_similar')
<section class="related-product">

    <div class="col-lg-11 col-md-12">
        <div class="product__discount" style="margin-left: 10%;">
            <div class="section-title product__discount__title">
                <h2>Related Product</h2>
            </div>
            <div class="row">
                <div class="product__discount__slider owl-carousel">
                    @foreach ($similar_product as $similar)
                    <div class="col-lg-4">
                        <div class="product__discount__item">
                            <div class="product__discount__item__pic set-bg"
                                data-setbg="{{ asset('img/'.$similar['image1'].'') }}">
                                <div class="product__discount__percent">{{ $similar['sale_product'] }}%</div>
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ route('product.detail',['id'=> $similar->id_product]) }}"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                                {{-- <span>Dried Fruit</span> --}}
                                <h5><a href="#">{{ $similar['name_product'] }}</a></h5>
                                <ul>
                                    <li class="start"><i class="fa-regular fa-star"></i></i></li>
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
    
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
    
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                                   </ul>
                                <?php
                                $price_sale = $similar['price_product'] - ($similar['price_product']*$similar['sale_product']/100 );
                            ?>
                                <span style="font-weight: 630;
                                font-size: 18px;
                                color: #79a206;" class="price_sale">$<?php echo  $price_sale ?> </span>
                                
                                <span style="text-decoration: line-through;
                                font-weight: 400;
                                font-size: 12px;
                                margin-left: 5px; " class="price_old">${{ $similar['price_product'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>
@stop

