<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>CMS-WebShop_Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <!-- End layout styles -->
</head>
<body>
<div class="main-wrapper">

    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
                {{ get_data_user('admins','name') }}
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Dữ liệu sản phẩm</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="database"></i>
                        <span class="link-title">Dữ liệu liên quan</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" class="nav-link">Danh mục</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product.index') }}" class="nav-link">Sản phẩm</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Khách hàng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dealer.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="user-plus"></i>
                        <span class="link-title">Đại lý</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaction.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="database"></i>
                        <span class="link-title">Đơn hàng</span>
                    </a>
                </li>
                <li class="nav-item nav-category">...</li>
{{--                <li class="nav-item">--}}
{{--                    <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">--}}
{{--                        <i class="link-icon" data-feather="hash"></i>--}}
{{--                        <span class="link-title">Documentation</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </nav>

    <div class="page-wrapper">

        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i data-feather="search"></i>
                        </div>
                        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="object-fit: cover" class="wd-30 ht-30 rounded-circle" src="{{ asset('image/placeholder.jpg') }}" alt="profile">
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">{{ get_data_user('admins','name') }}</p>
                                    <p class="tx-12 text-muted">{{ get_data_user('admins','email') }}</p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
{{--                                <li class="dropdown-item py-2">--}}
{{--                                    <a href="../../pages/general/profile.html" class="text-body ms-0">--}}
{{--                                        <i class="me-2 icon-md" data-feather="user"></i>--}}
{{--                                        <span>Profile</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="dropdown-item py-2">--}}
{{--                                    <a href="javascript:;" class="text-body ms-0">--}}
{{--                                        <i class="me-2 icon-md" data-feather="edit"></i>--}}
{{--                                        <span>Edit Profile</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="dropdown-item py-2">--}}
{{--                                    <a href="javascript:;" class="text-body ms-0">--}}
{{--                                        <i class="me-2 icon-md" data-feather="repeat"></i>--}}
{{--                                        <span>Switch User</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="dropdown-item py-2">
                                    <a href="{{ route('get.logout') }}" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->

        <div class="page-content">
            @yield('content')
        </div>

        <!-- partial:../../partials/_footer.html -->
        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
            <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
            <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
        </footer>
        <!-- partial -->

    </div>
</div>

<script src="{{ asset('js/core.js') }}"></script>
<script src="{{ asset('js/feather.min.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>

</body>
</html>
