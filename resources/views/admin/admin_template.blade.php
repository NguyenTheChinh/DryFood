<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>

    <style>
        #loader {
            transition: all .3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1s infinite ease-in-out;
            animation: sk-scaleout 1s infinite ease-in-out
        }

        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                opacity: 0
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }
    </style>
    <link href="/admin_core/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="/admin_core/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="/admin_core/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/admin_core/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="/css/admin/style.min.css" rel="stylesheet">
    <link href="/admin_core/pace-progress/css/pace.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<div id="loader">
    <div class="spinner"></div>
</div>
<script>
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 300);
    });
</script>
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="/svg/403.svg" width="89" height="25" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="/svg/404.svg" width="30" height="30" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="{{url('/')}}">Trang Chủ</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                <i class="fa fa-lock"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</header>
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/order">
                        <i class="nav-icon icon-speedometer"></i> Đơn Hàng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/product">
                        <i class="nav-icon icon-drop"></i> Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/category">
                        <i class="nav-icon icon-drop"></i> Loại Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/news">
                        <i class="nav-icon icon-pencil"></i> Bài Viết</a>
                </li>
            </ul>
        </nav>
    </div>
    <main class="main">
        <div class="container-fluid">
            <div class="animated fadeIn mt-3">
                @yield('content')
            </div>
        </div>
    </main>
</div>
<script src="/admin_core/jquery/js/jquery.min.js"></script>
<script src="/admin_core/popper.js/js/popper.min.js"></script>
<script src="/admin_core/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin_core/pace-progress/js/pace.min.js"></script>
<script src="/admin_core/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
<script src="/admin_core/@coreui/coreui/js/coreui.min.js"></script>
@yield('plugins')
</body>
</html>