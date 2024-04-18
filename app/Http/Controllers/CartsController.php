<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Cart;
use App\Models\Models\Order;

use Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.products.carts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
        ],
        [
            'product_id.required' => 'Please give a product'
        ]);

        if (Auth::check()){
            $cart = Cart::Where('user_id', Auth::id())
                      ->where('product_id', $request->product_id)
                      ->first();
        }
        else
        {
            $cart = Cart::Where('ip_address', request()->ip())
                      ->where('product_id', $request->product_id)
                      ->first();
        }
        if(!is_null($cart)){
            $cart->increment('product_quantity');
            }
        else{
            $cart = new Cart();

        if(Auth::check()) {
         $cart->user_id = Auth::id();
        }
        
        $cart->ip_address = request()->ip();
        $cart->product_id = $request->product_id;
        $cart->save();

                      }

        session()->flash('success', 'Product has added to cart successfully!!');
        return back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart))
        {
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        }
        else{
            return redirect()->route('carts');
        }
        session()->flash('success', 'Cart item updated successfully!!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart))
        {
            $cart->delete();
        }
        else{
            return redirect()->route('carts');
        }
        session()->flash('success', 'Cart item deleted successfully!!');
        return back();
    }
}
