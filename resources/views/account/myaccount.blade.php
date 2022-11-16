@extends('layouts.admin')
 
@section('title')
    <title>Trang chủ</title>

@stop

@section('content') 
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="padding60">
                <div class="log-title">
                    <h3><strong>Tài khoản của tôi</strong></h3>
                </div>
                <div class="prament-area main-input" id="doitk">
                    <ul class="panel-group" id="accordion">
                        <li class="panel">
                            <div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
                                <label>
                                    <input type="radio" checked value="forever" name="rememberme" />
                                    Thông tin cá nhân
                                </label>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="single-log-info">
                                    <div class="bulling-title">
                                        <b>
                                            <?php if (isset($_COOKIE['doimk'])) {
                                                echo $_COOKIE['doimk'];
                                            } ?>
                                        </b>
                                        <div class="custom-input">
                                            <form action="?act=taikhoan&xuli=update" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" name="Ho" placeholder="Họ.." />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="Ten" placeholder="Tên.." />
                                                    </div>
                                                </div>
                                                <div class="custom-select">
                                                    <select class="form-control" name="GioiTinh" title="Giới tính">
                                                        <option  value="Nam"> Nam</option>
                                                        <option  value="Nữ"> Nữ</option>
                                                        <option  value="Khác"> Khác</option>
                                                    </select>
                                                </div>
                                                <input type="email" name="Email" placeholder="Địa chỉ Email.."" />
                                                <input type="text" name="SĐT" placeholder="Số điện thoại.." required pattern="[0-9]+" minlength="10"  />
                                                <input type="text" name="DiaChi" placeholder="Địa chỉ.."   />
                                                <div class="submit-text">
                                                    <button type="submit_tt">Lưu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </li>
                        <li class="panel">
                            <div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse4">
                                <label>
                                    <input type="radio" value="forever" name="rememberme" />
                                    Đổi mật khẩu
                                </label>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="single-log-info">
                                    <div class="custom-input">
                                        <form action="?act=taikhoan&xuli=update" method="post">
                                            <input type="password" placeholder="Mật khẩu hiện tại .. " name="MatKhau" minlength="6" required />
                                            <input type="password" placeholder="Mật khẩu mới .. " name="MatKhauMoi" />
                                            <input type="password" placeholder="Xác nhận lại mật khẩu .." name="MatKhauXN" />
                                            <div class="submit-text text-left">
                                                <button type="submit_pw" value="submit form">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop