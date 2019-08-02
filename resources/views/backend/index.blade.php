<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GCO-Admin</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php $config = DB::table('config')->first(); ?>
    @if(isset($config->icon))
        <link rel="shortcut icon" type="image/x-icon" href="{!! url($config->icon) !!}">
@endif

<!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('public/backend/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ url('public/backend/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/backend/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/backend/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- My style -->


    <link href="{{ url('public/upimgs/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ url('public/upimgs/themes/explorer/theme.min.css') }}" media="all" rel="stylesheet" type="text/css"/>


    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="{{ url('public/backend/cus/mystyle.css') }}">

    <script type="text/javascript">
        function homeUrl() {
            return "{!! url('/') !!}";
        }
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <?php //dd($site_info) ?>
        <a href="{!! url('/') !!}" target="_blank" class="logo" title="Xem website">
            <span class="logo-mini"><b>W</b>eb</span>
            <span
                class="logo-lg"><b>{!! isset($site_info->site_title) ? $site_info->site_title : 'Xem website'!!}</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    @if(Auth::user())
                        <?php

                        $user = Auth::user();
                        ?>
                        <li class="user user-menu">
                            <a href="{!! route('backend.user.getEdit',$user->id) !!}" title="Chỉnh sửa tài khoản">
                                <img src="{{ image_url($user->image) }}" class="user-image" alt="User Image">
                                {!! $user->name !!}
                            </a>
                        </li>
                @endif
                <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="{!! route('backend.logout') !!}"
                           onclick="return confirm('Bạn có chắc chắn muốn đăng xuất ?');">
                            <i class="fa fa-power-off"></i>
                            <span class="hidden-xs">Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <section class="sidebar">
            {{--<div class="user-panel" onclick="window.location.href='{!! route('backend.user.getEdit',Auth::user()->id) !!}'" title="Thông tin tài khoản">--}}
            {{--<div class="pull-left image">--}}
            {{--@if($user)--}}
            {{--<img src="{{ image_url($user->image) }}" class="img-circle" alt="User Image">--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--<div class="pull-left info">--}}
            {{--@if($user)--}}
            {{--<p>{!! $user->name !!}</p>--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--</div>--}}

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                <li class="{{ URL::current() === url('backend') ? 'active' : null }}">
                    <a href="{!! route('backend.home') !!}">
                        <i class="fa fa-home"></i> <span>Home</span>
                    </a>
                </li>

                @if(Auth::user())
                    @if(Auth::user()->id == 1)
                        <li class="{{ Request::segment(2) === 'user' ? 'active' : null }}">
                            <a href="{!! route('backend.user') !!}">
                                <i class="fa fa-users"></i> <span>Quản trị viên</span>
                            </a>
                        </li>
                    @endif
                @endif


                <li class="{!! (Request::segment(2) === 'cate' || Request::segment(2) === 'product' || (isset($_GET['type']) && ($_GET['type'] == 'size'))) ? 'active' : '' !!} treeview">
                    <a href="#">
                        <i class="fa fa-apple"></i> <span>Sản phẩm</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::segment(3) === 'list' ? 'active' : null }}"><a
                                href="{!! route('backend.product') !!}"><i class="fa fa-circle-o"></i> Danh sách sản
                                phẩm</a></li>
                        <li class="{{ Request::segment(3) === 'category' ? 'active' : null }}"><a
                                href="{!! route('backend.product.category') !!}"><i class="fa fa-circle-o"></i> Danh mục
                                sản phẩm</a></li>
                        <li class="{{ Request::segment(3) === 'brand' ? 'active' : null }}"><a
                                href="{!! route('backend.product.brand') !!}"><i class="fa fa-circle-o"></i> Thương hiệu</a>
                        </li>
                        <li class="{{ Request::segment(3) === 'filter' ? 'active' : null }}"><a
                                href="{!! route('backend.product.filter','filter_type=price') !!}"><i
                                    class="fa fa-circle-o"></i> Bộ lọc</a></li>
                        <li class="{{ Request::segment(3) === 'config' ? 'active' : null }}"><a
                                href="{!! route('backend.product.getConfig') !!}"><i class="fa fa-circle-o"></i> Cài đặt</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::segment(2) === 'order' ? 'active' : null }}">
                    <a href="{!! route('backend.order') !!}">
                        <i class="fa fa-cart-plus"></i> <span>Đơn hàng</span>
                    </a>
                </li>

                <li class="{{ Request::segment(2) === 'blog' ? 'active' : null }}">
                    <a href="{!! route('backend.blog') !!}">
                        <i class="fa fa-newspaper-o"></i> <span>Tin tức</span>
                    </a>
                </li>
                <li class="{{ Request::segment(2) === 'contact' ? 'active' : null }}">
                    <a href="{!! route('backend.contact') !!}">
                        <i class="fa fa-odnoklassniki"></i> <span>Liên hệ</span>
                    </a>
                </li>

                <li class="{{ Request::segment(2) === 'about' ? 'active' : null }}">
                    <a href="{!! route('backend.about') !!}">
                        <i class="fa fa-exclamation-circle"></i> <span>Giới thiệu</span>
                    </a>
                </li>

                <li class="{!! Request::segment(2) === 'config' ? 'active' : '' !!} treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span>Cấu hình</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::segment(3) === 'general' ? 'active' : null }}"><a
                                href="{!! route('backend.config.general') !!}"><i class="fa fa-circle-o"></i> Cấu hình
                                chung</a></li>

                        <li class="{{ Request::segment(3) === 'service' ? 'active' : null }}"><a
                                href="{!! route('backend.config.service') !!}"><i class="fa fa-circle-o"></i> Dịch
                                vụ</a></li>

                        <li class="{{ Request::segment(3) === 'policy' ? 'active' : null }}"><a
                                href="{!! route('backend.config.policy') !!}"><i class="fa fa-circle-o"></i> Chính sách</a>
                        </li>

                        <li class="{{ Request::segment(3) === 'ads' ? 'active' : null }}"><a
                                href="{!! route('backend.config.ads') !!}"><i class="fa fa-circle-o"></i> Quảng cáo</a>
                        </li>

                        <li class="{{ Request::segment(3) === 'social' ? 'active' : null }}"><a
                                href="{!! route('backend.config.getSocial') !!}"><i class="fa fa-circle-o"></i> Mạng xã
                                hội</a></li>

                        <li class="{{ Request::segment(3) === 'bank' ? 'active' : null }}"><a
                                href="{!! route('backend.config.bank') !!}"><i class="fa fa-circle-o"></i> Ngân hàng</a>
                        </li>

                        <li class="{{ Request::segment(3) === 'partner' ? 'active' : null }}"><a
                                href="{!! route('backend.config.partner') !!}"><i class="fa fa-circle-o"></i> Đối
                                tác</a></li>
                        <li class="{{ Request::segment(3) === 'customer' ? 'active' : null }}"><a
                                href="{!! route('backend.config.customer') !!}"><i class="fa fa-circle-o"></i> Khách
                                hàng</a></li>

                        <li class="{{ Request::segment(3) === 'home' ? 'active' : null }}"><a
                                href="{!! route('backend.config.home') !!}"><i class="fa fa-circle-o"></i> Trang chủ</a>
                        </li>
                        <li class="{{ Request::segment(3) === 'other' ? 'active' : null }}"><a
                                href="{!! route('backend.config.getOther') !!}"><i class="fa fa-circle-o"></i> Khác</a>
                        </li>


                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if(URL::current() != url('backend'))
            <section class="content-header">
                <h1>
                    <a href="@yield('controller_route')">@yield('controller')</a>
                    <small>@yield('action')</small>
                </h1>

                <ol class="breadcrumb">
                    <li><a href="{!! url('backend') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="@yield('controller_route')">@yield('controller')</a></li>
                    <li class="active">@yield('action')</li>
                </ol>
            </section>
        @endif

        <section class="content">
            <div class="box">
                @if(session('flash_message'))
                    <div class="alert alert-{!! session('flash_level') !!} alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                        {!! session('flash_message') !!}
                    </div>
                @endif

                <div class="box-body">
                    @yield('content')
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2-2018 _ <a href="mailto:letien524@gmail.com">letien524@gmail.com</a> </strong>
        All rights reserved.
    </footer>

    <div class="modal fade" id="modal-media-imge">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thư viện hình ảnh</h4>
                </div>
                <div class="modal-body">
                    <iframe src="{!! url('/') !!}/file/dialog.php?field_id=image" id="iframeImg"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./wrapper -->

{{--<script src="{{ asset('public/backend/plugins/jQuery/jquery-3.1.1.min.js') }}"></script>--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ url('public/upimgs/js/fileinput.min.js') }}" type="text/javascript"></script>
<script src="{{ url('public/upimgs/themes/explorer/theme.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/backend/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('public/backend/dist/js/adminlte.js') }}"></script>
<script src="{{ url('public/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('public/backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script src="{!! asset('public/tinymce/tinymce.min.js') !!}"></script>

<!-- My Script -->
<script src="{{ url('public/backend/cus/myscript.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

</body>
</html>
