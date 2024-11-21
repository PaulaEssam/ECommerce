<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class Product extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    // relation between product and sub category
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id');
    }
    // relation between product and category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // relation between product and brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function getSingleImage($product_id)
    {
        return ProductImage::where('product_id',$product_id)->first();
    }

    static public function checkSlug($slug)
    {
        return self::where('slug',$slug)->count();
    }

    public function getColor()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }
    public function getSize()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }
    public function getImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    static public function getMyWishlist($user_id)
    {
        $return = Product::select('products.*','users.name as created_by_name','categories.name as category_name',
                            'categories.slug as category_slug', 'sub_categories.name as sub_category_name',
                            'sub_categories.slug as sub_category_slug' )
                            ->join('users','users.id','=','products.created_by')
                            ->join('categories','categories.id', '=', 'products.category_id')
                            ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
                            ->join('product_wishlists','product_wishlists.product_id','=','products.id')
                            ->where('product_wishlists.user_id','=',$user_id)
                            ->where('products.status','=',0)
                            ->groupBy('products.id')
                            ->orderBy('products.id','desc')
                            ->paginate(30);
        return $return;
    }

    static public function getRecentArrival()
    {
        $return = Product::select('products.*','users.name as created_by_name','categories.name
        as category_name','categories.slug as category_slug','sub_categories.name
        as sub_category_name','sub_categories.slug as sub_category_slug')
        ->join('users','users.id','=','products.created_by')
        ->join('categories','categories.id', '=', 'products.category_id')
        ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->where('products.status','=',0);
        if(Request::get('cat_id')){
            $return = $return->where('products.category_id','=',Request::get('cat_id'));
        }
        $return= $return->groupBy('products.id')
        ->orderBy('products.id','desc')
        ->limit(8)
        ->get();
        return $return;
    }

    static public function getTrendyProducts()
    {
        $return = Product::select('products.*','users.name as created_by_name','categories.name
        as category_name','categories.slug as category_slug','sub_categories.name
        as sub_category_name','sub_categories.slug as sub_category_slug')
        ->join('users','users.id','=','products.created_by')
        ->join('categories','categories.id', '=', 'products.category_id')
        ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->where('products.status','=',0)
        ->groupBy('products.id')
        ->orderBy('products.id','desc')
        ->limit(20)
        ->get();
        return $return;
    }

    static public function getProductAjaxFilter()
    {
        $return = Product::select('products.*', 'users.name as created_by_name',
                            'categories.name as category_name' , 'categories.slug as category_slug',
                            'sub_categories.name as sub_category_name','sub_categories.slug as sub_category_slug')
                    ->join('users','users.id', '=' , 'products.created_by')
                    ->join('categories','categories.id', '=', 'products.category_id')
                    ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id');

                    if(!empty(Request::get('subCategory_id'))){
                        $subCatId = rtrim( Request::get('subCategory_id'), ',');
                        $subCatId_array = explode(',', $subCatId);
                        $return = $return->whereIn('products.sub_category_id', $subCatId_array);
                        // dd($subCatId);
                    }
                    else{
                        if(!empty(Request::get('old_category_id')))
                        {
                            $return = $return->where('products.category_id', Request::get('old_category_id'));
                        }

                        if(!empty(Request::get('old_subCategory_id')))
                        {
                            $return = $return->where('products.sub_category_id', Request::get('old_subCategory_id'));
                        }

                    }
                    if (!empty(Request::get('color_id'))){
                            $color_id = rtrim( Request::get('color_id'), ',');
                            $color_id_array = explode(',', $color_id);
                            $return = $return->join('product_colors','product_colors.product_id','=','products.id');
                            $return = $return->whereIn('product_colors.color_id', $color_id_array);
                        }

                    if(!empty(Request::get('brand_id'))){
                        $brand_id = rtrim( Request::get('brand_id'), ',');
                        $brand_id_array = explode(',', $brand_id);
                        $return = $return->whereIn('products.brand_id', $brand_id_array);
                    }

                    if(!empty(Request::get('start_price')) && !empty(Request::get('end_price'))){
                        $start_price = str_replace('$','',Request::get('start_price'));
                        $end_price = str_replace('$','',Request::get('end_price'));
                        $return = $return->where('products.price', '>=' , $start_price);
                        $return = $return->where('products.price', '<=' , $end_price);
                    }
                    /**
                     *  جزئية البحث
                     * Request::get('q') = الحاجة اللي بابحث عنها ,,, يعني الكلام اللي باكتبه في حانة البحث
                     */
                    if(!empty(Request::get('q'))){
                        $return = $return->where('products.title', 'like' ,'%'.Request::get('q').'%');
                    }
                    $return = $return->where('products.status','=',0)
                    ->groupBy('products.id')
                    ->orderBy('products.id','desc')
                    ->paginate(10);
        return $return ;
    }
}
