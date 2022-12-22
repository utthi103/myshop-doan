<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('login/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}">
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

        <!-- Sign up form -->
   
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('login/images/signin-image.jpg') }}" alt="sing up image"></figure>
                       
                        <a href="{{URL::to('/register')}}" class="signup-image-link">Tạo tài khoản</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                       
                        <form method="POST" class="register-form" action="{{URL::to('/user-login')}}" enctype="multipart/form-data" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="account_user" id="account_user" placeholder="Tên đăng nhập"
                                @if(Cookie::has('account')) value="{{ Cookie::get('account') }}" @else value="{{ old('account_user') }}" @endif
                               required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass_user" id="pass_user" placeholder="Mật khẩu"
                                @if(Cookie::has('pass')) value="{{ Cookie::get('pass') }}" @else value="{{ old('pass_user') }}" @endif
                                 required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" class="agree-term" />
                                <label for="remember" class="label-agree-term"><span><span></span></span>Nhớ mật khẩu </label>
                                <a href=" {{URL::to('/show_email')}} " style="color: red;">Quên mật khẩu</a>
                            </div>
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo ' 
                            <div class="alert alert-success">
                            <span class="text-alert" style=" font-family: none; color: red; font-size: 15px;">'.$message.'</span>
                            </div>
                            ';
                                Session::put('message',null);
                            }
                            ?>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Đăng nhập với</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
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