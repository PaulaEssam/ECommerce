<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
{
    public function list()
    {
        $categories = BlogCategory::all();
        return view('admin.blog-category.list', compact('categories'));
    }
    public function add(){
        return view('admin.blog-category.add');
    }
    public function insert(Request $request)
    {
        $category = new BlogCategory();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');

        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_key = $request->input('meta_key');
        $category->status = $request->input('status');

        $category->save();
        return redirect('admin/blog-category/list')->with('success','Blog Category Added Successfully');

    }

    public function edit($id)
    {
        $category = BlogCategory::find($id);
        return view('admin.blog-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        
        $category = BlogCategory::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status');
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_key = $request->input('meta_key');
        $category->save();
        return redirect('admin/blog-category/list')->with('success','Blog Category Updated Successfully');

    }
    public function delete($id)
    {
        $category = BlogCategory::find($id);
        $category->delete();
        return redirect()->back()->with('success','Blog Category Deleted Successfully');

    }
}
