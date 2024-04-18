<!-- navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- First Row: Logo, Name, Home, Products, Contact -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="{{ asset('image/'. 'TopDeal-LOGO.png') }}" alt="Logo" width="100" height="100">
                Top Deal
            </a>
            <ul class="navbar-nav me-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
        
        <!-- Social Media Icons -->
        <div class="ms-auto">
            <a href="#" class="me-2"><i class="fab fa-facebook"><img src="{{ asset('image/'. 'TopDeal-LOGO.png') }}" alt="Logo" width="50" height="50"></i></a>
            <a href="#" class="me-2"><i class="fab fa-youtube"></i></a>
            <a href="#" class="me-2"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</nav>

<!-- Second Row: Search Bar, Cart, Login -->
<div class="bg-light">
    <div class="container">
        <div class="row align-items-center py-2">
            <!-- Search Bar -->
            <div class="col-lg-6">
                <form class="d-flex" role="search" action="{!! route('search') !!}" method="get">
                    <input class="form-control form-control-lg me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success btn-lg" type="submit">Search</button>
                </form>
            </div>
            
            <!-- Cart and Login Section -->
            <div class="col-lg-6 text-end">
                <a class="text-dark me-3" href="{{ route('carts') }}">
                    <i class="fas fa-shopping-cart"></i> Cart
                    <span class="badge badge-warning">
                        {{ App\Models\Models\Cart::totalItems() }}
                    </span>
                </a>
                <a class="text-dark" href="{{ route('login') }}">
                    <i class="fas fa-user"></i> Login
                </a>
            </div>
        </div>
    </div>
</div>
