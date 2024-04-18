@extends('layouts.master')

@section('content')

<!--start sidebar & content-->
<div class='container margin-top-20'>
    <div class="row">
        <div class="col-md-4">

        @include('partials.product_sidebar')

        </div>
        <div class="col-md-8">
           <div class="widget">
            <h3>All Products</h3>
            <div class="row">

          <!--   @foreach($products as $product)
            <div class="col-md-4">
                 <div class="card">

                  @php $i = 1; @endphp
                    @foreach ($product->images as $image)
                    @if ($i > 0)
                    <img src="{{ asset('image/products/'. $image->image)}}" class="card-img-top feature-img" alt="...">
                    @endif
                    @php $i--; @endphp
                    @endforeach

                     <div class="card-body">
                           <h5 class="card-title">
                            {{$product->title}}
                           </h5>
                           <p class="card-text">{{$product->price}} tk</p>
                           <a href="#" class="btn btn-primary">Add to cart</a>
                         </div>
                    </div>
                </div>
            @endforeach -->

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
    </div>
 </div>
    <!-- End sidebar & content-->


@endsection