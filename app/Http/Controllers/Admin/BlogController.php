<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function list()
    {
        $blogs = Blog::all();
        return view('admin.blog.list', compact('blogs'));
    }
    public function add(){
        $categories = BlogCategory::where('status',0)->get();
        return view('admin.blog.add',compact('categories'));
    }
    public function insert(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $slug = Str::slug($request->title);
        $count = Blog::where('slug',$slug)->count();
        if($count > 0){
            $blog->slug = $slug .'-' .$blog->id;
        }
        else{
            $blog->slug = $slug;
        }

        if (!empty($request->file('image_name'))) {
            $file                      = $request->file('image_name');
            $ext                       =  $file->getClientOriginalExtension();
            $filename                  = strtolower( $blog->id . Str::random(20) . '.'. $ext );
            $file->move('uploaded_files/blog',$filename);
            $blog->image_name = $filename;
        }
        $blog->bolg_category_id  = $request->input('bolg_category_id');
        $blog->description = $request->input('description');

        $blog->meta_title = $request->input('meta_title');
        $blog->meta_desc = $request->input('meta_desc');
        $blog->meta_key = $request->input('meta_key');
        $blog->status = $request->input('status');

        $blog->save();
        return redirect('admin/blog/list')->with('success','Blog  Added Successfully');

    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = BlogCategory::where('status',0)->get();
        return view('admin.blog.edit', compact('blog','categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $slug = Str::slug($request->title);
        $count = Blog::where('slug',$slug)->count();
        if($count > 0){
            $blog->slug = $slug .'-' .$blog->id;
        }
        else{
            $blog->slug = $slug;
        }

        if (!empty($request->file('image_name'))) {
            if (!empty($blog->image_name)) {
                unlink('uploaded_files/blog/'.$blog->image_name);
            }
            $file                      = $request->file('image_name');
            $ext                       =  $file->getClientOriginalExtension();
            $filename                  = strtolower( $blog->id . Str::random(20) . '.'. $ext );
            $file->move('uploaded_files/blog',$filename);
            $blog->image_name = $filename;
        }
        $blog->bolg_category_id  = $request->input('bolg_category_id');
        $blog->description = $request->input('description');

        $blog->meta_title = $request->input('meta_title');
        $blog->meta_desc = $request->input('meta_desc');
        $blog->meta_key = $request->input('meta_key');
        $blog->status = $request->input('status');

        $blog->save();
        return redirect('admin/blog/list')->with('success','Blog  Updated Successfully');

    }
    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back()->with('success','Blog  Deleted Successfully');

    }
}
