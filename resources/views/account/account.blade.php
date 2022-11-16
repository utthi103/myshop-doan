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
          {{-- <div class="col-sm-4">
            <h1 class="m-0">Bảng danh mục</h1>
          </div> --}}
          <div class="col-sm-4">
            {{-- <p></p> --}}
            <input type="search" style="border-radius: 10px; border-color: floralwhite; width: 100%; height: 93%;" placeholder="Tìm kiếm tại đây">
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
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">SĐT</th>
                <th scope="col">Email</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Quyền hạn</th>
                <th scope="col">Thao tác</th>


              </tr>
            </thead>
            <tbody>
              @foreach ($user as $users)
                   <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{ $users['id_user'] }}</td>
                  <td><?php
                  $name = $users['first_name'].' '.$users['last_name'];
                  echo $name;
                  ?></td>
                  <td>{{ $users['phone'] }}</td>
                  <td>{{ $users['email_user'] }}</td>
                  <td>{{ $users['gender_user'] }}</td>
                  <td>
                    <?php
                        if($users['id_auth']=='1'){
                            echo "Admin";
                        }else{
                            echo "User";
                        }
                    ?>

                </td>
                  <td >
                    <a href="{{ route('account.role',['id'=>$users->id_user]) }}" type="button" style="background-color:#f6c23e; " class="btn btn-success">    <?php
                      if($users['id_auth']=='1'){
                        echo "Bỏ quyền";
                      }else{
                        echo "Trao quyền";
                      }
                    ?></a>
                    <a href="{{ route('account.delete',['id'=>$users->id_user]) }}" onclick="return confirm('Bạn có chắn chắn muốn xóa?');" type="button" style="background-color:red; "  class="btn btn-success">
                        Xóa
                      </a>
                    </td>
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