<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\ProductWishlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        $getTotalOrders = Orders::where('is_payment',1)->where('user_id',Auth::user()->id)->count();
        $getTotalTodayOrders = Orders::where('is_payment',1)->whereDate('created_at',date('Y-m-d'))->where('user_id',Auth::user()->id)->count();
        $getTotalAmount = Orders::where('is_payment',1)->where('user_id',Auth::user()->id)->sum('total_amount');
        $getTotalTodayAmount = Orders::where('is_payment',1)->whereDate('created_at',date('Y-m-d'))->where('user_id',Auth::user()->id)->sum('total_amount');

        $totalPending = Orders::where('is_payment',1)->where('user_id',Auth::user()->id)->where('status',0)->count();
        $totalInprogress = Orders::where('is_payment',1)->where('user_id',Auth::user()->id)->where('status',1)->count();
        $totalCompleted = Orders::where('is_payment',1)->where('user_id',Auth::user()->id)->where('status',3)->count();
        $totalCancelled = Orders::where('is_payment',1)->where('user_id',Auth::user()->id)->where('status',4)->count();
        return view('user.dashboard' ,compact('getTotalOrders','getTotalTodayOrders','getTotalAmount','getTotalTodayAmount',
        'totalPending','totalInprogress','totalCompleted','totalCancelled'));
    }

    public function orders()
    {
        $orders = Orders::where('user_id',Auth::user()->id)->where('is_payment',1)->orderByDESC('id')->paginate(10);
        return view('user.order',compact('orders'));
    }

    public function user_order_details($id)
    {
        $order = Orders::where('id',$id)->where('user_id',Auth::user()->id)->where('is_payment',1)->first();
        return view('user.order_details',compact('order'));
    }

    public function edit_profile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.edit_profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->company_name = $request->company_name;
        $user->country = $request->country;
        $user->address_one = $request->address_one;
        $user->address_two = $request->address_two;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->postcode = $request->postcode;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('success','Profile updated successfully');


    }

    public function change_password()
    {
        return view('user.change_password');
    }


    public function update_password(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if(Hash::check($request->olde_password, $user->password))
        {
            if ($request->password == $request->cpassword)
            {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with('success','Password updated successfully');
            }
            else
            {
                return redirect()->back()->with('error','Password and Confirm Password does not match');
            }
        }
        else
        {
            return redirect()->back()->with('error','Old password is not correct');
        }

    }

    public function add_to_wishlist(Request $request)
    {
        $check = ProductWishlist::where('user_id',Auth::user()->id)->where('product_id',$request->productID)->count();
        if($check)
        {
            ProductWishlist::where('user_id',Auth::user()->id)->where('product_id',$request->productID)->delete();
            $json['is_wishlist'] = 0;
        }
        else
        {
            $save = new ProductWishlist();
            $save->user_id = Auth::user()->id;
            $save->product_id = $request->productID;
            $save->save();
            $json['is_wishlist'] = 1;

        }
        $json['status'] = true;
        echo json_encode($json) ;

    }


}
