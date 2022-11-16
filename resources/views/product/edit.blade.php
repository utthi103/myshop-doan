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
                <a href="{{ route('product.tableproduct') }}" style="font-size: 22px;" >Bảng sản phẩm</a>
            </div>
            
            {{-- <h1 class="m-0">Bảng danh mục</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <a href="{{ route('product.create') }}" class="btn btn-success float-right">Thêm sản phẩm mới</a>
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
            <form action="{{ route('product.edit', ['id'=>$data->id_product]) }}" method="POST"  enctype="multipart/form-data" style="border-style: groove; border-color: lime;background: white;">
                @csrf
                <div class="form-group">
                    <label for="cars">Loại sản phẩm: </label>
                    <select id="" name="name_category" class="form-control">
                        @foreach ($categories as $category)
                        <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
                        @endforeach
                      
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" value="{{ $data['name_product'] }}" class="form-control" id="name_product" placeholder="" name="name_product">
                  </div>
                  <div class="form-group">
                    <label for="">Giá</label>
                    <input type="text" value="{{ $data['price_product'] }}" class="form-control" id="price_product" placeholder="" name="price_product">
                  </div>
                  <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" value="{{ $data['count_product'] }}" class="form-control" id="count_product" placeholder="" name="count_product">
                  </div>
                  <div class="form-group">
                    <label for="">Hình ảnh 1 </label>
                    <div style="display: -webkit-box;" >
                        <input type="file" value="{{ $data['image1'] }}" class="form-control" id="image1" placeholder="" name="image1" style=" margin-right: 5px;" ssf> 
                   
                    </div>
                    <div style="margin: 5px;">
                      <img src="{{ asset('img/'.$data['image1'].'') }}" alt="" width="100px">                    </div>
                    <input type="hidden" value="{{ $data['image1'] }}" name="image_old1"> 
                  </div>
                  <div class="form-group">
                    <label for="">Hình ảnh 2</label>
                    <div style="display: -webkit-box;" >
                        <input type="file" value="{{ $data['image2'] }}" class="form-control" id="image2" placeholder="" name="image2" style=" margin-right: 5px;"> 
                   
                    </div>
                        <div class= "" style="margin: 5px;">
                          <img src="{{ asset('img/'.$data['image2'].'') }}" alt="" width="100px"> 
                          <input type="hidden" value="{{ $data['image2'] }}" name="image_old2"> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Hình ảnh 3</label>
                    <div style="display: -webkit-box;" >
                        <input type="file" value="{{ $data['image3'] }}" class="form-control" id="image3" placeholder="" name="image3" style=" margin-right: 5px;"> 
                   
                    </div>
                    <div class= "" style="margin: 5px;" >
                      <img src="{{ asset('img/'.$data['image3'].'') }}" alt="" width="100px"> 
                      <input type="hidden" value="{{ $data['image3'] }}" name="image_old3"> 
                    </div>
                  </div>
                  <label for="">Mô tả</label>
                  <div class="form-group">
                    <textarea class="form-control" id="decription_product" placeholder="" name="decription_product"><?= $data['decription_product'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Sale</label>
                    <input type="text" value="{{ $data['sale_product'] }}"  class="form-control" id="sale_product" placeholder="" name="sale_product">
                  </div> 
                <div class="form-group">
                    <label for="cars">Sản phẩm nổi bật</label>
                    <select id="" name="outstand_product" class="form-control">
                      <option value="<?= $data['outstand_product'] ?>" selected="selected"><?= $data['outstand_product'] ?></option>
                     
              
                    </select>
                  </div>

            
                <button type="submit"  onclick="return confirm('Bạn có chắn chắn muốn sửa?');" class="btn btn-primary" style="margin: 10px; left: 30%; margin-left: 33%; width: 150px; background: darkcyan;">Edit</button>
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