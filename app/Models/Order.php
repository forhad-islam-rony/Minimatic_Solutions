<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table= 'ordert';
    protected $fillable=[
        'user_id',
        'vendor_id',
        'order_items_id',
        'product_id',
        'quantity',
        'address',
        'status',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getProduct()
    {
        return Product::findOrFail($this->product_id);
    }

    public function orderId()
    {
        return $this->hasMany(OrderItems::class);
    }

}
