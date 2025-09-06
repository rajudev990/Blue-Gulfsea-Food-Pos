<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Product extends Model
{
    protected $guarded = [];
    
    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
