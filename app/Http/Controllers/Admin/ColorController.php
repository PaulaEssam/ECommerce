<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function list()
    {
        $colors = Color::all();
        return view('admin.color.list',compact('colors'));
    }
    public function add(){
        return view('admin.color.add');
    }
    public function insert(Request $request)
    {
        $color = new Color();
        $color->name = $request->input('name');
        $color->code = $request->input('code');
        $color->status = $request->input('status');
        $color->created_by = Auth::user()->id;

        $color->save();
        return redirect('admin/color/list')->with('success','Color Added Successfully');

    }
    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.color.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $color = Color::find($id);
        $color->name = $request->input('name');
        $color->code = $request->input('code');
        $color->status = $request->input('status');
        $color->save();
        return redirect('admin/color/list')->with('success','Color Updated Successfully');

    }
    public function delete($id)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect()->back()->with('success','Color Deleted Successfully');

    }
}
