<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    public function getCountBlog()
    {
        return $this->hasMany(Blog::class, 'bolg_category_id')->where('status',0)->count();
    }
}
