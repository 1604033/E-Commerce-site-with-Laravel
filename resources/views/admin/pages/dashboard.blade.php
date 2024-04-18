@extends('layouts.master')

@section('content')

<div class="container mt-4">
    <h2>Welcome to Admin Panel</h2>

    <div class="row mt-4">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
                <div class="list-group-item list-group-item-action" id="manage-products">
                    <a href="#" data-toggle="dropdown">Manage Products <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-menu">
                        <a href="{{ route('admin.product.create') }}" class="dropdown-item">Add Product</a>
                        <a href="{{ route('admin.products', ['id' => 1]) }}" class="dropdown-item">Edit Product</a>
                        <!-- Add more product-related submenu items as needed -->
                    </div>
                </div>
                <div class="list-group-item list-group-item-action" id="manage-categories">
                    <a href="#" data-toggle="dropdown">Manage Categories <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-menu">
                        <a href="{{ route('admin.category.create') }}" class="dropdown-item">Add Category</a>
                        <a href="{{ route('admin.categories', ['id' => 1]) }}" class="dropdown-item">Edit Category</a>
                        <!-- Add more product-related submenu items as needed -->
                    </div>
                </div>
                <a href="{{ route('admin.categories') }}" class="list-group-item list-group-item-action">Manage Categories</a>
                <!-- Add more menu items as needed -->
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Content for the Dashboard -->
            @yield('admin-content')
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Font Awesome for the dropdown icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<!-- Enable automatic dropdown on hover -->
<script>
    $(document).ready(function () {
        $('#manage-products').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(250).slideDown();
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).slideUp();
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#manage-categories').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(250).slideDown();
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).slideUp();
        });
    });
</script>

@endsection
