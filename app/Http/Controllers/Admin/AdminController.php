<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list(){
        $admins = User::where('is_admin',1)->where('is_deleted',0)->orderBy('id','desc')->get();
        return view('admin.admin.list', compact('admins'));
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'status' => 'required'
        ]);
        $user = new User ;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->is_admin = 1;
        $user->status = $request->input('status');
        $user->save();
        return redirect('admin/admin/list')->with('success','Admin Added Successfully');
    }

    public function edit($id)
    {
        $admin = User::find($id);
        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $admin = User::find($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $admin->password = Hash::make($request->input('password'));
        }
        $admin->is_admin = 1;
        $admin->status = $request->input('status');
        $admin->save();
        return redirect('admin/admin/list')->with('success','Admin Updated Successfully');

    }
    public function delete($id)
    {
        $admin = User::find($id);
        $admin->is_deleted = 1;
        $admin->save();
        return redirect()->back()->with('success','Admin Deleted Successfully');
    }

    public function customer_list()
    {
        $getCustomers = User::where('is_admin',0)->where('is_deleted',0)->paginate(30);
        return view('admin.customer.list', compact('getCustomers'));
    }
    public function delete_customer($id)
    {
        $customer = User::find($id);
        $customer->is_deleted = 1;
        $customer->save();
        return redirect()->back()->with('success','Customer Deleted Successfully');
    }
}
