<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
        'user_id',
        'ip_address',
        'name',
        'phone_no',
        'shipping_address',
        'email',
        'message',
        'is_paid',
        'is_completed',
        'is_seen_by_admin'

    ];

    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }

    public function carts()
    {
        return $this->belongsTo(App\Models\Models\Cart::class);
    }

    public function payment()
  {
    return $this->belongsTo(Payment::class);
  }
}
