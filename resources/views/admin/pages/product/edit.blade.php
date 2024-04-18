@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-header">
        Edit Product
    </div>
    @include('admin.partials.messages')
    <div class="card-body">
    <form action = "{{ route('admin.product.update', $product->id) }}" method = "post" enctype = "multipart/form-data">
        {{csrf_field()}}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" name = "title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->title }}">
    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <!--<input type="password" class="form-control" id="exampleInputPassword1"> -->
    <textarea name="description" id="" cols="30" rows="10" class = "form-control">{{ $product->description }}</textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="number" name = "price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->price }}">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="number" name = "quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->quantity }}">
  </div>

  <div class="mb-3">
    <label for="product_image" class="form-label">Product Image</label>
    <input type="file" name = "product_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>

  
  
  <button type="submit" class="btn btn-primary">Update Product</button>
  </form>
    </div>
</div>


@endsection