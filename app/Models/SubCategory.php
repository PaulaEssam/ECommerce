<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function totalProduct(){
        return $this->hasMany(Product::class,'sub_category_id')->where('status',0)->count();
    }
}
