<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\SubCategory;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductHomeController extends Controller
{

    public function getProductSearch(Request $request){
            // جزئية البحث موجودة في موديل البروداكت بس حبيت اعملها من الكونترولر علي طول
            $getProduct = Product::getProductAjaxFilter();
            //-------------------------------------------------------------------------------------//
            // الجزئية الخاصة بالسيرش علي منتج معين
            if(!empty($request->get('q'))){
                $getProduct = Product::where('title', 'like' ,'%'.$request->get('q').'%')->paginate(10);
            }
            $getColorFilters = Color::where('status',0)->get();
            $geBrandFilters = Brand::where('status',0)->get();
            $page = 0 ;
            // dd($getProduct->nextPageUrl());
            if(!empty($getProduct->nextPageUrl())){
                $parse_url = parse_url($getProduct->nextPageUrl());
                // dd($parse_url); // array
                if (!empty($parse_url['query'])) {
                    // التحويل ل اراي
                    parse_str($parse_url['query'], $get_array);
                    // dd($get_array);// تحويل الكويري ل اراي
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0 ;
                }
            }
            return view('product.list', compact( 'getProduct', 'getColorFilters','geBrandFilters', 'page'));
    }

    public function getCategory($slug , $slugSubCat=''){
        $getProductSingle = Product::where('slug',$slug)->where('status',0)->first();
        $category = Category::where('slug', $slug)->where('status',0)->first();
        $subCategory = SubCategory::where('slug', $slugSubCat)->where('status',0)->first();

        // $getSubCatFilters = SubCategory::where('status',0)->where('category_id',$category->id)->orderBy('name','asc')->get();
        $getColorFilters = Color::where('status',0)->get();
        $geBrandFilters = Brand::where('status',0)->get();

        if(!empty($getProductSingle)){
            $getRelatedProduct = Product::where('id','!=',$getProductSingle->id)->where('sub_category_id',$getProductSingle->sub_category_id)->where('status',0)->limit(10)->get();
            $getProduct = $getProductSingle;
            return view('product.details', compact('category', 'subCategory', 'getProduct',  'getColorFilters','geBrandFilters','getRelatedProduct'));
        }
        elseif($category && $subCategory){
            $getSubCatFilters = SubCategory::where('status',0)->where('category_id',$category->id)->orderBy('name','asc')->get();
            $getProduct = Product::where('category_id',$category->id)->where('sub_category_id',$subCategory->id)->where('status',0)->orderBy('id','desc')->paginate(10);
            $page = 0 ;
            // dd($getProduct->nextPageUrl());
            if(!empty($getProduct->nextPageUrl())){
                $parse_url = parse_url($getProduct->nextPageUrl());
                // dd($parse_url); // array
                if (!empty($parse_url['query'])) {
                    // التحويل ل اراي
                    parse_str($parse_url['query'], $get_array);
                    // dd($get_array);// تحويل الكويري ل اراي
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0 ;
                }
            }
            return view('product.list', compact('category', 'subCategory', 'getProduct', 'getSubCatFilters', 'getColorFilters','geBrandFilters', 'page'));
        }
        elseif(!empty($category)){
            $getSubCatFilters = SubCategory::where('status',0)->where('category_id',$category->id)->orderBy('name','asc')->get();
            $getProduct = Product::where('category_id',$category->id)->where('status',0)->orderBy('id','desc')->paginate(10);
            $page = 0 ;
            // dd($getProduct->nextPageUrl());
            if(!empty($getProduct->nextPageUrl())){
                $parse_url = parse_url($getProduct->nextPageUrl());
                // dd($parse_url); // array
                if (!empty($parse_url['query'])) {
                    // التحويل ل اراي
                    parse_str($parse_url['query'], $get_array);
                    // dd($get_array);// تحويل الكويري ل اراي
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0 ;
                }
            }

            return view('product.list', compact('category', 'getProduct' , 'getSubCatFilters', 'getColorFilters','geBrandFilters' , 'page'));
        }else{
            abort(404);
        }
    }

    public function getFilterProductAjax(Request $request){

        $getProduct = Product::getProductAjaxFilter();
        $page = 0 ;
        // dd($getProduct->nextPageUrl());
        if(!empty($getProduct->nextPageUrl())){
            $parse_url = parse_url($getProduct->nextPageUrl());
            // dd($parse_url); // array
            if (!empty($parse_url['query'])) {
                // التحويل ل اراي
                parse_str($parse_url['query'], $get_array);
                // dd($get_array);// تحويل الكويري ل اراي
                $page = !empty($get_array['page']) ? $get_array['page'] : 0 ;
            }
        }

            return response()->json([
                "status" => true,
                "page" => $page,
                "success" => view("product.filter_list",[
                    "getProduct" =>$getProduct,
                ])->render(),
            ],200);
        // dd($getProduct);
    }

    public function my_wishlist()
    {
        $getProduct = Product::getMyWishlist(Auth::user()->id);
        return view('product.mywishlist',compact('getProduct')) ;
    }
}
