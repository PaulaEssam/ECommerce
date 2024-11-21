<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function getSubCategory(){
        return $this->hasMany(SubCategory::class,'category_id')->where('status',0);
    }
}
