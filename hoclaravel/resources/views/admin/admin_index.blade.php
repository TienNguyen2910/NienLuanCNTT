
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin Tien Bakery</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('../public/admin_frontend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
   <!--  css format for website -->
   <link rel="stylesheet" type="text/css" href="{{asset('../public/admin_frontend/css/style.css')}}">
    <!-- Custom styles for this template-->
    <link href="{{asset('../public/admin_frontend/css/sb-admin-2.min.css')}}" rel="stylesheet">
     <!-- Custom styles for this page -->
    <link href="{{asset('../public/admin_frontend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
	<!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Tien Bakery</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang chủ</span></a>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#quanly"
                    aria-expanded="true" aria-controls="quanly">
                    <i class="fas fa-edit"></i>
                    <span>Quản lý</span>
                </a>
                <div id="quanly" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{asset('brand-product')}}">Quản lý Thương Hiệu</a>
                        <a class="collapse-item" href="{{asset('product')}}">Quản lý Sản Phẩm</a>
                        <!-- <a class="collapse-item" href="khachhang.php">Quản lý Khách Hàng</a>
                        <a class="collapse-item" href="donhang.php">Quản lý Đơn Hàng</a>
                        <a class="collapse-item" href="thuonghieu.php">Quản lý Nhân Viên</a> -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="doanhthu.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Báo cáo bán hàng</span></a>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Tài khoản</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="{{asset('admin_login')}}">Login</a>
                        <a class="collapse-item" href="{{asset('admin_register')}}">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <a class="collapse-item" href="{{asset('logout')}}">Logout</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{asset('../public/admin_frontend/img/undraw_rocket.svg')}}" alt="...">
                <p class="text-center mb-2"><strong>Admin Tien Bakery Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

              <!-- Topbar -->
                 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo Session::get('username_nv'); ?></span>
                                <img class="img-profile rounded-circle"
                                src="{{asset('../public/admin_frontend/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{asset('logout')}}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                    <!-- End of Topbar -->
                    @yield('admin_content')
            </div> 
                <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div><!-- End of Content Wrapper -->
    </div><!-- End of Page Wrapper -->

<!-- Bootstrap core JavaScript-->
<script src="{{asset('../public/admin_frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('../public/admin_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('../public/admin_frontend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('../public/admin_frontend/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('../public/admin_frontend/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('../public/admin_frontend/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('../public/admin_frontend/js/demo/chart-pie-demo.js')}}"></script>


</body>
</html>