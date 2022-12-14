<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng kí</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('login/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <style>
        #signin {
    margin-top: 16px;
    background: #79a206;
}
.main {
    background: #f8f8f8;
    padding: 20px 0;
}

    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Đăng kí</h2>
                        <form method="POST" class="register-form" action="{{ URL::to('/registeraccount') }}" id="register-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="first_name" id="name" value="{{ old('first_name') }}" placeholder="Họ"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="last_name" id="name" value="{{ old('last_name') }}" placeholder="Tên"/>
                            </div>
                         
                            <div class="form-group">
                                <label for="name"><i class="fa-solid fa-phone"></i></label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Số điện thoại"/>
                            </div>
                            {{-- <label for="">Giới tính</label> <br> --}}
                            <div class="form-group">
                                <select class="form-select" name="gender" value="{{ old('gender') }}" aria-label="Default select example" style="    border-style: groove;
                                border-color: white;">
                                    <option value="Nam" selected>Nam</option>
                                    <option value="Nữ">Nữ</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fa-solid fa-location-dot"></i></label>
                                <input type="text" name="address_user" id="address_user" value="{{ old('address_user') }}" placeholder="Địa chỉ"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="account_user" id="name" value="{{ old('account_user') }}" placeholder="Tên đăng nhập"/>
                            </div>
                            
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" value="{{ old('pass') }}" placeholder="Mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" value="{{ old('re_pass') }}" placeholder="Xác nhận mật khẩu"/>
                            </div>

                            <?php
                            $message = Session::get('msg');
                            if($message){
                                echo ' 
                            <div class="alert alert-success">
                            <span class="text-alert" style=" font-family: none; color: red; font-size: 15px;">'.$message.'</span>
                            </div>
                            ';
                                Session::put('msg',null);
                            }
                            ?>
                            <div class="" style="display: flex;">
                                {{-- <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" /> --}}
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" style="display: block;" required>
  <label for="vehicle1" style="    display: contents;"> Tôi đồng ý với các điều khoản</label>
                                {{-- <label for="agree-term" class="label-agree-term">Tôi đồng ý với tất cả điều khoản</label> --}}
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng kí"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('login/images/signup-image.jpg') }}" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Tôi đã có tài khoản</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('login/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>