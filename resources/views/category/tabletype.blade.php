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
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th>Ghi chú</th>
                <th>Thao tác</th>
                

              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                   <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{ $category['id_category'] }}</td>
                  <td>{{ $category['name_category'] }}</td>
                  <td>{{ $category['note'] }}</td>
                  <td >
                    <a href="{{ route('category.showdata', ['id'=> $category->id_category]) }}" type="button" style="background-color:#f6c23e; " class="btn btn-success">Sửa </a>
                    <a href="{{ route('category.delete', ['id'=> $category->id_category]) }}" onclick="return confirm('Bạn có chắn chắn muốn xóa?');" type="button" style="background-color:red; "  class="btn btn-success">Xóa</a>
                    </td>
              @endforeach
             
              </tr>
             
            </tbody>
          </table>
          <div class="col-md-12">
            {{ $categories->links('pagination::bootstrap-4') }}
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@stop