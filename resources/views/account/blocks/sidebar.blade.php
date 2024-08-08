<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{asset('assets/admin/images/logo-sm.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/admin/images/logo-light.png')}}" alt="" height="24">
                    </span>
                </a>
                <a class='logo logo-dark' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{asset('assets/admin/images/logo-sm.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/admin/images/logo-dark.png')}}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Quản Trị </li>
                <li>
                    <a class='tp-link' href='{{ route('account.quanlytaikhoan.home') }}'>
                        <i data-feather="home"></i>
                        <span> Quản lý tài khoản  </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href='{{ route('clients.pages.home') }}'>
                        <i data-feather="home"></i>
                        <span> Quay lại trang chủ   </span>
                    </a>
                </li>

               

                <li class="menu-title"> Kinh Doanh </li>
                <li>
                    <a class='tp-link' href="{{ route('account.quanlytaikhoan.product-create') }}">
                        <i data-feather="align-center"></i>
                        <span>Đăng tin bất động sản  </span>
                    </a>
                </li>

                <li>
                    <a class='tp-link' href="{{route('clients.pages.product')}}">   
                      
                        <i data-feather="archive"></i>
                        <span> Xem bất động sản  </span>
                    </a>
                </li>

                <li>
                    <a class='tp-link' href="{{route('account.quanlytaikhoan.blog-create')}}">   
                      
                        <i data-feather="package"></i>
                        <span>Đăng tin tức </span>
                    </a>
                </li>


                <li>
                    <a class='tp-link' href="{{route('clients.pages.blog')}}">   
                      
                        <i data-feather="archive"></i>
                        <span>Xem tin tức</span>
                    </a>
                </li>




            </ul>
        </div>
      

        <li>
            <a href="#sidebarMaps" data-bs-toggle="collapse">
                <i data-feather="map"></i>
                <span> Maps </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarMaps">
                <ul class="nav-second-level">
                    <li>
                        <a class='tp-link' href='maps-google.html'>Google Maps</a>
                    </li>
                    <li>
                        <a class='tp-link' href='maps-vector.html'>Vector Maps</a>
                    </li>
                </ul>
            </div>
        </li>

        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
</div>
<!-- Left Sidebar End -->