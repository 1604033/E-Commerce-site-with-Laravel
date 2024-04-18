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
    <nav class= "navbar navbar-expand-lg bg-body-tertiary">

    <!div class="container-fluid">
    <div class="container">
    <a class="navbar-brand" href="{{route('homepage')}}">
    <img src="{{ asset('image/'. 'logo.jpeg')}}" width="60" height="60">
    Top Deal 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('product')}}">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Blog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action = "{!! route('search') !!}" method = "get">
       <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button> -->
        <div class="input-group mb-3">
        <input type="text" class="form-control" name = "search" placeholder="Product name" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>
      </form>
      <ul class = "navbar-nav ml-auto">
        <li>
          <a class="nav-link" href="{{ route('carts') }}">
          <div class = "align-right" align = "right" >
            <button class = "btn btn-danger" >
            <span class = "mt-1" style="float: right"> 
            <img src="{{ asset('image/'. 'shopping-cart.png')}}" width="50" height="50"></span>
            <span class="badge badge-warning"> 
              {{ App\Models\Models\Cart::totalItems() }}
            </span>
            </button>
            </div>
            
          
          </a>
        </li>

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

 @include('partials.navbar')
 @include('partials.product_sidebar')
 @include('partials.demo1')

 @include('partials.footer')

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

