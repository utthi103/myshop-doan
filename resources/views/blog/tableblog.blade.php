@extends('layouts.admin')
 
@section('title')
    <title>Bài viết</title>

@stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1 class="m-0">Bài viết</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            {{-- <p></p> --}}
            <input type="search" style="border-radius: 10px; border-color: floralwhite; width: 100%; height: 93%;" placeholder="Tìm kiếm tại đây">
          </div>
          <div class="col-sm-4">
            <a href="{{ URL::to('form_add')}}" class="btn btn-success float-right">Thêm bài viết mới</a>
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
                <th scope="col">Tiêu đề</th>
                <th scope="col">Loại bài viết</th>
                <th>Ảnh</th>
                {{-- <th>Nội dung</th> --}}
                <th>Thao tác</th>
                

              </tr>
            </thead>
            <tbody>
              @foreach ($blog as $blogs)
                   <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{ $blogs['title'] }}</td>
                  <td>{{ $blogs['category'] }}</td>
                  <td><img src="{{ asset('img/'.$blogs['image'].'') }}" alt="" width="100px"></td>
                  
                  {{-- <td>{{ $blogs['content'] }}</td> --}}
                  <td >
                    <a href="{{ route('form_edit', ['id'=> $blogs->id]) }}" type="button" style="background-color:#f6c23e; " class="btn btn-success">Sửa </a>
                    <a href="{{ route('blog.delete', ['id'=> $blogs->id]) }}" onclick="return confirm('Bạn có chắn chắn muốn xóa?');" type="button" style="background-color:red; "  class="btn btn-success">Xóa</a>
                    </td>
              @endforeach
             
              </tr>
             
            </tbody>
          </table>
          <div class="col-md-12">
            {{ $blog->links('pagination::bootstrap-4') }}
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@stop