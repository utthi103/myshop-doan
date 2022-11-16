<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
      .product__item, .product__discount__item{
    /* margin-bottom: 50px; */
    box-shadow: #00000029 0 1px 4px;
}
    .start{
        display: inline-block;
    color: #FEB954;
    }
    .product__item__text h5 {
    /* color: #252525; */
    color: #79a206;
    /* font-weight: 700; */
    font-weight: 600;
    font-size: 15px;
}
.product__discount__percent{
    width: 55px;
    top: 11px;
    left: 11px;
    /* padding: 0 14px; */
    height: 25px;
    color: #ffffff;
    background: #DC0F0F;
    font-size: 14px;
    border-radius: 2px;
    text-align: center;
    position: absolute;
}
.price_old{
    text-decoration: line-through;
        font-weight: 400;
    font-size: 12px;
     margin-left: 5px;
}

.price_sale{
    font-weight:630;
    font-size: 18px;
     color: #79a206;
}

/* shipping */
.shipping_area{
    padding: 99px 0;
}
.single_shipping{
    display: flex;
    align-items: center;
}
.shipping_icone{
    margin-right: 18px;
}
.shipping_content h3 {
    font-size: 20px;
    line-height: 16px;
    text-transform: capitalize;
    font-family: "Lora", serif;
    font-weight: 700;
    margin-bottom: 7px;
}
.shipping_content p {
    font-size: 16px;
    line-height: 18px;
    font-weight: 300;
}
/* banner area */
.banner_area {
    margin-bottom: 88px;
}
.container {
    max-width: 1200px;
}
.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--bs-gutter-y) * -1);
    margin-right: calc(var(--bs-gutter-x) * -.5);
    margin-left: calc(var(--bs-gutter-x) * -.5);
}
.banner_thumb {
    position: relative;
}
.banner_content {
    position: absolute;
    top: 50%;
    transform: translatey(-50%);
    la: 25px;
    left: 31px;
}
.banner_content h3 {
    font-size: 18px;
    line-height: 21px;
    margin-bottom: 17px;
}
.banner_content h2 {
    font-size: 30px;
    line-height: 30px;
    margin-bottom: 0;
}
.banner_content a {
    font-size: 13px;
    line-height: 24px;
    font-weight: 610;
    display: inline-block;
    border-bottom: 2px solid #79a206;
    text-transform: uppercase;
    margin-top: 36px;
    color: black;
}

.carousel-caption{
    right: 66%;
    
    bottom: 28%;
}
.button{
    font-size: 15px;
    font-weight: 500;
    padding: 0 45px;
    display: inline-block;
    text-transform: uppercase;
    border-radius: 30px;
    height: 65px;
    line-height: 65px;
    background: inherit;
    margin-top: 46px;
    color: #fff;
    background: #79a206;
}
.product__discount__title {
    text-align: center;
    margin-bottom: 65px;
}
.name_category{
    font-size: 14px;
                               color: #b2b2b2;
                               display: block;
                               margin-bottom: 4px;"
}

.product__item__text h6 a {
    color: #252525;
    font-weight: 540;
    font-family: sans-serif;
}
    /* dropdown */



/* Dropdown styles */
.dropbtn {  background-color: #58257b;  color: white;  font-size: 16px;  border: none;  cursor: pointer;}
.dropdown {  position: relative;  display: inline-block; text-align: center}
.dropdown-content {  display: none;  position: absolute;  right: 0;  background-color: white;  min-width: 100px;  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);  z-index: 1;}
.dropdown-content a {  color: black;  padding: 12px 16px;  text-decoration: none;  display: block;}
.dropdown-content a:hover {  background-color: #7fad39;  color: white;}
.dropdown:hover .dropdown-content {  display: block;}
.dropdown:hover .dropbtn {  background-color: #984eca;}

.shoping__cart__price, .shoping__cart__total{
    text-align: center;
    margin: 0 auto;
    line-height: 120px;
}
.shoping__cart__quantity{
    vertical-align: middle;
}



    </style>
</head>

<body>

 @include('user.header')

    @include('user.header3')


        @yield('logo')
    
  
    @yield('content')
    @yield('product_similar')

     {{-- @include('user.shop.categoryshop_left') --}}



    @include('user.footer')


    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    


</body>

</html>