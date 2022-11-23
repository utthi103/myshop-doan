<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body style=" margin-top: 10%;">
    <div class="card text-center" style="width: 300px;margin: 0 auto;">
        <div class="card-header h5 text-white bg-primary">Password Reset</div>
        <div class="card-body px-5">
            <p class="card-text py-2">
                Vui lòng nhập mã xác nhận của  bạn
            </p>
            <form action="{{ URL::to('/show_code') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-outline">
                <input type="text" id="code" class="form-control my-3" name="code" value="{{ old('code') }}" placeholder="Nhập mã xác nhận" required />             
            </div>
            <?php
            $code_wrong = Session::get('code_wrong');
            if($code_wrong){
                echo ' 
            <div class="alert alert-danger"">
            <span class="text-alert" style=" font-family: none; color: red; font-size: 15px;">'.$code_wrong.'</span>
            </div>
            ';
             
            }
               Session::put('code_wrong',null);
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