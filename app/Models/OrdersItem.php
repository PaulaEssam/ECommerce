<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersItem extends Model
{
    use HasFactory;
    public function getProduct(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function getSingleImage($product_id) {
        return ProductImage::where('product_id',$product_id)->first();
    }
}
