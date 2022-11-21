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
            <h1 class="m-0">Bảng danh mục</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            {{-- <p></p> --}}
            <input type="search" style="border-radius: 10px; border-color: floralwhite; width: 100%; height: 93%;" placeholder="Tìm kiếm tại đây">
          </div>
          <div class="col-sm-4">
            <a href="{{ route('category.create') }}" class="btn btn-success float-right">Thêm danh mục mới</a>
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
                <th scope="col">Tên khách hàng</th>
                <th scope="col">SĐT</th>
                <th scope="col">Đại chỉ</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
  

              </tr>
            </thead>
            <tbody>
              @foreach ($order as $orders)
                   <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{  $orders['name_user'] }}</td>
                  <td>{{ $orders['phone'] }}</td>
                  <td>{{ $orders['address'] }}</td>
                  <td>{{ $orders['date'] }}</td>

                  <td>{{ $orders['total'] }}</td>
                  <td>
                    <?php
                        if($orders['status'] ==0){
                            echo"Chưa xét duyệt";
                        }else{
                            echo"Đã xét duyệt";
                        }
                    ?>
                  </td>

                  <td >
                    <a href="{{ route('order.detail',['id_order'=> $orders->id_order]) }}" type="button" style="background-color:#11741e; " class="btn btn-success">Chi tiết</a>
                    <a href="{{ route('order.duyet',['id'=> $orders->id_order]) }}" type="button" style="background-color:#f6c23e; " class="btn btn-success">
                        <?php
                        if($orders['status'] ==0){
                            echo"Duyệt";
                        }else{
                            echo"Bỏ duyệt";
                        }
                    ?>
                
                    </a>
                     <a href="{{ route('order.delete',['id'=> $orders->id_order]) }}" onclick="return confirm('Bạn có chắn chắn muốn xóa?');" type="button" style="background-color:red; "  class="btn btn-success">Xóa</a>
                    </td>
              @endforeach
             
              </tr>
             
            </tbody>
          </table>
          <div class="col-md-12">
            {{ $order->links('pagination::bootstrap-4') }}
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@stop