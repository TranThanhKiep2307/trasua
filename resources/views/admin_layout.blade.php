<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Trang quản lý</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/backend/assets/images/favicon.png')}}">
    <link href="{{asset('public/backend/plugins/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/style.min.css')}}" rel="stylesheet">
    <style>
        .sidebar-submenu {
            display: none;
        }
    </style>
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon">
                            <img src="{{asset('public/backend/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />

                        </b>
                        <span class="logo-text">
                            <img src="{{asset('public/backend/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />

                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav me-auto mt-md-0 ">

                        <li class="nav-item hidden-sm-down">
                            <form class="app-search ps-3">
                                <input type="text" class="form-control" placeholder="Search for..."> <a
                                    class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li>
                    </ul>
                    <?php
                        $name = session()->get('admin_name');
                        ?>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo asset('public/backend/assets/images/users/TK.jpg'); ?>" alt="user" class="profile-pic me-2">
                                    <?php echo $name; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Thông tin</a></li>
                                    <li><a class="dropdown-item" href="<?php echo URL::to('/logout'); ?>">Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL::to('/dashboard')}}"
                                aria-expanded="false">
                                <i class="me-3 far fa-clock fa-fw" aria-hidden="true">
                                </i>
                                <span class="hide-menu">Trang quản lý</span>
                            </a>
                        </li>
                        <li class="sidebar-item dropdown">
                            <span class="sidebar-link waves-effect waves-dark toggleSubMenu">
                                <i class="me-3 fas fa-utensils" aria-hidden="true"></i>
                                <span>Danh mục sản phẩm</span> 
                                <i class="fa fa-caret-down" aria-hidden="false"></i>
                            </span>
                            <ul class="sidebar-submenu" id="subMenu1">
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL::to('/add-category-product')}}"
                                        aria-expanded="false">
                                        <i class="me-3 fa fa-table" aria-hidden="false"></i>
                                        <span>Thêm danh mục</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL::to('/all-category-product')}}"
                                        aria-expanded="false">
                                        <i class="me-3 fa fa-table" aria-hidden="false"></i>
                                        <span>Liệt kê danh mục</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item dropdown">
                            <span class="sidebar-link waves-effect waves-dark toggleSubMenu">
                                <i class="me-3 fas fa-utensils" aria-hidden="true"></i>
                                <span>Sản phẩm</span> 
                                <i class="fa fa-caret-down" aria-hidden="false"></i>
                            </span>
                            <ul class="sidebar-submenu" id="subMenu2">
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL::to('/add-product')}}"
                                        aria-expanded="false">
                                        <i class="me-3 fa fa-table" aria-hidden="false"></i>
                                        <span>Thêm sản phẩm</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL::to('/all-product')}}"
                                        aria-expanded="false">
                                        <i class="me-3 fa fa-table" aria-hidden="false"></i>
                                        <span>Liệt kê sản phẩm</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('admin_content')
    </div>
    <script src="public/backend/assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="public/backend/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/backend/js/app-style-switcher.js"></script>
    <script src="public/backend/js/waves.js"></script>
    <script src="public/backend/js/sidebarmenu.js"></script>
    <script src="public/backend/js/custom.js"></script>
    <script src="public/backend/assets/plugins/flot/jquery.flot.js"></script>
    <script src="public/backend/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="public/backend/js/pages/dashboards/dashboard1.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var toggleSubMenu = document.querySelectorAll('.toggleSubMenu');
            
            toggleSubMenu.forEach(function (toggle) {
                toggle.addEventListener('click', function () {
                    var subMenu = this.nextElementSibling;
                    if (subMenu.style.display === 'none' || subMenu.style.display === '') {
                        subMenu.style.display = 'block';
                    } else {
                        subMenu.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>

{{-- 
                            <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html"
                                aria-expanded="false">
                                <i class="me-3 far fa-clock fa-fw" aria-hidden="true">
                                </i>
                                <span class="hide-menu">Trang quản lý</span>
                            </a>
                        </li>
                            <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-profile.html"
                                aria-expanded="false">
                                <i class="me-3 fa fa-user" aria-hidden="true">
                                </i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li> 
                       <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="icon-fontawesome.html" aria-expanded="false"><i class="me-3 fa fa-font"
                                    aria-hidden="true"></i><span class="hide-menu">Icon</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="map-google.html" aria-expanded="false"><i class="me-3 fa fa-globe"
                                    aria-hidden="true"></i><span class="hide-menu">Google Map</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="blank.html" aria-expanded="false"><i class="me-3 fa fa-columns"
                                    aria-hidden="true"></i><span class="hide-menu">Blank</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="404.html" aria-expanded="false"><i class="me-3 fa fa-info-circle"
                                    aria-hidden="true"></i><span class="hide-menu">Error 404</span></a></li> --}}