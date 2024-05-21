<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorRate extends Model
{
    use HasFactory;

    protected $table ='vendor_rate';

    protected $fillable= [
        'user_id',
        'vendor_id',
        'rate'
    ];

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
