<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="/images/logo.svg" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Rewards</a>
                </li>
                @guest()
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">Sign In</a>
                    </li>
                @endguest
            </ul>
            @auth
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">
                            <img alt="" class="rounded-circle mr-2 profile-picture" src="/images/icon-user.png">
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('dashboard-settings-account') }}">Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link d-inline-block mt-2" href="{{ route('cart') }}">
                            @php
                            $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                            @endphp
                            @if($carts > 0)
                                <img alt="" src="/images/icon-cart-filed.svg">
                                <span class="card-badge">{{ $carts }}</span>
                            @else
                                <img alt="" src="/images/icon-cart-empty.svg">
                            @endif
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
            @endauth
        </div>
    </div>
</nav>
