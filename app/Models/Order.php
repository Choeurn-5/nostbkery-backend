<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_phone',
        'customer_email',
        'delivery_type',
        'delivery_address',
        'delivery_time',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
        'special_instructions',
    ];

    protected $casts = [
        'total_amount' => 'float',
        'delivery_time' => 'datetime',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}