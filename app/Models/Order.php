<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'shipping_address_id'
    ];

    public function orderItem ()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function shippingAddress ()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function payment ()
    {
        return $this->hasOne(Payment::class);
    }

}
