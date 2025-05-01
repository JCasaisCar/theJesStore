<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\ShippingAddress;
use App\Models\ShippingMethod;

class Order extends Model
{
    protected $fillable = ['user_id', 'shipping_address_id', 'total', 'subtotal', 'iva', 'status', 'payment_method'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function details()
{
    return $this->hasMany(OrderDetail::class);
}

public function shippingMethod()
{
    return $this->belongsTo(ShippingMethod::class);
}
}
