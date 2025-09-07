<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
