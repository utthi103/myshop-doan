@extends('layouts.user')
 
@section('title')
    <title>Trang chủ</title>

@stop
{{-- @section('logo')
    <img src="{{ asset('img/cayphattai.jpg') }}" alt="">
@stop --}}

@section('content')
<div class="container light-style flex-grow-1 container-p-y" style="    margin-bottom: 5%;">

    {{-- <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4> --}}
<form action="{{ URL::to('/save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" style="margin-top: 7%;" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            {{-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a> --}}
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

              <div class="card-body media align-items-center">
                <img src="{{ asset('img/'.$user['avt'].'') }}" alt="" class="d-block ui-w-80" style="    width: 200px !important;
                ">
                <input type="hidden" name="path_avt" value="{{ $user['avt'] }}">
                <div class="media-body ml-4">
                  <label class="btn btn-outline-primary">
                    {{-- Upload new photo --}}
                    <input type="file" class="account-settings-fileinput" name="avt">
                  </label> &nbsp;
                  {{-- <button type="button" class="btn btn-default md-btn-flat" style="border-color: rgba(24,28,33,0.1);">Reset</button> --}}

                  <div class="text-light small mt-1" style="    color: black!important;">Allowed JPG, GIF or PNG. Max size of 800K</div>
                </div>
              </div>
              <hr class="border-light m-0">

           
              <div class="card-body">
                <?php
                $info = Session::get('info');
                if($info){
                    echo ' 
                <div class="alert alert-success">
                <span class="text-alert" style=" font-family: none; color: red; font-size: 15px;">'.$info.'</span>
                </div>
                ';
                    Session::put('info',null);
                }
                ?>
                <div class="form-group">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control mb-1" value="{{ $user['account_user'] }}" disabled name="account_user">
                  </div>
                <div class="form-group">
                  <label class="form-label">Họ</label>
                  <input type="text" class="form-control mb-1" value="{{ $user['first_name'] }}" name="first_name">
                </div>
                <div class="form-group">
                  <label class="form-label">Tên</label>
                  <input type="text" class="form-control" value="{{ $user['last_name'] }}" name="last_name">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" value="{{ $user['email_user'] }}" disabled name="email_user">
                  </div>
                <div class="form-group">
                  <label class="form-label">Giới tính</label>
                  <input type="text" class="form-control mb-1" value="{{ $user['gender_user'] }}" name="gender_user">
                
                </div>
                <div class="form-group">
                  <label class="form-label">Số điện thoại</label>
                  <input type="text" class="form-control" value="{{ $user['phone'] }}" name="phone">
                </div>

                <div class="form-group">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" value="{{ $user['address_user'] }}" name="address_user">
                  </div>
              </div>
            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Mật khẩu cũ</label>
                  <input type="password" class="form-control" name="pass_old" value="{{ old('pass_old') }}">
                </div>

                <div class="form-group">
                  <label class="form-label">Mật khẩu mới</label>
                  <input type="password" class="form-control" name="pass_new"  value="{{ old('pass_new') }}">
                </div>

                <div class="form-group">
                  <label class="form-label">Xác nhận lại mật khẩu</label>
                  <input type="password" class="form-control" name="password"  value="{{ old('password') }}">
                </div>
                <?php
                $pass_mess = Session::get('pass_mess');
                if($pass_mess){
                    echo ' 
                <div class="alert alert-success">
                <span class="text-alert" style=" font-family: none; color: red; font-size: 15px;">'.$pass_mess.'</span>
                </div>
                ';
                    Session::put('pass_mess',null);
                }
                ?>
              </div>
      
            </div>
    
          </div>
        </div>
      </div>
      <div class="text-right mt-3" style="    margin-bottom: 2%;">
        <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
        <button type="reset" class="btn btn-default" style="  border-color: rgba(24,28,33,0.1); margin-right: 20px;">Cancel</button>
      </div>
    </div>
</form>
  

  </div>

@stop



