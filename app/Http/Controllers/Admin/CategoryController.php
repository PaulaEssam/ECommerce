<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }
    public function add(){
        return view('admin.category.add');
    }
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'status' => 'required',
            'meta_title' =>'required',
        ]);
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        if (!empty($request->file('image_name'))) {
            $file                      = $request->file('image_name');
            $ext                       =  $file->getClientOriginalExtension();
            $filename                  = strtolower( $category->id . Str::random(20) . '.'. $ext );
            $file->move('uploaded_files/category',$filename);
            $category->image_name = $filename;
        }
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_key = $request->input('meta_key');
        $category->status = $request->input('status');
        $category->created_by = Auth::user()->id;

        $category->save();
        return redirect('admin/category/list')->with('success','Category Added Successfully');

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
        ]);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        if (!empty($request->file('image_name'))) {
            $file                      = $request->file('image_name');
            $ext                       =  $file->getClientOriginalExtension();
            $filename                  = strtolower( $category->id . Str::random(20) . '.'. $ext );
            $file->move('uploaded_files/category',$filename);
            $category->image_name = $filename;
        }
        $category->status = $request->input('status');
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_key = $request->input('meta_key');
        $category->save();
        return redirect('admin/category/list')->with('success','Category Updated Successfully');

    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');

    }
}
