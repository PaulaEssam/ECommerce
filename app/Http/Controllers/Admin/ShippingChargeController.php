<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;

class ShippingChargeController extends Controller
{
    public function list()
    {
        $ShippingCharge = ShippingCharge::all();
        return view('admin.ShippingCharge.list',compact('ShippingCharge'));
    }
    public function add(){
        return view('admin.ShippingCharge.add');
    }
    public function insert(Request $request)
    {
        $ShippingCharge = new ShippingCharge();
        $ShippingCharge->name             = $request->input('name');
        $ShippingCharge->price             = $request->input('price');
        $ShippingCharge->status           = $request->input('status');
        $ShippingCharge->save();
        return redirect('admin/ShippingCharge/list')->with('success','Shipping Charge Added Successfully');

    }
    public function edit($id)
    {
        $ShippingCharge = ShippingCharge::find($id);
        return view('admin.ShippingCharge.edit', compact('ShippingCharge'));
    }

    public function update(Request $request, $id)
    {
        $ShippingCharge = ShippingCharge::find($id);
        $ShippingCharge->name             = $request->input('name');
        $ShippingCharge->price             = $request->input('price');
        $ShippingCharge->status           = $request->input('status');
        $ShippingCharge->save();
        return redirect('admin/ShippingCharge/list')->with('success','Shipping Charge Updated Successfully');

    }
    public function delete($id)
    {
        $ShippingCharge = ShippingCharge::find($id);

        $ShippingCharge->delete();
        return redirect()->back()->with('success','Shipping Charge Deleted Successfully');

    }
}
