<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SubCategoryController extends Controller
{
    public function list()
    {
        $subCats = SubCategory::paginate(3);
        return view('admin.subcategory.list', compact('subCats'));
    }
    public function add(){
        $categories = Category::all();
        return view('admin.subcategory.add' , compact('categories'));
    }
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name'        => 'required',
            'slug'        => 'required|unique:sub_categories',
            'status'      => 'required',
            'meta_title'  =>'required',
        ]);
        $Subcategory = new SubCategory();
        $Subcategory->category_id = $request->input('category_id');
        $Subcategory->name = $request->input('name');
        $Subcategory->slug = $request->input('slug');
        $Subcategory->meta_title = $request->input('meta_title');
        $Subcategory->meta_desc = $request->input('meta_desc');
        $Subcategory->meta_key = $request->input('meta_key');
        $Subcategory->status = $request->input('status');
        $Subcategory->created_by = Auth::user()->id;

        $Subcategory->save();
        return redirect('admin/subCategory/list')->with('success','Sub Category Added Successfully');

    }

    public function edit($id)
    {
        $subCat = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subCat', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug,'.$id,
        ]);
        $Subcategory = SubCategory::find($id);
        $Subcategory->category_id = $request->input('category_id');
        $Subcategory->name = $request->input('name');
        $Subcategory->slug = $request->input('slug');
        $Subcategory->status = $request->input('status');
        $Subcategory->meta_title = $request->input('meta_title');
        $Subcategory->meta_desc = $request->input('meta_desc');
        $Subcategory->meta_key = $request->input('meta_key');
        $Subcategory->save();
        return redirect('admin/subCategory/list')->with('success','Sub Category Updated Successfully');

    }
    public function delete($id)
    {
        $Subcategory = SubCategory::find($id);
        $Subcategory->delete();
        return redirect()->back()->with('success','Sub Category Deleted Successfully');

    }

    public function get_sub_category(Request $request){
        $category_id = $request->cat_id;
        $sub_categories = SubCategory::where('category_id',$category_id)->where('status',0)->get();
        $html='';
        $html .= '<option value="">Select Sub Category...</option>';
        foreach ($sub_categories as $sub_category) {
            $html.='<option value="'.$sub_category->id.'">'.$sub_category->name.'</option>';
        }
        $json['html'] = $html ;
        echo json_encode($json);
        // return response()->json($sub_categories);
    }
}
