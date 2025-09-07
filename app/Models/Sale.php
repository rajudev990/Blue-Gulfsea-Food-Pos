<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

     public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
