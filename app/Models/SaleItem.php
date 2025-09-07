<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $guarded = [];

    public function sale(){
        return $this->belongsTo(SaleItem::class,'sale_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
