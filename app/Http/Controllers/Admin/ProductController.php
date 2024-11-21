<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        return view('admin.product.list', compact('products'));
    }
    public function add(){
        return view('admin.product.add');
    }
    public function insert(Request $request){
        $title = $request->title;
        $product = new Product();
        $product->title = $title;
        $product->created_by  = Auth::user()->id;
        $product->save();
        $slug = Str::slug($title, '-');
        // روح علي موديل البرودكت هتلاقي الميثود
        $checkSlug = Product::checkSlug($slug);
        if (empty($checkSlug)) {
            $product->slug = $slug ;
            $product->save();
        }
        else{
            $new_slug = $slug . '-' .$product->id;
            $product->slug = $new_slug;
            $product->save();
        }
        return redirect('admin/product/edit/'.$product->id);
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $cats = Category::where('status',0)->get();
        $subs = SubCategory::where('status',0)->where('category_id',$product->category_id)->get();
        $brands = Brand::where('status',0)->get();
        $colors = Color::where('status',0)->get();
        return view('admin.product.edit', compact('product', 'cats', 'subs' , 'brands' , 'colors'));

    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'price' => 'required|numeric',
            'old_price' => 'required|numeric',
        ]);

        $product = Product::find($id);
        if (!empty($product)) {

            $product->title             = $request->title;
            $product->sku               = $request->sku;
            $product->category_id       = $request->category_id ;
            $product->sub_category_id   = $request->subcategory_id;
            $product->brand_id          = $request->brand_id ;
            $product->price             = $request->price;
            $product->old_price         = $request->old_price;
            $product->short_desc        = $request->short_desc;
            $product->desc              = $request->desc;
            $product->additional_info   = $request->additional_info;
            $product->shipping_returns  = $request->shipping_returns;
            $product->status            = $request->status;
            $product->created_by        = Auth::user()->id;
            $product->save();

            ProductColor::where('product_id',$id)->delete();
            if (!empty($request->color_id)) {
                foreach ($request->color_id as $color_id) {
                    $color = new ProductColor();
                    $color->product_id = $id;
                    $color->color_id = $color_id;
                    $color->save();
                }
            }
            ProductSize::where('product_id',$id)->delete();
            if (!empty($request->size)) {
                foreach ($request->size as $size) {
                    if (!empty($size['name'])) {
                        $saveSize = new ProductSize();
                        $saveSize->name = $size['name'];
                        $saveSize->price = !empty($size['price']) ? $size['price'] : 0;
                        $saveSize->product_id = $id;
                        $saveSize->save();
                    }
                }
            }

            if (!empty($request->file('image'))) {
                foreach($request->file('image') as $image){
                    if ($image->isValid()) {
                        $ext =  $image->getClientOriginalExtension();
                        $filename = strtolower( $product->id . Str::random(20) . '.'. $ext );
                        $image->move('uploaded_files/products',$filename);

                        $image_upload = new ProductImage();
                        $image_upload->product_id = $id;
                        $image_upload->image_name = $filename;
                        $image_upload->image_ext = $ext ;
                        $image_upload->save();
                    }
                }
            }


            return redirect()->back()->with('success','Product Updated Successfully');
        }
    }

    public function deleteImage($id){
        $image = ProductImage::find($id);
        if (!empty($image->image_name)) {
                unlink('uploaded_files/products/'.$image->image_name);
            }
            $image->delete();
            return redirect()->back()->with('success','Image Deleted Successfully');
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Product Deleted Successfully');
    }
}
