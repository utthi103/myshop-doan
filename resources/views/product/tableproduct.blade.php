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
            <h1 class="m-0">Bảng sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            {{-- <p></p> --}}
            <input type="search" style="border-radius: 10px; border-color: floralwhite; width: 100%; height: 93%;" placeholder="Tìm kiếm tại đây">
          </div>
          <div class="col-sm-4">
            <a href="{{ route('product.create') }}" class="btn btn-success float-right">Thêm sản phẩm mới</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    {{-- <div class="col-sm-12">  --}}
      {{-- <p>sadsa</p>  --}}
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

  
     
    {{-- </div> --}}

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Loại sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Thao tác</th>
                

              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
            <tr>
              <td>{{ $product['id_product'] }}</td>
              <td>{{ $product['name_product'] }}</td>
              <td>{{ $product['name_category'] }}</td>
              <td>{{ $product['count_product'] }}</td>
              <td>{{ $product['price_product'] }} $</td> 
                    <td style="text-align: center;">
                     
                      <img src="{{ asset('img/'.$product['image1'].'') }}" alt="" width="100px">
                    </td>
                
              <td>
                <a href="{{ route('product.showdata',['id'=> $product->id_product]) }}" type="button" style="background-color:#f6c23e; " class="btn btn-success">Sửa </a>
                <a href="{{ route('product.delete',['id'=> $product->id_product]) }}" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" style="background-color:red; "  class="btn btn-success">Xóa</a>
              </td>
               @endforeach
            </tr>
            </tbody>
          </table>
          <div class="col-md-12">
            {{ $products->links('pagination::bootstrap-4') }}
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@stop