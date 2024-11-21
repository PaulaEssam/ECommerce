<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Blog extends Model
{
    use HasFactory;
    public function getCategory()
    {
        return $this->belongsTo(BlogCategory::class,'bolg_category_id');
    }
    public function getComments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id')
                            ->select('blog_comments.*')
                            ->join('users','users.id','=','blog_comments.user_id')
                            ->orderBy('blog_comments.id','desc');
    }
    public function getCommentCount()
    {
        return $this->hasMany(BlogComment::class, 'blog_id')
                            ->select('blog_comments.id')
                            ->join('users','users.id','=','blog_comments.user_id')
                            ->count();
    }
    static public function getBlog($blog_category_id = '')
    {
        $return = self::select('blogs.*');
        if(!empty(Request::get('search')))
        {
            $return = $return->where('blogs.title','like','%'.Request::get('search').'%');
        }
        if($blog_category_id != '')
        {
            $return = $return->where('blogs.bolg_category_id',$blog_category_id);
        }
        $return = $return->orderBy('blogs.id','desc')->where('status',0)->paginate(20);
        return $return ;
    }
}
