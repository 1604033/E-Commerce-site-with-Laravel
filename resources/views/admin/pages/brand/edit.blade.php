@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-header">
        Edit brand
    </div>
    @include('admin.partials.messages')
    <div class="card-body">
    <form action = "{{ route('admin.brand.update', $brand->id) }}" method = "post" enctype = "multipart/form-data">
        {{csrf_field()}}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">brand Name</label>
    <input type="text" name = "title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->name }}">
    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <!--<input type="password" class="form-control" id="exampleInputPassword1"> -->
    <textarea name="description" id="" cols="30" rows="10" class = "form-control">{{ $brand->description }}</textarea>
  </div>


  <!--
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="number" name = "quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->quantity }}">
  </div>
-->

  <div class="mb-3">
    <label for="old_image" class="form-label">brand Old Image</label><br>
    <img src="{!! asset('image/categories/'.$brand->image) !!}" alt="#" width = "100"><br>

    <label for="image" class="form-label">brand New Image</label>
    <input type="file" name = "image" class="form-control" id="image" aria-describedby="emailHelp" >
  </div>

  
  
  <button type="submit" class="btn btn-success">Update brand</button>
  </form>
    </div>
</div>


@endsection