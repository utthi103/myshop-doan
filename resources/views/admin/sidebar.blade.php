<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0b092e; ">
    <!-- Brand Logo -->
            <a href="index3.html" class="brand-link" style="text-align: center">
                <span class="brand-text font-weight-light" style="color: chartreuse;">PLANT TREE</span>
              </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                    <?php
                      $message = Session::get('admin_username');
                    ?>
                    <a href="#" class="d-block"><?php 
                    if($message){echo $message;
                      // Session::put('account_user',null);
                    }else{
                      echo"xin chao";
                    } ?></a>
                  </div>
                </div>

      <!-- SidebarSearch Form -->
                {{-- <div class="form-inline">
                  <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                      </button>
                    </div>
                  </div>
                </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('category.tabletype') }}" class="nav-link">
              <i class="fa-brands fa-slack"></i>
              <p>
              Quản lý Danh mục
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('product.tableproduct') }}" class="nav-link">
              <i class="fa-brands fa-slack"></i>
              <p>
               Quản lý Sản phẩm
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('product.order') }}" class="nav-link">
              <i class="fa-brands fa-slack"></i>
              <p>
                Xét duyệt Hóa đơn
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('account.user') }}" class="nav-link">
              <i class="fa-brands fa-slack"></i>
              <p>
               Quản lý Tài khoản
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('blog') }}" class="nav-link">
              <i class="fa-brands fa-slack"></i>
              <p>
               Quản lý bài viết
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ URL::to('coupon') }}" class="nav-link">
              <i class="fa-brands fa-slack"></i>
              <p>
               Quản lý mã giảm giá
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <div class="nav-item-divider" style="height: 1px;
          margin: 1rem 0;
          overflow: hidden;
          background-color: rgba(236, 238, 239, 0.3);"></div>
          {{-- <li class="nav-item">
            <a href="{{ route('account.detail') }}" class="nav-link">
              <i class="fa-solid fa-user"></i>
              <p>
              Cá nhân
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{URL::to('/admin-logout')}}" class="nav-link">
                <i class="fa-solid fa-right-from-bracket"></i>
              <p>
                Đăng xuất
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
    
        </ul>
      {{-- </div> --}}
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>