<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountCodeController extends Controller
{
    public function list()
    {
        $DiscountCode = DiscountCode::all();
        return view('admin.DiscountCode.list',compact('DiscountCode'));
    }
    public function add(){
        return view('admin.DiscountCode.add');
    }
    public function insert(Request $request)
    {
        $DiscountCode = new DiscountCode();
        $DiscountCode->name             = $request->input('name');
        $DiscountCode->type             = $request->input('type');
        $DiscountCode->percent_amount   = $request->input('percent_amount');
        $DiscountCode->expire_date      = $request->input('expire_date');
        $DiscountCode->status           = $request->input('status');
        $DiscountCode->save();
        return redirect('admin/DiscountCode/list')->with('success','Discount Code Added Successfully');

    }
    public function edit($id)
    {
        $DiscountCode = DiscountCode::find($id);
        return view('admin.DiscountCode.edit', compact('DiscountCode'));
    }

    public function update(Request $request, $id)
    {
        $DiscountCode = DiscountCode::find($id);
        $DiscountCode->name             = $request->input('name');
        $DiscountCode->type             = $request->input('type');
        $DiscountCode->percent_amount   = $request->input('percent_amount');
        $DiscountCode->expire_date      = $request->input('expire_date');
        $DiscountCode->status           = $request->input('status');
        $DiscountCode->save();
        return redirect('admin/DiscountCode/list')->with('success','Discount Code Updated Successfully');

    }
    public function delete($id)
    {
        $DiscountCode = DiscountCode::find($id);
        $DiscountCode->delete();
        return redirect()->back()->with('success','Discount Code Deleted Successfully');

    }
}
