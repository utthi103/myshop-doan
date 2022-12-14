@extends('layouts.user')
 
@section('title')
    <title>Cửa hàng</title>

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
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            @foreach ($categories as $category)
                            <li><a href="{{ route('product.listcategory',['id'=> $category->name_category]) }}">{{ $category['name_category'] }}</a></li>
                            @endforeach
                 
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="0" data-max="10000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <form action="{{ route('search.price') }}" style="display: flex" method="POST">
                                        @csrf
                                        <input type="text" id="minamount" name="min_price">
                                    <input type="text" id="maxamount" name="max_price">
                                    <br>
                                    <button type="submit" class="btn btn-success" style="margin-left: 20%;">Tìm kiếm</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="sidebar__item sidebar__item__color--option">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h4>Popular Size</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                Large
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                Medium
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Small
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                Tiny
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div> --}}
                    {{-- <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-1.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-2.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-1.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-2.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                {{-- <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-1.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-2.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Vegetables</span>
                                        <h5><a href="#">Vegetables’package</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-3.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Mixed Fruitss</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-4.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-5.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-6.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                

                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  


                   @if (isset($price_sale))
                   @foreach ($price_sale as $price_sales)
                   <div class="col-lg-4 col-md-6 col-sm-6">
                       <div class="product__item">
                           {{-- 'img/'.$product['image1'].'' --}}
                           <div class="product__item__pic set-bg" data-setbg="{{ asset('img/'.$price_sales['image1'].'') }}">
                               <div class="product__discount__percent">{{ $price_sales['sale_product'] }}%</div>
                               <ul class="product__item__pic__hover">
                                   <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                   <li><a href="{{ route('product.detail',['id'=> $price_sales->id_product]) }}"><i class="fa fa-retweet"></i></a></li>
                                   <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                               </ul>
                           </div>
                           <div class="product__item__text">
                              <ul>
                               <li class="start"><i class="fa-regular fa-star"></i></i></li>
                               <li  class="start"><i class="fa-regular fa-star"></i></i></li>

                               <li  class="start"><i class="fa-regular fa-star"></i></i></li>

                               <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                               <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                              </ul>
                              <span class="name_category"> {{ $price_sales['name_category'] }}</span>
                               <h6><a href="#">{{ $price_sales['name_product'] }}</a></h6>
                               {{-- <h5>{{ $price_sales['price_product'] }}</h5> --}}
                               {{-- <div class="product__item__price" style="font-weight: 500;font-size: 15px; color: #79a206;">$30.00 <span style="text-decoration: line-through;font-size: 12px;">$88.00</span></div> --}}
                              
                               <span style="" class="price_sale">${{ $price_sales['price_sale'] }}</span>
                               
                               <span style=" " class="price_old">${{ $price_sales['price_product'] }}</span>
                           </div>
                       </div>
                   </div>
                   @endforeach
                   <div class="col-md-12">
                    {{ $price_sale->links('pagination::bootstrap-4') }}
                  
                  </div>
                   @elseif(isset($productt))
                          
                        @foreach ($productt as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                {{-- 'img/'.$product['image1'].'' --}}
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/'.$item['image1'].'') }}">
                                    <div class="product__discount__percent">{{ $item['sale_product'] }}%</div>
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{ route('product.detail',['id'=> $item->id_product]) }}"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                   <ul>
                                    <li class="start"><i class="fa-regular fa-star"></i></i></li>
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
    
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
    
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                                    <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                                   </ul>
                                   <span class="name_category"> {{$item['name_category'] }}</span>
                                    <h6><a href="#">{{ $item['name_product'] }}</a></h6>
                                    {{-- <h5>{{ $item['price_product'] }}</h5> --}}
                                    {{-- <div class="product__item__price" style="font-weight: 500;font-size: 15px; color: #79a206;">$30.00 <span style="text-decoration: line-through;font-size: 12px;">$88.00</span></div> --}}
                                   
                                    <span style="" class="price_sale">${{ $item['price_sale'] }}</span>
                                    
                                    <span style=" " class="price_old">${{ $item['price_product'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12">
                            {{ $productt->links('pagination::bootstrap-4') }}
                          
                          </div>
                       @elseif(isset($results))
                        @foreach ($results as $result)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                       <div class="product__item">
                           {{-- 'img/'.$product['image1'].'' --}}
                           <div class="product__item__pic set-bg" data-setbg="{{ asset('img/'.$result['image1'].'') }}">
                               <div class="product__discount__percent">{{ $result['sale_product'] }}%</div>
                               <ul class="product__item__pic__hover">
                                   <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                   <li><a href="{{ route('product.detail',['id'=> $result->id_product]) }}"><i class="fa fa-retweet"></i></a></li>
                                   <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                               </ul>
                           </div>
                           <div class="product__item__text">
                              <ul>
                               <li class="start"><i class="fa-regular fa-star"></i></i></li>
                               <li  class="start"><i class="fa-regular fa-star"></i></i></li>

                               <li  class="start"><i class="fa-regular fa-star"></i></i></li>

                               <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                               <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                              </ul>
                              <span class="name_category"> {{ $result['name_category'] }}</span>
                               <h6><a href="#">{{ $result['name_product'] }}</a></h6>
                               {{-- <h5>{{ $result['price_product'] }}</h5> --}}
                               {{-- <div class="product__item__price" style="font-weight: 500;font-size: 15px; color: #79a206;">$30.00 <span style="text-decoration: line-through;font-size: 12px;">$88.00</span></div> --}}
                               <span style="" class="price_sale">${{ $result['price_sale'] }} </span>
                               
                               <span style=" " class="price_old">${{ $result['price_product'] }}</span>
                           </div>
                       </div>
                   </div>
                   @endforeach
                   <div class="col-md-12">
                    {{ $results->links('pagination::bootstrap-4') }}
                  
                  </div>

                    @elseif(isset($products))
                          @foreach ($products as $product)
                         <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <form >
                                @csrf
                            {{-- 'img/'.$product['image1'].'' --}}
                            <input type="hidden" name="" value="{{ $product->id_product }}" class="cart_product_id_{{ $product->id_product }}">
                            <input type="hidden" name="" value="{{ $product->name_product }}" class="cart_product_name_{{ $product->id_product }}">
                            <input type="hidden" name="" value="{{ $product->image1 }}" class="cart_product_img_{{  $product->id_product}}">
                            <input type="hidden" name="" value="{{ $product->price_sale }}" class="cart_product_price_sale_{{ $product->id_product }}">
                            <input type="hidden" name="" value="{{ $product->count_product }}" class="cart_product_count_{{ $product->id_product }}">
                            <input type="hidden" name="" value="1" class="cart_product_qty_{{ $product->id_product }}">

                            
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/'.$product['image1'].'') }}">
                                <div class="product__discount__percent">{{ $product['sale_product'] }}%</div>
                                <ul class="product__item__pic__hover">
                                    {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                                    <li><a type="button" data-id_product="{{  $product->id_product}}" class="add_to_wishlist"><i class="fa fa-heart"></i></a></li>

                                    <li><a href="{{ route('product.detail',['id'=> $product->id_product]) }}"><i class="fa fa-retweet"></i></a></li>
                                    {{-- <li><a href="{{ route('add.cart',['id'=> $product->id_product]) }}"><i class="fa fa-shopping-cart"></i></a></li> --}}
                                    <li><a type="button" data-id_product="{{  $product->id_product}}" class="add_to_cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    
                                </ul>
                            </div>
                            <div class="product__item__text">
                               <ul>
                                <li class="start"><i class="fa-regular fa-star"></i></i></li>
                                <li  class="start"><i class="fa-regular fa-star"></i></i></li>

                                <li  class="start"><i class="fa-regular fa-star"></i></i></li>

                                <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                                <li  class="start"><i class="fa-regular fa-star"></i></i></li>
                               </ul>
                               <span class="name_category"> {{ $product['name_category'] }}</span>
                                <h6><a href="#">{{ $product['name_product'] }}</a></h6>
                                {{-- <h5>{{ $product['price_product'] }}</h5> --}}
                                {{-- <div class="product__item__price" style="font-weight: 500;font-size: 15px; color: #79a206;">$30.00 <span style="text-decoration: line-through;font-size: 12px;">$88.00</span></div> --}}
                                <span style="" class="price_sale">${{ $product['price_sale'] }} </span>
                                
                                <span style=" " class="price_old">${{ $product['price_product'] }}</span>
                            </div>
                        </form>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        {{ $products->links('pagination::bootstrap-4') }}
                      
                      </div>
                    @endif
                   {{-- @endif --}}

                  
                  
                    
                </div>
            </div>
           
        </div>
    </div>

</section>

@stop

