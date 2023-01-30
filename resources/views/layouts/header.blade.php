
<div id="header-wrap">

    <header id="header">
        <div class="container">
            <div class="row">

                <nav class="navbar navbar-expand-lg col-md-12">

                    <div class="navbar-brand">
                        <a href="cake">
                            <img src="frontend/images/main-logo.png" alt="logo">
                        </a>
                    </div>

                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#slide-navbar-collapse" aria-controls="slide-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="icon icon-navicon"></i></span>
                    </button>

                    <div class="navbar-collapse collapse" id="slide-navbar-collapse">
                        <ul class="navbar-nav list-inline text-uppercase">
                            <li class="nav-item text-hover"><a href="{{ url ('/') }}" class="nav-link" data-effect="Home">Home</a></li>
                            <li class="nav-item text-hover"><a href="{{ url ('/shop') }}" class="nav-link" data-effect="Shop">Shop</a></li>
                            <li class="nav-item text-hover"><a href="frontend.about" class="nav-link" data-effect="About Us">About us</a></li>
                            <li class="nav-item text-hover"><a href="frontend.contact" class="nav-link" data-effect="Contact">Contact us</a></li>

                            {{-- <li><a href="single-post.html" class="dropdown-item">Single Post</a></li>
                            <li><a href="single-product.html" class="dropdown-item">Single Product</a></li> --}}
                        </ul>
                    </div>

                    <div class="action-menu d-flex justify-content-end mr-3">
                        <div class="searchbar">
                            <a href="#" class="search-button search-toggle" data-selector=".navbar">
                                <i class="icon icon-search"></i>
                            </a>
                            <form role="search" method="get" class="search-box" action="">
                                <input class="search-field text search-input" placeholder="Search" type="search">
                            </form>
                        </div>
                        <div class="shopping-cart">
                            <a href="#">
                                <i class="icon icon-shopping-cart"></i>
                            </a>
                        </div>
                    </div><!--action-menu-->

                    <div class="d-flex justify-content-end">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </div>

    </header>

</div><!--header-wrap-->
