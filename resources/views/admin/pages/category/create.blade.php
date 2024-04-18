@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-header">
        Create Category
    </div>
    @include('admin.partials.messages')
    <div class="card-body">
    <form action = "{{route('admin.category.store')}}" method = "post" enctype = "multipart/form-data">
    @csrf

  <div class="mb-3">
    <label for="name" class="form-label">Category Name</label>
    <input type="text" name = "name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Category Name">
    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <!--<input type="password" class="form-control" id="exampleInputPassword1"> -->
    <textarea name="description" id="" cols="30" rows="10" class = "form-control"></textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Parent Category</label>
    <select class = "form-control" name="parent_id" >
      @foreach($main_categories as $category)
      <option value = "{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>


  <div class="mb-3">
    <label for="image" class="form-label">Category Image</label>
    <input type="file" name = "image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  
  
  <button type="submit" class="btn btn-primary">Add Category</button>
  </form>
    </div>
</div>


@endsection