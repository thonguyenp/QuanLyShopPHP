    <!-- Topbar Start -->
    <div class="container-fluid px-5 border-bottom bg-light">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="#" class="text-muted me-2"> <a href="{{route('about')}}">About Us</a></a><small> / </small>
                    <a href="#" class="text-muted ms-2"><a href="{{route('contact.index')}}">Contact</a> </a>

                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted ms-2" data-bs-toggle="dropdown"><small><i
                                    class="fa fa-home me-2"></i> My Dashboard</small></a>
                        <div class="dropdown-menu rounded">
                            @if (!Auth::check())
                            <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                            <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                            @else
                            <a href="{{ route('account') }}" class="dropdown-item">My Account</a>
                            <a href="{{ route('wishlist.index') }}" class="dropdown-item">Wishlist</a>
                            <a href="" class="dropdown-item">Notifications</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                            @endif
                            {{-- @auth
                            @endauth --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-5 py-4 bg-light">
        <div class="row gx-0 align-items-center text-center">
            <div class="col-md-4 col-lg-3 text-center text-lg-start">
                <div class="d-inline-flex align-items-center">
                    <a href="{{route('home')}}" class="navbar-brand p-0">
                        <h1 class="display-5 text-primary m-0"><i
                                class="fas fa-shopping-bag text-secondary me-2"></i>Electro</h1>
                    </a>
                </div>
            </div>
        <div class="col-md-4 col-lg-6 text-center">
            <form action="{{ route('search.index') }}" method="get">
                <div class="position-relative ps-4">
                    <div class="position-relative d-flex border rounded-pill">
                        {{-- Thanh search --}}
                        <input class="form-control border-0 rounded-pill w-100 py-3 pe-5 ps-5" 
                            type="text" placeholder="Tìm kiếm" name="keyword" value="{{ request('keyword') }}">

                        <!-- Icon micro -->
                        <i class="fa fa-microphone position-absolute top-50 translate-middle-y text-muted" 
                        id="voice-search" 
                        style="cursor: pointer; z-index: 2; right:90px; font-size:24px;"></i>

                        <!-- Nút search -->
                        <button type="submit"
                            class="btn btn-primary rounded-pill position-absolute top-50 end-0 translate-middle-y me-2"
                            style="border:0; z-index:3; padding:0.5rem 1.5rem;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid nav-bar p-0 sticky-top bg-primary">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary px-3">
            <!-- Nút toggle (3 gạch) cho màn hình nhỏ -->
            <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu chính -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Menu trái -->
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link active text-white">Home</a>
                    <a href="{{ route('products.index') }}" class="nav-item nav-link text-white">Shop</a>
                    <a href="{{ route('contact.index') }}" class="nav-item nav-link text-white">Contact</a>
                </div>

                <!-- Menu phải (nút yêu thích + giỏ hàng) -->
                <div class="d-flex align-items-center mt-2 me-3">
                    <a href="{{ route('wishlist.index') }}" class="text-white me-3">
                        <span class="rounded-circle btn-md-square border p-2">
                            <i class="fas fa-heart"></i>
                        </span>
                    </a>
                    <a href="#" id="mini-cart-icon" class="text-white position-relative" data-bs-toggle="offcanvas"
                        aria-controls="cartSidebar" data-bs-target="#cartSidebar">
                        <span class="rounded-circle btn-md-square border p-2">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <span id="cart_count"
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            @auth
                            {{ \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity') }}
                            @else
                            {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
                            @endauth
                        </span>
                    </a>
                    <!-- Cart Sidebar (Offcanvas) -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="cartSidebar"
                        aria-labelledby="cartSidebarLabel">
                        <div class="mini-cart-container">
                            @include('clients.components.includes.mini_cart')
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
