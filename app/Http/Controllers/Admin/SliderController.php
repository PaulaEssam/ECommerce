<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function list()
    {
        $Slider = slider::all();
        return view('admin.Slider.list',compact('Slider'));
    }
    public function add(){
        return view('admin.Slider.add');
    }
    public function insert(Request $request)
    {
        $Slider = new slider();
        $Slider->title             = $request->title;
        $Slider->button_name       = $request->btn_name;
        $Slider->button_link       = $request->btn_link;
        $file                      = $request->file('image');
        $ext                       =  $file->getClientOriginalExtension();
        $filename                  = strtolower( $Slider->id . Str::random(20) . '.'. $ext );
        $file->move('uploaded_files/slider',$filename);
        $Slider->image_name = $filename;
        $Slider->save();

        return redirect('admin/slider/list')->with('success','Slider Added Successfully');

    }
    public function edit($id)
    {
        $Slider = slider::find($id);
        return view('admin.Slider.edit', compact('Slider'));
    }

    public function update(Request $request, $id)
    {
        $Slider = slider::find($id);
        $Slider->title             = $request->title;
        $Slider->button_name       = $request->btn_name;
        $Slider->button_link       = $request->btn_link;
        if (!empty($request->file('image'))) {
            $file                      = $request->file('image');
            $ext                       =  $file->getClientOriginalExtension();
            $filename                  = strtolower( $Slider->id . Str::random(20) . '.'. $ext );
            $file->move('uploaded_files/slider',$filename);
            
            $Slider->image_name = $filename;
        }
        $Slider->save();
        return redirect('admin/slider/list')->with('success','Slider Updated Successfully');

    }
    public function delete($id)
    {
        $Slider = slider::find($id);

        $Slider->delete();
        return redirect()->back()->with('success','Slider Deleted Successfully');

    }
}
