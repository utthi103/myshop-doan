<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body style=" margin-top: 6%;">
    <div class="card text-center" style="width: 500px;margin: 0 auto;">
        <div class="card-header h5 text-white bg-primary">Password Reset</div>
        <div class="card-body px-5">
            {{-- <h4 class="card-text py-2">
                Vui lòng nhập mã xác nhận của  bạn
            </h4> --}}
            <form action="{{ URL::to('/reset_pass') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-outline">
                    <label for="" style=" margin-left: -74%;">Mật khẩu mới</label>
                <input type="password"  id="pass" class="form-control my-3" name="pass" value="{{ old('pass') }}" required />     
                <label for="" style=" margin-left: -58%;">Xác nhận lại mật khẩu</label>
                <input type="password" id="confirm_pass" class="form-control my-3" name="confirm_pass" value="{{ old('confirm_pass') }}" required />          
            </div>
            <?php
            $pass_wrong = Session::get('pass_wrong');
            $pass_sucss = Session::get('pass_sucss');
            if($pass_wrong){
                echo ' 
            <div class="alert alert-danger"">
            <span class="text-alert" style=" font-family: none; color: red; font-size: 15px;">'.$pass_wrong.'</span>
            </div>
            ';
                Session::put('pass_wrong',null);
            }else if(isset($pass_sucss)){
                echo ' 
            <div class="alert alert-success"">
            <span class="text-alert" style=" font-family: none; color: red; font-size: 15px;">'.$pass_wrong.'</span>
            </div>
            ';
                Session::put('pass_wrong',null);
            }
            ?>
            <button  type="submit" class="btn btn-primary w-100">Đổi mật khẩu</button>
           
            </form>
            <div class="d-flex justify-content-between mt-4">
                <a class="{{ URL::to('/form_signin') }}" href="#">Đăng nhập</a>
                {{-- <a class="" href="#">Register</a> --}}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>