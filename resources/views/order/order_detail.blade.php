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
            <i class="fa-solid fa-paperclip" style="color: cadetblue; font-size: 20px;"></i>
                <a href="{{ route('product.order') }}" style="font-size: 22px;" >Bảng hóa đơn</a>
          </div><!-- /.col -->
          <div class="col-sm-4">
            {{-- <p></p> --}}
            {{-- <input type="search" style="border-radius: 10px; border-color: floralwhite; width: 100%; height: 93%;" placeholder="Tìm kiếm tại đây"> --}}
          </div>
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
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá(/1sp)</th>
                <th scope="col">Tổng tiền</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order_details as $order_detail)
                   <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{  $order_detail->name_product }}</td>
                  <td>{{ $order_detail->count }}</td>
                  <td><?php
                  echo $order_detail->price/$order_detail->count;
                  ?></td>
                  <td>{{ $order_detail->price }}</td>

              @endforeach
             
              </tr>
             
            </tbody>
          </table>
          {{-- <div class="col-md-12">
            {{ $categories->links('pagination::bootstrap-4') }}
          </div> --}}
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@stop