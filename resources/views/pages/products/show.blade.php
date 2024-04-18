@extends('layouts.master')

@section('content')

<!-- Start content -->
<div class='container margin-top-20'>
    <div class="row">
        <div class="col-md-4">
            @foreach ($product->images as $image)
                <img class="d-block mb-3" src="{{ asset('image/products/'.$image->image)}}" class="card-img-top feature-img" alt="..." width="500">
            @endforeach
        </div>
        <div class="col-md-8">
            <div class="widget" style="margin-left: 300px;"> <!-- Adjust the margin-left value as needed -->
                <h3> {{$product->title}} in <mark> {{ $product->category->name }} category </mark></h3>
                <h3> Price: {{$product->price}} tk </h3>
                <h3>In stock: {{$product->quantity}} </h3>

                <div>
                    <span>
                        Category: {{ $product->category->name }}
                    </span> <br>
                    <span>
                        Brand: {{ $product->brand->name }}
                    </span>
                </div>

                <div class="product-description">
                    {!! $product->description !!}
                </div>
                @include('pages.products.cart-button')
            </div>
        </div>
    </div>
</div>
<!-- End content -->

@endsection
