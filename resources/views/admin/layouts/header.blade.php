<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
 {{-- <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ url('public/assets/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ url('public/assets/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ url('public/assets/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
  </ul> --}}
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="brand-link" style="text-align: center;">
    <img src="{{ $getSystemSettingApp->getFooterLogo() }}" alt="" style="height: 45px;margin-right: 10px;">
  </div>

  <!-- Sidebar -->
  <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('admin.png') }}" style="border-radius: 10%;">
      </div>
      <div class="info">
        <a class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
            <i class="nav-icon fas fa-regular fa-user"></i>
            <p>
              Admin
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/customer/list') }}" class="nav-link @if(Request::segment(2) == 'customer') active @endif">
            <i class="nav-icon fas fa-regular fa-users"></i>
            <p>
              Customers
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/orders/list') }}" class="nav-link @if(Request::segment(2) == 'orders') active @endif">
            <i class="nav-icon fas fa-truck-fast"></i>
            <p>
              Orders
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/category/list') }}" class="nav-link @if(Request::segment(2) == 'category') active @endif">
            <i class="nav-icon fas fa-folder"></i>
            <p>
              Categories
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/sub_category/list') }}" class="nav-link @if(Request::segment(2) == 'sub_category') active @endif">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Sub Categories
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/brand/list') }}" class="nav-link @if(Request::segment(2) == 'brand') active @endif">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Brands
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/color/list') }}" class="nav-link @if(Request::segment(2) == 'color') active @endif">
            <i class="nav-icon fas fa-solid fa-palette"></i>
            <p>
              Colors
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/product/list') }}" class="nav-link @if(Request::segment(2) == 'product') active @endif">
            <i class="nav-icon fas fa-box"></i>
            <p>
              Products
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/discount_code/list') }}" class="nav-link @if(Request::segment(2) == 'discount_code') active @endif">
            <i class="nav-icon fas fa-percent"></i>
            <p>
              Discount Codes
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/shipping_charge/list') }}" class="nav-link @if(Request::segment(2) == 'shipping_charge') active @endif">
            <i class="nav-icon fas fa-solid fa-ship"></i>
            <p>
              Shipping Charges
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/page/list') }}" class="nav-link @if(Request::segment(2) == 'page') active @endif">
          <i class="nav-icon fas fa-solid fa-file"></i>
            <p>
              Pages
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/system-setting') }}" class="nav-link @if(Request::segment(2) == 'system-setting') active @endif">
            <i class="nav-icon fas fa-solid fa-gear"></i>
            <p>
              System Settings
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/logout') }}" class="nav-link" onclick="return confirm('Are you want to logout?')">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>