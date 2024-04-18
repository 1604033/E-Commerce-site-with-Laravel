@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-header">
        Edit Category
    </div>
    @include('admin.partials.messages')
    <div class="card-body">
    <form action = "{{ route('admin.category.update', $category->id) }}" method = "post" enctype = "multipart/form-data">
        {{csrf_field()}}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Name</label>
    <input type="text" name = "title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->name }}">
    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <!--<input type="password" class="form-control" id="exampleInputPassword1"> -->
    <textarea name="description" id="" cols="30" rows="10" class = "form-control">{{ $category->description }}</textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Parent Category(Optional)</label>
    <select name="form-control" id="parent_id">
      <option value="">Please select a primary category </option>
    @foreach($main_categories as $cat)
    <option value="{{ $cat->id }}" {{ $cat->id == $category->id ? 'selected' : '' }}>{{ $cat->name }}</option>
    @endforeach
    </select>
  </div>

  <!--
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="number" name = "quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->quantity }}">
  </div>
-->

  <div class="mb-3">
    <label for="old_image" class="form-label">Category Old Image</label><br>
    <img src="{!! asset('image/categories/'.$category->image) !!}" alt="#" width = "100"><br>

    <label for="image" class="form-label">Category New Image</label>
    <input type="file" name = "image" class="form-control" id="image" aria-describedby="emailHelp" >
  </div>

  
  
  <button type="submit" class="btn btn-success">Update Category</button>
  </form>
    </div>
</div>


@endsection