<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{url('/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/AdminLTE/dist/css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->

    <link rel="stylesheet" href="{{url('/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/select.dataTables.min.css')}}">
    <!-- data table -->
    <link rel="stylesheet" href="{{url('/AdminLTE/dist/css/skins/skin-blue.min.css')}}">
    <link rel="stylesheet" href="{{url('/AdminLTE/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/main.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <style>
      body{
        font-family: 'BTabssom';
        height: 100%;
        margin: 0;
        padding: 0;

      }
      #mymap {
        height: 100%;
      }

    </style>
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>E</b>RP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>ERP</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!--<li class="dropdown messages-menu">-->
                <!--&lt;!&ndash; Menu toggle button &ndash;&gt;-->
                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                  <!--<i class="fa fa-envelope-o"></i>-->
                  <!--<span class="label label-success">4</span>-->
                <!--</a>-->
                <!--<ul class="dropdown-menu">-->
                  <!--<li class="header">You have 4 messages</li>-->
                  <!--<li>-->
                    <!--&lt;!&ndash; inner menu: contains the messages &ndash;&gt;-->
                    <!--<ul class="menu">-->
                      <!--<li>&lt;!&ndash; start message &ndash;&gt;-->
                        <!--<a href="#">-->
                          <!--<div class="pull-left">-->
                            <!--&lt;!&ndash; User Image &ndash;&gt;-->
                            <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                          <!--</div>-->
                          <!--&lt;!&ndash; Message title and timestamp &ndash;&gt;-->
                          <!--<h4>-->
                            <!--Support Team-->
                            <!--<small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                          <!--</h4>-->
                          <!--&lt;!&ndash; The message &ndash;&gt;-->
                          <!--<p>Why not buy a new awesome theme?</p>-->
                        <!--</a>-->
                      <!--</li>&lt;!&ndash; end message &ndash;&gt;-->
                    <!--</ul>&lt;!&ndash; /.menu &ndash;&gt;-->
                  <!--</li>-->
                  <!--<li class="footer"><a href="#">See All Messages</a></li>-->
                <!--</ul>-->
              <!--</li>&lt;!&ndash; /.messages-menu &ndash;&gt;-->

              <!--&lt;!&ndash; Notifications Menu &ndash;&gt;-->
              <!--<li class="dropdown notifications-menu">-->
                <!--&lt;!&ndash; Menu toggle button &ndash;&gt;-->
                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                  <!--<i class="fa fa-bell-o"></i>-->
                  <!--<span class="label label-warning">10</span>-->
                <!--</a>-->
                <!--<ul class="dropdown-menu">-->
                  <!--<li class="header">You have 10 notifications</li>-->
                  <!--<li>-->
                    <!--&lt;!&ndash; Inner Menu: contains the notifications &ndash;&gt;-->
                    <!--<ul class="menu">-->
                      <!--<li>&lt;!&ndash; start notification &ndash;&gt;-->
                        <!--<a href="#">-->
                          <!--<i class="fa fa-users text-aqua"></i> 5 new members joined today-->
                        <!--</a>-->
                      <!--</li>&lt;!&ndash; end notification &ndash;&gt;-->
                    <!--</ul>-->
                  <!--</li>-->
                  <!--<li class="footer"><a href="#">View all</a></li>-->
                <!--</ul>-->
              <!--</li>-->
              <!--&lt;!&ndash; Tasks Menu &ndash;&gt;-->
              <!--<li class="dropdown tasks-menu">-->
                <!--&lt;!&ndash; Menu Toggle Button &ndash;&gt;-->
                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                  <!--<i class="fa fa-flag-o"></i>-->
                  <!--<span class="label label-danger">9</span>-->
                <!--</a>-->
                <!--<ul class="dropdown-menu">-->
                  <!--<li class="header">You have 9 tasks</li>-->
                  <!--<li>-->
                    <!--&lt;!&ndash; Inner menu: contains the tasks &ndash;&gt;-->
                    <!--<ul class="menu">-->
                      <!--<li>&lt;!&ndash; Task item &ndash;&gt;-->
                        <!--<a href="#">-->
                          <!--&lt;!&ndash; Task title and progress text &ndash;&gt;-->
                          <!--<h3>-->
                            <!--Design some buttons-->
                            <!--<small class="pull-right">20%</small>-->
                          <!--</h3>-->
                          <!--&lt;!&ndash; The progress bar &ndash;&gt;-->
                          <!--<div class="progress xs">-->
                            <!--&lt;!&ndash; Change the css width attribute to simulate progress &ndash;&gt;-->
                            <!--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
                              <!--<span class="sr-only">20% Complete</span>-->
                            <!--</div>-->
                          <!--</div>-->
                        <!--</a>-->
                      <!--</li>&lt;!&ndash; end task item &ndash;&gt;-->
                    <!--</ul>-->
                  <!--</li>-->
                  <!--<li class="footer">-->
                    <!--<a href="#">View all tasks</a>-->
                  <!--</li>-->
                <!--</ul>-->
              <!--</li>-->
              <!-- User Account Menu -->
              @if (Auth::guest())
              <li><a href="{{ url('/login') }}">تسجيل الدخول</a></li>
              <li><a href="{{ url('/register') }}">التسجيل</a></li>
              @else
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <!--<li class="user-header">-->
                    <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                    <!--<p>-->
                      <!--Alexander Pierce - Web Developer-->
                      <!--<small>Member since Nov. 2012</small>-->
                    <!--</p>-->
                  <!--</li>-->
                  <!-- Menu Body -->
                  <!--<li class="user-body">-->
                    <!--<div class="col-xs-4 text-center">-->
                      <!--<a href="#">Followers</a>-->
                    <!--</div>-->
                    <!--<div class="col-xs-4 text-center">-->
                      <!--<a href="#">Sales</a>-->
                    <!--</div>-->
                    <!--<div class="col-xs-4 text-center">-->
                      <!--<a href="#">Friends</a>-->
                    <!--</div>-->
                  <!--</li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!--<div class="pull-left">-->
                      <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                    <!--</div>-->
                    <div class="pull-right">
                      <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">تسجيل الخروج</a>
                    </div>
                  </li>
                </ul>
              </li>
              @endif
              <!-- Control Sidebar Toggle Button -->
              <!--<li>-->
                <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
              <!--</li>-->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      @if(Auth::user())
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-right image">
              <img src="{{url('/AdminLTE/dist/img/avatar04.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> متاح</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <!--<form action="#" method="get" class="sidebar-form">-->
            <!--<div class="input-group">-->
              <!--<input type="text" name="q" class="form-control" placeholder="Search...">-->
              <!--<span class="input-group-btn">-->
                <!--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>-->
              <!--</span>-->
            <!--</div>-->
          <!--</form>-->
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{url('customers')}}"><i class="fa fa-users"></i> <span>العملاء</span></a></li>
            <li><a href="{{url('suppliers')}}"><i class="fa fa-truck"></i> <span>الموردين</span></a></li>
            <li><a href="{{url('executers')}}"><i class="fa fa-users"></i> <span>المنفذين</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-list-alt"></i> <span>المنتجات والخدمات</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{url('categories')}}"><i class="fa fa-list-alt"></i>التصنيفات</a></li>
                <li><a href="{{url('products')}}"><i class="fa fa-cart-plus"></i>المنتجات</a></li>
              </ul>
            </li>
            {{--<li class="treeview">--}}
              {{--<a href="#"><i class="fa fa-money"></i> <span>الطلبات</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
              {{--<ul class="treeview-menu">--}}
                {{--<li><a href="{{url('estimates')}}"><i class="fa fa-money"></i>عرض الأسعار</a></li>--}}
                {{--<li><a href="{{url('bills')}}"><i class="fa fa-check-circle-o "></i>الفواتير</a></li>--}}
              {{--</ul>--}}
            {{--</li>--}}
            <li><a href="{{url('order')}}"><i class="fa fa-money"></i> <span>الطلبات</span></a></li>
            <li><a href="{{url('agents')}}"><i class="fa fa-users"></i> <span>وكلاء البيع</span></a></li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
      @endif

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content">
      @yield('content')
        <!-- Content Header (Page header) -->
        {{--<section class="content-header">--}}
          {{--<h1>--}}
            {{--Page Header--}}
            {{--<small>Optional description</small>--}}
          {{--</h1>--}}
          {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
            {{--<li class="active">Here</li>--}}
          {{--</ol>--}}
        {{--</section>--}}

        <!-- Main content -->


          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          {{--Anything you want--}}
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{date('Y')}} <a href="{{url('www.ieasoft.net/ieasoft')}}">IEASOFT</a>.</strong> جميع الحقوق محفوظة
      </footer>

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="{{url('/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{url('/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/AdminLTE/dist/js/app.min.js')}}"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  @yield('script');
  </body>
</html>
