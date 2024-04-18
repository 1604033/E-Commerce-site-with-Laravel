<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Models\Order;
use App\Models\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('pages.products.checkouts', compact('payments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'phone_no'  => 'required',
            'shipping_address'  => 'required',
            'payment_method_id'  => 'required'
        ]);

        $order = new Order();

        // Check if transaction ID is required for non-cash payment methods
        if ($request->payment_method_id !== 'cash_in' && (empty($request->transaction_id) || is_null($request->transaction_id))) {
            throw ValidationException::withMessages(['transaction_id' => 'Please provide a transaction ID for your payment']);
        }

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone_no = $request->phone_no;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->ip_address = $request->ip();

        // Associate order with authenticated user if available
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }

        // Find payment ID by short name
        $payment = Payment::where('short_name', $request->payment_method_id)->firstOrFail();
        $order->payment_id = $payment->id;
        $order->transaction_id = $request->transaction_id;

        $order->save();

        // Associate carts with the order
        Cart::clearCart();

        return view('users.popup_confirmation');

        session()->flash('success', 'Your order has been successfully placed! Please wait for confirmation from the admin.');
        return redirect()->route('homepage');
    }
}
