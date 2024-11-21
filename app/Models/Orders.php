<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrdersItem::class,'order_id');
    }

    public function getShippingName()
    {
        return $this->belongsTo(ShippingCharge::class,'shipping_id');
    }
}
