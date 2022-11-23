<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body style="    margin-top: 10%;">
    <div class="card text-center" style="width: 440px;margin: 0 auto;">
        <div class="card-header h5 text-white bg-primary" style="background: #28a745;">Đổi mật khẩu</div>
        <div class="card-body px-5">
            <p class="card-text py-2">
                Nhập địa chỉ email của bạn và chúng tôi sẽ gửi mã xác nhận đến email của bạn
            </p>
           
            <form action="{{ URL::to('/send_email') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-outline">
                <input type="email" id="typeEmail" class="form-control my-3" name="email" value="{{ old('email') }}" placeholder="Nhập email" required />             
            </div>
            <?php
            $notfound = Session::get('notfound');
            if($notfound){
                echo ' 
            <div class="alert alert-danger"">
            <span class="text-alert" style=" font-family: none; color: red; font-size: 15px;">'.$notfound.'</span>
            </div>
            ';
                Session::put('notfound',null);
            }
            ?>
            <button   type="submit" class="btn btn-primary w-100">Tiếp theo</button>
            </form>
            {{-- <div class="d-flex justify-content-between mt-4">
                <a class="" href="#">Login</a>
                <a class="" href="#">Register</a>
            </div> --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>