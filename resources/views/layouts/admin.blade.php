<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ env('APP_NAME') }} - @yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="robots" content="noindex, nofollow">
        
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/icheck.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/buttons.bootstrap4.min.css') }}">
 
        
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    
        @stack('styles')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper" id="body">

        
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="sidebar">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            
        </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <div class="input-group-append">
            </div>
        </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <li class="dropdown user user-menu" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="color:#ffff;">
                    <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                    <span class="fa fa fa-user"></span>
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu"  style="color:#ffff;">
                    <li class="user-header" id="opciones">
                        <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                        <i class="fa fa-user fa-5x" style="color:#fff;"></i>
                        <p>
                        {{ Auth::user()->name }}
                        <br>
                        {{ Auth::user()->hasrole('administrador') ? 'Administrador' : 'Votante' }}
                        </p>
                    </li>
                    <li class="user-footer">
                    @can('view_loginsd')
                        <div class="float-left">
                        <a href="{{ url('user', [Auth::user()->encode_id]) }}" class="btn btn-default btn-flat">
                            <i class="fa fa-eye"></i> Datos
                        </a>
                        </div>
                        <div class="float-left">
                        <a href="{{ url('logins', [Auth::user()->encode_id]) }}" class="btn btn-default btn-flat">
                            <i class="fa fa-sign-in"></i> Logins
                        </a>
                        </div>
                        @endcan
                        <div class="float-right">
                        <a href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                            <i class="fa fa-sign-out"></i> Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </div>
                    </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- Uncomment this line to activate the control right sidebar button
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                -->
                </ul>
            </div>
        </ul>
    </nav>
    <!-- /.navbar -->
        

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" id="leftmenu">
            @include('layouts.partials.leftmenu')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
            <h1>
                @yield('page_title')
                <small>@yield('page_subtitle')</small>
            </h1>
            <ol class="breadcrumb float-sm-right">
            
                @show
            </ol>
            </section>

    

            <!-- Main content -->
            <section class="content container-fluid">
            <!--Page Content Here -->
            @yield('content')
            </section>
        </div>

        <!-- confirm modal -->
        @include('layouts.partials.confirm_modal')

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right hidden-xs">
            {{ env('APP_NAME') }}
            </div>
            <strong>Copyright &copy; 2020 <a href="#">{{ env('APP_NAME') }}</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <!-- Uncomment this line to activate the control right sidebar menu
        @@include('layouts.partials.sidebar')
        -->
        </div>

        <!-- REQUIRED JS SCRIPTS -->
        <!-- jQuery -->
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/icheck.js')}}"></script>
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('js/dataTables.buttons.min.js') }}"></script>
        <script src="{{asset('js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{asset('js/jszip.min.js') }}"></script>
        <script src="{{asset('js/pdfmake.min.js') }}"></script>
        <script src="{{asset('js/vfs_fonts.js') }}"></script>
        <script src="{{asset('js/buttons.html5.min.js') }}"></script>
        <script src="{{asset('js/buttons.print.min.js') }}"></script>
        <script src="{{asset('js/buttons.colVis.min.js') }}"></script>
       
        
        @stack('scripts')
    
        <style>
        
        #sidebar{
            
        
                    background: #E53935;
                    font-family: 'Roboto', sans-serif;
                    -webkit-box-shadow: 20px 20px 10px 0px rgba(0,0,0,0.40);
                    -moz-box-shadow: 20px 20px 10px 0px rgba(0,0,0,0.40);
                    box-shadow: 20px 20px 10px 0px rgba(0,0,0,0.40);
                }

        
        #opciones{
            
                    background: #E53935;
        
        
                }



        </style>
    </body>
</html>