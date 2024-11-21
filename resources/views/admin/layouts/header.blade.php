  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

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
            <img src="{{ url('public/assets/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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

    {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
        </a>
    </li> --}}
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
    <span class="brand-text">E-commerce</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('public/assets/dist/img/user2-160x160.jpg') }}" class="img img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
                Admin
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/customer/list')}}" class="nav-link @if(Request::segment(2) == 'customer') active @endif">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
                Customer
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('orders_list')}}" class="nav-link @if(Request::segment(2) == 'orders') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Orders
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('category_list')}}" class="nav-link @if(Request::segment(2) == 'category') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Categories
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('subCategory_list')}}" class="nav-link @if(Request::segment(2) == 'subCategory') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Sub Categories
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('brand_list')}}" class="nav-link @if(Request::segment(2) == 'brand') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Brands
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('color_list')}}" class="nav-link @if(Request::segment(2) == 'color') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Colors
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('product_list')}}" class="nav-link @if(Request::segment(2) == 'product') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Products
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('discount_code_list')}}" class="nav-link @if(Request::segment(2) == 'DiscountCode') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Dicount Code
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('shipping_charge_list')}}" class="nav-link @if(Request::segment(2) == 'ShippingCharge') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Shipping Charge
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/slider/list')}}" class="nav-link @if(Request::segment(2) == 'slider') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Slider
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/contact')}}" class="nav-link @if(Request::segment(2) == 'contact') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Contact Us
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/page/list')}}" class="nav-link @if(Request::segment(2) == 'page') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Page
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/blog-category/list')}}" class="nav-link @if(Request::segment(2) == 'blog-category') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Blog Category
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/blog/list')}}" class="nav-link @if(Request::segment(2) == 'blog') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                Blog
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/system-settings')}}" class="nav-link @if(Request::segment(2) == 'system-settings') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
                System Settings
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/logout')}}" class="nav-link ">
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
