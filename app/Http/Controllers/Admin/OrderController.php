<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Stripe\Climate\Order;

class OrderController extends Controller
{
    public function list(Request $request)
    {
        $getRecord = Orders::where('is_payment',1);
        if (!empty($request->get('id')))
        {
            $getRecord = $getRecord->where('id',$request->get('id'));
        }

        if (!empty($request->get('f_name')))
        {
            $getRecord = $getRecord->where('first_name','like', '%'.$request->get('f_name').'%');
        }

        if (!empty($request->get('l_name')))
        {
            $getRecord = $getRecord->where('last_name','like', '%'.$request->get('l_name').'%');
        }

        if (!empty($request->get('email')))
        {
            $getRecord = $getRecord->where('email','like', '%'.$request->get('email').'%');
        }

        if (!empty($request->get('phone')))
        {
            $getRecord = $getRecord->where('phone','like', '%'.$request->get('phone').'%');
        }

        if (!empty($request->get('country')))
        {
            $getRecord = $getRecord->where('country','like', '%'.$request->get('country').'%');
        }

        if (!empty($request->get('state')))
        {
            $getRecord = $getRecord->where('state','like', '%'.$request->get('state').'%');
        }

        if (!empty($request->get('city')))
        {
            $getRecord = $getRecord->where('city','like', '%'.$request->get('city').'%');
        }

        if (!empty($request->get('from_date')))
        {
            $getRecord = $getRecord->whereDate('created_at', '>=' , $request->get('from_date'));
        }

        if (!empty($request->get('to_date')))
        {
            $getRecord = $getRecord->whereDate('created_at','<=' , $request->get('to_date'));
        }



        $getRecord = $getRecord->orderByDESC('id')->paginate(30);
        return view('admin.order.list', compact('getRecord'));
    }
    public function order_details($id)
    {
        $getRecord = Orders::find($id);
        return view('admin.order.details', compact('getRecord'));
    }

    public function order_delete($id)
    {
        $deleteRecord = Orders::find($id);
        $deleteRecord->delete();
        return redirect()->back()->with('success', 'Order deleted successfully');
    }

    public static function order_status(Request $request)
    {
        $getOrder = Orders::find($request->order_id);
        $getOrder->status = $request->status;
        $getOrder->save();
        $json['message'] = 'Status Updated Successfully';
        echo json_encode($json);
    }
}
