<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{ Request::is('admin/dashboard')? 'active' : '' }}">
            <a class="nav-link" href="{{url('/admin/dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item {{ Request::is('admin/brand')? 'active' : '' }}">
            <a class="nav-link" href="{{url('/admin/brand')}}">
              <i class="mdi mdi-watermark menu-icon"></i>
              <span class="menu-title">Brands</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/product')? 'active' : '' }}">
            <a class="nav-link" href="{{url('/admin/product')}}">
              <i class="mdi mdi-package menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/category')? 'active' : '' }}">
            <a class="nav-link" href="{{url('/admin/category')}}">
              <i class="mdi mdi-shape menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/slider')? 'active' : '' }}">
            <a class="nav-link" href="{{url('/admin/slider')}}">
              <i class="mdi mdi-image-area menu-icon"></i>
              <span class="menu-title">Sliders</span>
            </a>
          </li>
           <li class="nav-item {{ Request::is('admin/order')? 'active' : '' }}">
            <a class="nav-link" href="{{url('/admin/orders')}}">
              <i class="mdi mdi-cash-multiple menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          
    <!--       <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li> -->
        </ul>
      </nav>