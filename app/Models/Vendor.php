<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Vendor extends Model
{
    use HasFactory;
    protected $table= 'vendor';

    protected $fillable= [
        'name',
        'mobile',
        'email',
        'password',
        'image',
        'shop_name',
        'shop_address',
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function rate(){
        return $this->hasMany(VendorRate::class);
    }

    public function ratingAvg()
    {
        $review = $this->rate->count();
        if($review>0){
            return array_sum(Arr::pluck($this->rate,'rate'))/$review;
        } else{
            return 0;
        }
    }
}
