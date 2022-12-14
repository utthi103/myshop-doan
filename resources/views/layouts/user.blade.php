<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Ogani | Template</title> --}}
    @yield('title')

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
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" type="text/css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<body>

 @include('user.header')

    @include('user.header3')


        @yield('logo')
    
  
    @yield('content')
    @yield('product_similar')

     {{-- @include('user.shop.categoryshop_left') --}}



    @include('user.footer')
    {{-- ajax --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.add_to_cart').click(function(){
                var id_product = $(this).data('id_product');
                var name_product = $('.cart_product_name_' + id_product).val();
                var img_product = $('.cart_product_img_' + id_product).val();
                var price_product = $('.cart_product_price_sale_' + id_product).val();
                var count = $('.cart_product_count_' + id_product).val();
                var _token = $('input[name="_token"]').val();
                var qty = $('.cart_product_qty_' + id_product).val();
                var kt = "true";
 
            $.ajax({
                url:'{{url('/add_to_card')}}',
                method: 'POST',
                data:{id_product:id_product, name_product:name_product,
                    img_product:img_product, price_product:price_product,
                    count:count,_token:_token,qty:qty},
                    success:function(data){
                        
                            swal({
                        title: "Đã thêm sản phẩm vào giỏ hàng",
                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                        },
                        function() {
                        window.location.href = "{{url('/show_card')}}";
                        });
                    
                       
                        }
                           
               
            });
                
            });
        });




        $(document).ready(function(){
            $('.add_to_wishlist').click(function(){
                var id_product = $(this).data('id_product');
                var name_product = $('.cart_product_name_' + id_product).val();
                var img_product = $('.cart_product_img_' + id_product).val();
                var price_product = $('.cart_product_price_sale_' + id_product).val();
                var count = $('.cart_product_count_' + id_product).val();
                var _token = $('input[name="_token"]').val();
                var qty = $('.cart_product_qty_' + id_product).val();
                var kt = "true";
                // alert('sds');
 
            $.ajax({
                url:'{{url('/add_to_wishlist')}}',
                method: 'POST',
                data:{id_product:id_product, name_product:name_product,
                    img_product:img_product, price_product:price_product,
                    count:count,_token:_token,qty:qty},
                    success:function(data){
                        // alert(data);
                            swal({
                        title: "Đã thêm sản phẩm vào mục yêu thích",
                        text: "Bạn có thể tiếp tục xem sản phẩm hoặc tới xem danh sách mong muốn",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến danh sách mong muốn",
                        closeOnConfirm: false
                        },
                        function() {
                        window.location.href = "{{url('/show_wishlist')}}";
                        });
                    
                       
                        }
                           
               
            });
                
            });
        });
    </script>

</body>

</html>