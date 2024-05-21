<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'category_id',
        'brand_id',
        'discount_id',
        'vendor_id',
        'name',
        'details',
        'attributes',
        'price',
        'quantity',
        'sold_quantity',
        'image',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function comment(){
        return $this->hasMany(ProductComment::class);
    }
}
