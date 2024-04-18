<html>
 <head>
<meta charset = "utf-8">
<title>
    Ecommerce Site 
</title>

@include('partials.styles')


</head>

<body>
 
 <div class="wrapper">

    <!--navigation bar start-->
    <!-- navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="{{ asset('image/'. 'TopDeal-LOGO.png') }}" alt="Logo" width="130" height="110">
            Top Deal
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><font color="red">Offer</font></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <!-- Add more menu items as needed -->
            </ul>
            <div class="col-lg-5">
                <form class="d-flex" role="search" action="{!! route('search') !!}" method="get">
                    <input class="form-control form-control-lg me-2" type="search" placeholder="Product Name" aria-label="Search" name="search">
                    <button class="btn btn-outline-success btn-lg" type="submit">Search</button>
                </form>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('carts') }}">
                        <button class="btn btn-submit">
                        <div class = "align-right" align = "right" >
                        <span class="badge badge-warning" style="color:red">
                                {{ App\Models\Models\Cart::totalItems() }}
                        </span>
                            <span class="mt-1" style="float: right" >
                            <img src="{{ asset('image/'. 'shopping-cart.png')}}" width="30" height="30">
                            </span>
                            
                        </button>
                    </a>
                </li>
                <!-- Add more menu items as needed -->
            </ul>
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
 <!--navigation bar end--> 

 @yield('content')

 @include('partials.footer')
 @yield('scripts')
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>