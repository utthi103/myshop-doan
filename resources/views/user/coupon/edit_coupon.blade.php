@extends('layouts.admin')
 
@section('title')
    <title>Trang chủ</title>

@stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div>
                <i class="fa-solid fa-paperclip" style="color: cadetblue; font-size: 20px;"></i>
                <a href="{{ URL::to('coupon') }}" style="font-size: 22px;" >Bảng mã giảm giá </a>
            </div>
            
            {{-- <h1 class="m-0">Bảng danh mục</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <a href="{{ URL::to('form_coupon') }}" class="btn btn-success float-right">Thêm mã mới</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-12" style="margin: 0 auto;">
            <form action="{{ URL::to('edit_coupon', ['id'=>$coupon->id]) }}" method="POST" style="border-style: groove; border-color: lime;background: white;">
                @csrf
                <div class="form-group">
                  <label  class="form-label">Tên mã giảm</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên mã giảm" value="{{ $coupon['name'] }}">
                </div>
                {{-- <div class="form-group"> --}}
                    <div class="form-group">
                        <label  class="form-label">Mã</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã giảm giá"  value="{{ $coupon['code'] }}">
                      </div>

                      <div class="form-group">
                        <label  class="form-label">Phần trăm được giảm</label>
                        <input type="number" class="form-control" id="percent" name="percent" placeholder="Nhập số phần trăm được giảm"  value="{{ $coupon['percent'] }}" >
                      </div>

                      <div class="form-group">
                        <label  class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="number" name="number" placeholder="Nhập số lượng"  value="{{ $coupon['number'] }}" >
                      </div>
                {{-- </div> --}}
            
                <button type="submit" onclick="return confirm('Bạn có chắn chắn muốn thêm?');" class="btn btn-primary" style="margin: 10px; left: 30%; margin-left: 33%; width: 150px; background: darkcyan;">Submit</button>
              </form>
         </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@stop