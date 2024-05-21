<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $table='Order_items';
    protected  $fillable = [
        'user_id',
        'product_ids',
        'vendor_ids',
        'quantity',
        'total'
    ];

    public function order()
    {
        return $this->belongsto(Order::class);
    }
    
    public function user()
    {
        return $this->belongsto(User::class);
    }
}
