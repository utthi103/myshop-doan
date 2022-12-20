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
<div class="shipping_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="{{ asset('img/shiping.png') }}" alt="">
                    </div>
                    <div class="shipping_content">
                        <h3>Free Delivery</h3>
                        <p>Free shipping around the world for all <br> orders over $120</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_shipping col_2">
                    <div class="shipping_icone">
                        <img src="{{ asset('img/shipping2.png') }}" alt="">
                    </div>
                    <div class="shipping_content">
                        <h3>Safe Payment</h3>
                        <p>With our payment gateway, don’t worry <br> about your information</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_shipping col_3">
                    <div class="shipping_icone">
                        <img src="{{ asset('img/shipping3.png') }}" alt="">
                    </div>
                    <div class="shipping_content">
                        <h3>Friendly Services</h3>
                        <p>You have 30-day return guarantee for <br> every single order</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="banner_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <figure class="single_banner">
                    <div class="banner_thumb">
                        <a href="{{ route('product.listproduct') }}"><img src="{{ asset('img/banner1.png') }}" alt=""></a>
                        <div class="banner_content">
                            <h3>Big Sale Products</h3>
                            <h2>Plants <br> For Interior</h2>
                            <a href="{{ route('product.listproduct') }}">Shop Now</a>
                        </div>
                    </div>
                </figure>
            </div>
            <div class="col-lg-6 col-md-6">
                <figure class="single_banner">
                    <div class="banner_thumb">
                        <a href="{{ route('product.listproduct') }}"><img src="{{ asset('img/banner2.png') }}" alt=""></a>
                        <div class="banner_content">
                            <h3>Top Products</h3>
                            <h2>Plants <br> For Healthy</h2>
                            <a href="{{ route('product.listproduct') }}">Shop Now</a>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
    </div>
</div>

<section class="related-product">

    <div class="col-lg-11 col-md-12">
        <div class="product__discount" style="margin-left: 10%;">
            <div class="section-title product__discount__title">
                <h2>Sản phẩm mới</h2>
            </div>
            <div class="row">
                <div class="product__discount__slider owl-carousel">
                    @foreach ($product_new as $product_news)
                    <div class="col-lg-4">
                        <div class="product__discount__item">
                            <div class="product__discount__item__pic set-bg"
                                data-setbg="{{ asset('img/'.$product_news['image1'].'') }}">
                                <div class="product__discount__percent">{{ $product_news['sale_product'] }}%</div>
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ route('product.detail',['id'=> $product_news->id_product]) }}"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                                {{-- <span>Dried Fruit</span> --}}
                                <h5><a href="#">{{ $product_news['name_product'] }}</a></h5>
                                <ul>
                                    <li class="start"><i class="fa-regular fa-star"></i></i></li>
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
    
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
    
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                                   </ul>
                                <?php
                                $price_sale = $product_news['price_product'] - ($product_news['price_product']*$product_news['sale_product']/100 );
                            ?>
                                <span style="font-weight: 630;
                                font-size: 18px;
                                color: #79a206;" class="price_sale">$<?php echo  $price_sale ?> </span>
                                
                                <span style="text-decoration: line-through;
                                font-weight: 400;
                                font-size: 12px;
                                margin-left: 5px; " class="price_old">${{ $product_news['price_product'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-11 col-md-12">
        <div class="product__discount" style="margin-left: 10%;">
            <div class="section-title product__discount__title">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <div class="row">
                <div class="product__discount__slider owl-carousel">
                    @foreach ($product_oustand as $product_oustands)
                    <form >
                        @csrf
                        {{-- 'img/'.$product['image1'].'' --}}
                        <input type="hidden" name="" value="{{ $product_oustands->id_product }}" class="cart_product_id_{{ $product_oustands->id_product }}">
                        <input type="hidden" name="" value="{{ $product_oustands->name_product }}" class="cart_product_name_{{ $product_oustands->id_product }}">
                        <input type="hidden" name="" value="{{ $product_oustands->image1 }}" class="cart_product_img_{{  $product_oustands->id_product}}">
                        <input type="hidden" name="" value="{{ $product_oustands->price_sale }}" class="cart_product_price_sale_{{ $product_oustands->id_product }}">
                        <input type="hidden" name="" value="{{ $product_oustands->count_product }}" class="cart_product_count_{{ $product_oustands->id_product }}">
                        <input type="hidden" name="" value="1" class="cart_product_qty_{{ $product_oustands->id_product }}">

                    <div class="col-lg-4">
                        <div class="product__discount__item">
                            <div class="product__discount__item__pic set-bg"
                                data-setbg="{{ asset('img/'.$product_oustands['image1'].'') }}">
                                <div class="product__discount__percent">{{ $product_oustands['sale_product'] }}%</div>
                                <ul class="product__item__pic__hover">
                                    <li><a type="button" data-id_product="{{  $product_oustands->id_product}}" class="add_to_wishlist"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ route('product.detail',['id'=> $product_oustands->id_product]) }}"><i class="fa fa-retweet"></i></a></li>
                                    <li><a type="button" data-id_product="{{   $product_oustands->id_product}}" class="add_to_cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                                {{-- <span>Dried Fruit</span> --}}
                                <h5><a href="#">{{ $product_oustands['name_product'] }}</a></h5>
                                <ul>
                                    <li class="start"><i class="fa-regular fa-star"></i></i></li>
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
    
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
    
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                                   </ul>
                             
                                <span style="font-weight: 630;
                                font-size: 18px;
                                color: #79a206;" class="price_sale"> ${{ $product_oustands['price_sale'] }} </span>
                                
                                <span style="text-decoration: line-through;
                                font-weight: 400;
                                font-size: 12px;
                                margin-left: 5px; " class="price_old">${{ $product_oustands['price_product'] }}</span>
                            </div>
                        </div>
                    </div>
                </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    {{-- blog --}}
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Bài viết</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                 @foreach ($blog as $item)
                <div class="col-lg-4 col-md-4 col-sm-6">
                          <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/'.$item['image'].'') }}" alt=""  width="200px">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i>{{ $item['date'] }}</li>
                                {{-- <li><i class="fa fa-comment-o"></i> 5</li> --}}
                            </ul>
                            <h5><a href="#">{{ $item['category'] }}</a></h5>
                            <p> {{ $item['title'] }} </p>
                        </div>
                    </div>
                    
                  
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    
    </section>

@stop