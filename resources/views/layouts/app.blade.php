<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
    {{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    {{--    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">--}}
    {{--    <link rel="stylesheet" href="plugins/morris/morris.css">--}}
    {{--    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">--}}
    <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="/dist/css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <div class="sidebar" style="direction: ltr">
            <div style="direction: rtl">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ '/users/create' }}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-danger"></i>
                                <p class="text">ایجاد لیست</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ '/users' }}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-danger"></i>
                                <p class="text">مشاهده لیست</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ '/admin/product' }}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-danger"></i>
                                <p class="text">مشاهده محصولات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ '/admin/product/create' }}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-danger"></i>
                                <p class="text">ایجاد محصول</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ '/user/order' }}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-warning"></i>
                                <p>مشاهده سفارش ها</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <a class="font-weight-bold h3" href="{{ '/list/' . auth()->id() }}">لینک شما</a>
                    </div>
                </div>
                @yield('content')
            </div>
        </section>
    </div>


    <aside class="control-sidebar control-sidebar-dark">

    </aside>
</div>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/plugins/morris/morris.min.js"></script>
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/plugins/fastclick/fastclick.js"></script>
<script src="/dist/js/adminlte.js"></script>
<script src="/dist/js/pages/dashboard.js"></script>
<script src="/dist/js/demo.js"></script>
</body>
</html>
