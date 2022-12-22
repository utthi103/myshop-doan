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
          <div class="col-sm-4">
            <h1 class="m-0">Bảng mã giảm giá </h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            {{-- <p></p> --}}
            <input type="search" style="border-radius: 10px; border-color: floralwhite; width: 100%; height: 93%;" placeholder="Tìm kiếm tại đây">
          </div>
          <div class="col-sm-4">
            <a href="{{ URL::to('form_coupon') }}" class="btn btn-success float-right">Thêm mã mới</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
    $message = Session::get('msg');
    if($message){
      echo ' 
      <div class="alert alert-success">
      <span class="text-alert">'.$message.'</span>
      </div>
      ';
      Session::put('msg',null);
    }
    ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên</th>
                <th>Mã</th>
                <th>Phần trăm được giảm</th>
                <th>Số lượng</th>
                <th>Thao tác</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($coupon as $coupons)
                   <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{ $coupons['id'] }}</td>
                  <td>{{ $coupons['name'] }}</td>
                  <td>{{ $coupons['code'] }}</td>
                  <td>{{ $coupons['percent'] }} %</td>
                  <td>{{ $coupons['number'] }}</td>
                  <td >
                    <a href="{{ URL::to('form_edit_coupon', ['id'=> $coupons->id]) }}" type="button" style="background-color:#f6c23e; " class="btn btn-success">Sửa </a>
                    <a href="{{ URL::to('delete_coupon', ['id'=> $coupons->id]) }}" onclick="return confirm('Bạn có chắn chắn muốn xóa?');" type="button" style="background-color:red; "  class="btn btn-success">Xóa</a>
                    </td>
              @endforeach
             
              </tr>
             
            </tbody>
          </table>
          <div class="col-md-12">
            {{ $coupon->links('pagination::bootstrap-4') }}
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@stop