@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-header">
        Manage Category
    </div>
    @include('admin.partials.messages')
    <div class="card-body">
    <table class = "table table-hover table-striped">
      <tr>
      <th>#</th>
      <th>Category Name</th>
      <th>Category Image</th>
      <th>Parent Category</th>
      <th>Item Quantity</th>
      <th>Action</th>
      </tr>
      
      @foreach ($categories as $category)
      <tr>
        <td>#</td>
        <td>{{ $category->name }}</td>
        <td>
          <img src="{!! asset('image/categories/'.$category->image) !!}" alt="#" width = "100" >
        </td>
        <td>
          @if ($category->parent_id == NULL)
          Primary Category
          @else
          {{ $category->parent->name }}
          @endif
        </td>
        <td>{{ $category->quantity }}</td>
        <td><a href="{{ route('admin.category.update', $category->id) }}" class = "btn btn-success">Edit</a></td>
      </tr>
      @endforeach
    </table>
    </div>
</div>


@endsection