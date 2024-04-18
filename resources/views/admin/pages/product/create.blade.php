@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-header">
        Add Product
    </div>
    @include('admin.partials.messages')
    <div class="card-body">
    <form action = "{{route('admin.product.store')}}" method = "post" enctype = "multipart/form-data">
        {{csrf_field()}}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" name = "title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <!--<input type="password" class="form-control" id="exampleInputPassword1"> -->
    <textarea name="description" id="" cols="30" rows="10" class = "form-control"></textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="number" name = "price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="number" name = "quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Select Category</label>
    <select class = "form-control" name="category_id" >
      @foreach($main_categories as $category)
      <option value = "{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Select Brand</label>
    <select class = "form-control" name="brand_id" >
      <option value="">Please select a brand</option>
      @foreach(App\Models\Brand::orderBy('name','asc')->get() as $brand)
      <option value = "{{ $brand->id }}">{{ $brand->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="product_image" class="form-label">Product Image</label>
    <input type="file" name = "product_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  
  
  <button type="submit" class="btn btn-primary">Add Product</button>
  </form>
    </div>
</div>


@endsection