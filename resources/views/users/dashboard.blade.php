@extends('layouts.master')

@section('content')

<div class="container mt-4">
    <h2>Welcome to User Panel</h2>
    <div class="container">
        
        <p>You can change your profile and every information here..</p>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <!-- Add a custom class for styling -->
                <div class="card card-body mt-2 pointer update-profile-btn" onclick="location.href='{{ route('user.profile') }}'">
                    <h3>Update Profile</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add custom CSS to change button color on hover -->
<style>
    .update-profile-btn:hover {
        background-color: #007bff; /* Change to desired hover color */
        color: #fff; /* Change to desired text color */
        cursor: pointer; /* Change cursor to pointer on hover */
    }
</style>



@endsection
