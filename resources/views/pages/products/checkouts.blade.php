@extends('layouts.master')

@section('content')

<!--start content-->
<div class = 'container margin-top-20'>
    <div class="card card-body">
    <h2>
        Confirm Items
    </h2>
    <hr>
   <div class="row">
    <div class="col-md-7">
    @php 
        $total_price = 0;
    @endphp
    @foreach (App\Models\Models\Cart::totalCarts() as $cart)
    <p>
        {{ $cart->product->title }} 
        - <strong>{{ $cart->product->price }} taka</strong> 
        - {{ $cart->product_quantity }} item
    </p>
    @endforeach
    </div>
    <div class="col-md-5">
    @foreach (App\Models\Models\Cart::totalCarts() as $cart)
    @php 
     $total_price += $cart->product->price * $cart->product_quantity;
    @endphp
    @endforeach
    <p>Total Price : <strong>{{ $total_price }}</strong> Taka </p>
    <p>Total Price with shipping cost : <strong>{{ $total_price + 100 }}</strong> Taka </p>
    </div>
   </div>
    <p>
        <a href="{{ route('carts') }}">Change Cart Items</a>
    </p>
    </div>

    <div class="card card-body">
    <h2>
        Shipping Address 
    </h2>
    <hr>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer Information</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('checkouts.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="mail" class="form-label">E-mail Address</label>
                                <input type="mail" class="form-control" id="mail" name="mail" value="{{ old('mail') }}">
                            </div>

                            <div class="mb-3">
                                <label for="phone_no" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no') }}">
                            </div>

                            <div class="mb-3">
                                <label for="shipping_address" class="form-label">Shipping Address</label>
                                <textarea class="form-control" id="shipping_address" name="shipping_address">{{ old('shipping_address') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Additional message (Optional)</label>
                                <textarea class="form-control" id="message" name="message">{{ old('message') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="shipping_cost" class="form-label">Shipping Cost</label>
                                <input type="number" class="form-control" id="shipping_cost" name="shipping_cost" value="{{ old('shipping_cost', 100) }}">
                            </div>
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Select a payment method</label>
                                <select name="payment_method_id" id="payments" class="form-control">
                                <option value="" class="value">Select a payment method please</option>
                                  @foreach ($payments as $payment)
                                  <option value="{{ $payment->short_name }}" class="value">{{ $payment->name }}</option>
                                  @endforeach
                              </select>

                             @foreach ($payments as $payment)
                             
                                @if($payment->short_name == "cash_in")
                                <div id="payment_{{ $payment->short_name }}" class = "hidden">
                                    <h3>
                                        plz continue 
                                        <br>
                                        <small>
                                            You will get your product very soon 
                                        </small>
                                    </h3>
                                </div>
                                @else
                                <div id="payment_{{ $payment->short_name }}" class = "hidden">
                                    <h3> {{ $payment->name }} Payment </h3>
                                    <p>
                                        <strong>{{ $payment->name }} No: {{ $payment->no }}</strong>
                                        <br>
                                        <strong>Account Type: {{ $payment->type }}</strong>
                                    </p>
                                    <div class="alert alert-success">
                                        Plz send this money to this number 
                                    </div>
                                    <label for="email" class="form-label">Plz provide the transaction ID</label>
                                   
                                </div>
                                
                                @endif
                             
                             @endforeach
                             <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">

                            </div>

                            <button type="submit" class="btn btn-primary">Order Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <hr>
    
    </div>
    

</div>
    <!-- End content-->


@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $("#payments").change(function(){
         var $payment_method = $("#payments").val();
         if($payment_method == "cash_in"){
            $("#payment_cash_in").removeClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#payment_rocket").addClass('hidden');
         } else if($payment_method == "bkash"){
            $("#payment_bkash").removeClass('hidden');
            $("#payment_cash_in").addClass('hidden');
            $("#payment_rocket").addClass('hidden');
            $("#transaction_id").removeClass('hidden');
         } else if($payment_method == "rocket"){
            $("#payment_rocket").removeClass('hidden');
            $("#payment_cash_in").addClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#transaction_id").removeClass('hidden');
         }
      });
   
   /*$(document).ready(function(){
      $("#payments").change(function(){
         var payment_method = $(this).val();
         $(".payment-method").addClass('hidden');
         $("#payment_" + payment_method).removeClass('hidden');
         if (payment_method !== "cash_in") {
            $("#transaction_id").removeClass('hidden');
         } else {
            $("#transaction_id").addClass('hidden');
         }
      });*/

      // Handle form submission
      $("form").submit(function(event) {
         event.preventDefault(); // Prevent default form submission
         var formData = $(this).serialize(); // Serialize form data

         // Send AJAX request to submit form data
         $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            success: function(response) {
               // Handle success response (if needed)
               // For example, show a success message or redirect to a new page
               alert('Your order has been successfully placed!');
               window.location.href = "{{ route('homepage') }}";
            },
            error: function(xhr, status, error) {
               // Handle error response
               console.error(xhr.responseText); // Log detailed error response
               alert('An error occurred while placing the order. Please check the console for more information.');
            }
         });
      });
   });
</script>
@endsection