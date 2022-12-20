@extends('layouts.admin')
 
@section('title')
    <title>Thêm bài viết</title>

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
                <a href="{{ route('blog') }}" style="font-size: 22px;" >Bảng bài viết</a>
            </div>
            
            {{-- <h1 class="m-0">Bảng danh mục</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <a href="{{ URL::to('add') }}" class="btn btn-success float-right">Thêm bài viết mới</a>
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
            <form action="{{ URL::to('add') }}" method="POST"   enctype="multipart/form-data" style="border-style: groove; border-color: lime;background: white;">
                @csrf
    

                  <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" placeholder="" name="title">
                  </div>
                  <div class="form-group">
                    <label for="">Loại bài viết</label>
                    <input type="text" class="form-control" id="category" placeholder="" name="category">
                  </div>
            
                  <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <div style="display: -webkit-box;" >
                        <input type="file" class="form-control" id="image" placeholder="" name="image" style=" margin-right: 5px;"> 
                    </div>
                  </div>
                 
                  <label for="">Nội dung</label>
                  <div class="form-group" >
                    <textarea class="form-control" id="content" placeholder="" name="content"></textarea>
                  </div>
            
                <button type="submit" onclick="return confirm('Bạn có chắn chắn muốn thêm?');"  class="btn btn-primary" style="margin: 10px; left: 30%; margin-left: 33%; width: 150px; background: darkcyan;">Submit</button>
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