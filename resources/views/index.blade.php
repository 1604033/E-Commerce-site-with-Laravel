<html>
 <head>
<meta charset = "utf-8">
<title>
    Ecommerce Site 
</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body>
 
 <div class="wrapper">
    <!--navigation bar start-->
    <nav class= "navbar navbar-expand-lg bg-body-tertiary">

    <!div class="container-fluid">
    <div class="container">
    <a class="navbar-brand" href="#">Ecommerce Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
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
      <form class="d-flex" role="search">
       <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button> -->
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Product name" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>
      </form>
    </div>
  </div>
</nav>
 </div>
 <!--navigation bar end--> 

 <!--start sidebar & content-->
<div class='container margin-top-20'>
    <div class="row">
        <div class="col-md-4">
        <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    All Items 
  </a>
  <a href="#" class="list-group-item list-group-item-action">A second link item</a>
  <a href="#" class="list-group-item list-group-item-action">A third link item</a>
  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
  <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
</div>
        </div>
        <div class="col-md-8">
           <div class="widget">
            <h3>Featured Products</h3>
            <div class="row">

                <div class="col-md-4">
                 <div class="card">
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Helmet</h5>
                           <p class="card-text">Price: 2500 tk</p>
                           <a href="#" class="btn btn-primary">Add to cart</a>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                 <div class="card">
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Helmet</h5>
                           <p class="card-text">Price: 2500 tk</p>
                           <a href="#" class="btn btn-primary">Add to cart</a>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                 <div class="card">
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Helmet</h5>
                           <p class="card-text">Price: 2500 tk</p>
                           <a href="#" class="btn btn-primary">Add to cart</a>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                 <div class="card">
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Helmet</h5>
                           <p class="card-text">Price: 2500 tk</p>
                           <a href="#" class="btn btn-primary">Add to cart</a>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                 <div class="card">
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Helmet</h5>
                           <p class="card-text">Price: 2500 tk</p>
                           <a href="#" class="btn btn-primary">Add to cart</a>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                 <div class="card">
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Helmet</h5>
                           <p class="card-text">Price: 2500 tk</p>
                           <a href="#" class="btn btn-primary">Add to cart</a>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                 <div class="card" >
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Card title</h5>
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                 <div class="card" >
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Card title</h5>
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                 <div class="card" >
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Card title</h5>
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                 <div class="card" >
                    <img src="{{ asset('image/products/'. 'helmet.png')}}" class="card-img-top feature-img" alt="...">
                     <div class="card-body">
                           <h5 class="card-title">Card title</h5>
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                         </div>
                    </div>
                </div>


            </div>
           </div>
        </div>
    </div>
 </div>
    <!-- End sidebar & content-->

    <footer class = "footer-bottom">
        <p class="text-center">
            &copy; 2023 All rights reserved by | Ecommerce site 
        </p>
    </footer>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>