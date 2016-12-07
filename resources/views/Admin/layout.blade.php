<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!!url('public/vendor/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!!url('public/vendor/metisMenu/metisMenu.min.css')!!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!!url('public/dist/css/sb-admin-2.css')!!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!!url('public/vendor/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!!url('Admin/logout')!!}"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--Nếu user là SUPERADMIN thì mới hiển thị phần quản lý user, phân quyền-->
                        @if(session('user_group_id') == 'SUPERADMIN')
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Quản lý phân quyền<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!url('Admin/user/all-user')!!}">Danh sách người dùng</a>
                                </li>
                                <li>
                                    <a href="{!!url('Admin/user/add-user')!!}">Thêm thông tin người dùng mới</a>
                                </li>
                                <li>
                                    <a href="{!!url('Admin/user/role-group')!!}">Phân quyền nhóm người dùng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Quản lý sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!url('Admin/product/all-product')!!}">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{!!url('Admin/product/add-product')!!}">Thêm sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Quản lý khách hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="">Danh sách khách hàng</a>
                                </li>
                                <li>
                                    <a href="">Thêm khách hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">@yield('option')</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div>
                    @yield('content')
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{!!url('public/vendor/jquery/jquery.min.js')!!}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!!url('public/vendor/bootstrap/js/bootstrap.min.js')!!}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{!!url('public/vendor/metisMenu/metisMenu.min.js')!!}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{!!url('public/dist/js/sb-admin-2.js')!!}"></script>
    @yield('script')


</body>

</html>
