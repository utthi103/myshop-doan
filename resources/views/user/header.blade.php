<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <?php
             $account_user = Session::get('account_user');
             $id_user = Session::get('id_user');
             ?>
                        <div class="header__top__right__auth">
                            <div class="dropdown" style=""> 
                                <a href="#"><i class="fa fa-user"></i> <?php 
                                    if(isset($account_user)){echo $account_user;
                                    }else{
                                        
                                    echo"xin chao";
                                    } ?></a>
                                  <?php  if(isset( $id_user)){ ?>
                                    <div class="dropdown-content" style=""> 
                                        <a href="{{URL::to('/myaccount')}}"> Accout</a>
                                        <a href="{{URL::to('/user-logout')}}">Logout</a> 
                                 </div>
                                 <?php }else{ ?>
                                    <div class="dropdown-content" style=""> 
                                        <a href="{{URL::to('/form_signin')}}"> Login</a>
                                 </div>
                                    <?php } ?>             
                           
                            </div>

                        </div>




                        
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ route('product.home') }}">Home</a></li>
                            <li class="active"><a href="{{ route('product.listproduct') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('product.blog') }}">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <?php
                        $id_user = Session::get('id_user');
                        if (isset($id_user)) {
                              $total_cart = 0;
                        $wishlist_total = 0;
                        $price= 0;
                        if((Session::get('wishlist'))!=null ){
                             $wishlists  = Session::get('wishlist');
                             foreach ( $wishlists as $key => $wishlist) {
                            $wishlist_total+=1;
                        }
                    }
                        if((Session::get('cart'))!=null ){
                            $carts  = Session::get('cart');
                            foreach ($carts as $key => $cart) {
                            $total_cart+=1;
                            $price +=  ($cart['qty']*$cart['price_product']);
                        }

                        }
                        }
                                               
                  
                            ?>
                        <ul>
                            <li><a href=" {{URL::to('/show_wishlist')}} "><i class="fa fa-heart"></i> <span><?php
                            if (isset($id_user)){
                                echo $wishlist_total;
                            }else{
                                echo "0";
                            }
                                 
                                  ?></span></a></li>
                            <li><a href="{{ route('product.cart') }}"><i class="fa fa-shopping-bag"></i> <span><?php 
                            if (isset($id_user)){
                                echo  $total_cart; 
                            }else{
                                echo "0";
                            }
                           
                            ?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span><?php
                         if (isset($id_user)){
                            echo $price;
                            }else{
                                echo "0";
                            }
                        
                         ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>