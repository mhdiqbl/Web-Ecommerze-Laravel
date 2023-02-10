<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <title>@yield('title')</title>

    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
    <link href="/style/main.css" rel="stylesheet"/>
    @stack('addon-style')
</head>

<body>
<div class="page-dashboard">
    <div class="d-flex" data-aos="fade-right" id="wrapper">
        <!--        sidebar-->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center">
                <img alt="" class="my-4" src="/images/dashboard-store-logo.svg">
            </div>
            <div class="list-group list-group-flush">
                <a href="/dashboard.html" class="list-group-item list-group-item-action" >
                    Dashboard
                </a>
                <a class="list-group-item list-group-item-action" href="/dashboard-products.html">
                    My Product
                </a>
                <a class="list-group-item list-group-item-action" href="/dashboard-transactions.html">
                    Transaction
                </a>
                <a class="list-group-item list-group-item-action" href="/dashboard-setting.html">
                    Store Setting
                </a>
                <a class="list-group-item list-group-item-action" href="/dashboard-account.html">
                    My Account
                </a>
                <a class="list-group-item list-group-item-action" href="/index.html">
                    Sign Out
                </a>
            </div>
        </div>

        <!--        Page Content-->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                <div class="container-fluid">
                    <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                        &laquo; Menu
                    </button>
                    <button class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse"
                            type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Desktop Menu -->
                        <ul class="navbar-nav d-none d-lg-flex ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">
                                    <img alt="" class="rounded-circle mr-2 profile-picture" src="/images/icon-user.png">
                                    Hi, Iqbal
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/dashboard.html">Dashboard</a>
                                    <a class="dropdown-item" href="/dashboard-account.html">Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/">Logout</a>
                                </div>
                            <li class="nav-item">
                                <a class="nav-link d-inline-block mt-2" href="#">
                                    <img alt="" src="/images/icon-cart-filed.svg">
                                    <span class="card-badge">3</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav d-blok d-lg-none">
                            <li class="nav-item">
                                <a class="nav-link d-block d-lg-none" href="#">
                                    Hi, Iqbal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-inline-block" href="#">
                                    Cart
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

                {{--            Content--}}
            @yield('content')
        </div>
    </div>
</div>


@stack('prepend-script')
<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.slim.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    $("menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
@stack('addon-script')
</body>

</html>
