<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::all();
        return view('admin.brand.list',compact('brands'));
    }
    public function add(){
        return view('admin.brand.add');
    }
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands',
            'status' => 'required',
            'meta_title' =>'required',
        ]);
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        $brand->meta_title = $request->input('meta_title');
        $brand->meta_desc = $request->input('meta_desc');
        $brand->meta_key = $request->input('meta_key');
        $brand->status = $request->input('status');
        $brand->created_by = Auth::user()->id;

        $brand->save();
        return redirect('admin/brand/list')->with('success','Brand Added Successfully');

    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,'.$id,
        ]);
        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        $brand->status = $request->input('status');
        $brand->meta_title = $request->input('meta_title');
        $brand->meta_desc = $request->input('meta_desc');
        $brand->meta_key = $request->input('meta_key');
        $brand->save();
        return redirect('admin/brand/list')->with('success','Brand Updated Successfully');

    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('success','Brand Deleted Successfully');

    }
}
