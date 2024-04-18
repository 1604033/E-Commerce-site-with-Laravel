@extends('layouts.master')

@section('content')

<!-- Image slider (Bootstrap Carousel) start -->
<div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('image/'. 'top-1.jpg') }}" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('image/'. 'top-2.jpg') }}" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('image/'. 'top-3.jpg') }}" class="d-block w-100" alt="Slide 2">
        </div>
        <!-- Add more slides as needed -->
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- Image slider end -->

<!-- Start sidebar & content -->
<div class='container margin-top-20'>
    <div class="row">
        <!-- Start left side (sidebar with images) -->
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    All Categories
                </a>
                @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                    <a href="{!! route('categories.show', $parent->id) !!}" class="list-group-item list-group-item-action">
                        <img src="{{ asset('image/categories/'. $parent->image)}}" alt="" width="50">{{ $parent->name}}
                    </a>
                @endforeach
                <a href="#" class="list-group-item list-group-item-action">Upcoming Items</a>
                <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled item</a>
            </div>
            
            <!-- Add your images here -->
            <div class="mt-4">
                <img src="{{ asset('image/'. 'top-5.jpg')}}" alt="Image 1" class="img-fluid mb-2">
                <img src="{{ asset('image/'. 'top-7.jpg')}}" alt="Image 2" class="img-fluid">
            </div>
        </div>
        <!-- End left side -->

        <!-- Start right side (products) -->
        <div class="col-md-8">
            <div class="widget">
                <h3>Featured Products</h3>
                <div class="row">
                    <!-- Products loop -->
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card">
                                @php $i = 1; @endphp
                                @foreach ($product->images as $image)
                                    @if ($i > 0)
                                        <a href="{!! route('product.show', $product->slug) !!}">
                                            <img src="{{ asset('image/products/'. $image->image)}}" class="card-img-top feature-img" alt="{{$product->title}}">
                                        </a>
                                    @endif
                                    @php $i--; @endphp
                                @endforeach
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{!! route('product.show', $product->slug) !!}">{{$product->title}}</a>
                                    </h5>
                                    <p class="card-text">{{$product->price}} tk</p>
                                    @include('pages.products.cart-button')
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End products loop -->




                </div>
            </div>
        </div>
        <!-- End right side -->
    </div>
</div>
<!-- End sidebar & content -->

@endsection
