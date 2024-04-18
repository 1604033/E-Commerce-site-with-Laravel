<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'ip_address',
        'product_id',
        'product_quantity',
        'order_id'
    ];

    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }

    public function order()
    {
        return $this->belongsTo(App\Models\Models\Order::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\product::class);
    }

    public static function totalCarts()
    {
        if (Auth::check()) {
            return self::orWhere('user_id', Auth::id())
                ->orWhere('ip_address', request()->ip())
                ->get();
        } else {
            return self::orWhere('ip_address', request()->ip())->get();
        }
    }

    public static function totalItems()
    {
        if (Auth::check()) {
            $carts = self::orWhere('user_id', Auth::id())
                ->orWhere('ip_address', request()->ip())
                ->get();
        } else {
            $carts = self::orWhere('ip_address', request()->ip())->get();
        }
        
        $total_items = 0;

        foreach ($carts as $cart) {
            $total_items += $cart->product_quantity;
        }

        return $total_items;
    }

    public static function clearCart()
    {
        if (Auth::check()) {
            // If the user is authenticated, clear the user's cart
            self::where('user_id', Auth::id())->delete();
        } else {
            // If not authenticated, clear the cart based on IP address
            self::where('ip_address', request()->ip())->delete();
        }
    }
}
