@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-header">
        Manage brand
    </div>
    @include('admin.partials.messages')
    <div class="card-body">
    <table class = "table table-hover table-striped">
      <tr>
      <th>#</th>
      <th>brand Name</th>
      <th>brand Image</th>
      <th>Item Quantity</th>
      <th>Action</th>
      </tr>
      
      @foreach ($brands as $brand)
      <tr>
        <td>#</td>
        <td>{{ $brand->name }}</td>
        <td>
          <img src="{!! asset('image/brands$brands/'.$brand->image) !!}" alt="#" width = "100" >
        </td>
        
        <td>{{ $brand->quantity }}</td>
        <td><a href="{{ route('admin.brand.update', $brand->id) }}" class = "btn btn-success">Edit</a></td>
      </tr>
      @endforeach
    </table>
    </div>
</div>


@endsection