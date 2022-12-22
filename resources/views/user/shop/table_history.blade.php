@extends('layouts.user')
 
@section('title')
    <title>Trang chủ</title>

@stop
{{-- @section('logo')
    <img src="{{ asset('img/cayphattai.jpg') }}" alt="">
@stop --}}

@section('content')
<div class="container light-style flex-grow-1 container-p-y" style="    margin-bottom: 5%;">

    {{-- <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4> --}}
<form action="{{ URL::to('/save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-2 pt-0">
          {{-- <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" style="margin-top: 7%;" data-toggle="list" href="#account-general">Lịch sử mua hàng</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Đang chờ xét duyệt</a>
          </div> --}}
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
 <h2 class="col-12 " style="text-align: center;">Lịch sử mua hàng</h2>
              <div class="card-body media align-items-center">
               
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Ngày đặt hàng</th>
                          <th>Tổng tiền</th>
                          <th>Thao tác</th>
                          
          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($order as $item)
                        <tr>
                            <td>{{ $item['id_order'] }}</td>
                        <td>{{ $item['date'] }}</td>
                        <td>{{ $item['total'] }}</td>
                        <td>
                            <a href="{{ route('history_detail',['id'=>$item['id_order']]) }}">Xem chi tiết</a>
                        </td>  
                        </tr>
                        
                        @endforeach
                    
                       
                        </tr>
                       
                      </tbody>
                </table>
              </div>
              <h2 class="col-12 " style="text-align: center;">Chờ xét duyệt</h2>
              <div class="card-body media align-items-center">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Ngày đặt hàng</th>
                          <th>Tổng tiền</th>
                          <th>Thao tác</th>
                          
          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($not_order as $val)
                        <tr>
                            <td>{{ $val['id_order'] }}</td>
                        <td>{{ $val['date'] }}</td>
                        <td>{{ $val['total'] }}</td>
                        <td>
                            <a href="{{ route('history_detail',['id'=>$val['id_order']]) }}">Xem chi tiết</a>
                        </td>  
                        </tr>
                        
                        @endforeach
                    
                       
                        </tr>
                       
                      </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Mật khẩu cũ</label>
                  <input type="password" class="form-control" name="pass_old" value="{{ old('pass_old') }}">
                </div>

                <div class="form-group">
                  <label class="form-label">Mật khẩu mới</label>
                  <input type="password" class="form-control" name="pass_new"  value="{{ old('pass_new') }}">
                </div>

                <div class="form-group">
                  <label class="form-label">Xác nhận lại mật khẩu</label>
                  <input type="password" class="form-control" name="password"  value="{{ old('password') }}">
                </div>
                <?php
                $pass_mess = Session::get('pass_mess');
                if($pass_mess){
                    echo ' 
                <div class="alert alert-success">
                <span class="text-alert" style=" font-family: none; color: red; font-size: 15px;">'.$pass_mess.'</span>
                </div>
                ';
                    Session::put('pass_mess',null);
                }
                ?>
              </div>
      
            </div>
    
          </div>
        </div>
      </div>
      {{-- <div class="text-right mt-3" style="    margin-bottom: 2%;">
        <button type="submit" class="btn btn-primary">Lưu</button>&nbsp;
        <button type="reset" class="btn btn-default" style="  border-color: rgba(24,28,33,0.1); margin-right: 20px;">Hủy bỏ</button>
      </div> --}}
    </div>
</form>
  

  </div>

@stop



