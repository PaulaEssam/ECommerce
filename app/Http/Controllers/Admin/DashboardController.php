<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $getTotalOrders = Orders::where('is_payment',1)->count();
        $getTotalTodayOrders = Orders::where('is_payment',1)->whereDate('created_at',date('Y-m-d'))->count();
        $getTotalAmount = Orders::where('is_payment',1)->sum('total_amount');
        $getTotalTodayAmount = Orders::where('is_payment',1)->whereDate('created_at',date('Y-m-d'))->sum('total_amount');
        $getTotalUsers = User::where('is_admin',0)->where('is_deleted',0)->count();
        $getTotalTodayUsers = User::where('is_admin',0)->where('is_deleted',0)->whereDate('created_at',date('Y-m-d'))->count();
        $getLatestOrders = Orders::where('is_payment',1)->orderByDESC('id')->limit(10)->get();
        if(!empty($request->year)){
            $year = $request->year;
        }
        else{
            $year = date('Y');
        }
        $getTotalCustomerMoths = '';
        $getTotalOrderMonths = '';
        $getTotalOrderAmountMonths = '';
        $totalAmount = 0;
        for ($month=1; $month <=12 ; $month++) {
            $startDate = new \DateTime("$year-$month-01");
            $endDate = new \DateTime("$year-$month-01");
            $endDate->modify('last day of this month');

            $start_date = $startDate->format('Y-m-d');
            $end_date = $endDate->format('Y-m-d');

            $customer = User::where('is_admin',0)->where('is_deleted',0)->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->count();
            $getTotalCustomerMoths .=$customer.',';

            $order = Orders::where('is_payment',1)->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->count();
            $getTotalOrderMonths .=$order.',';

            $orderPayment = Orders::where('is_payment',1)->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->sum('total_amount');
            $getTotalOrderAmountMonths .=$orderPayment.',';

            $totalAmount += $orderPayment;

        }
        $getTotalCustomerMoths = rtrim($getTotalCustomerMoths,',');
        $getTotalOrderMonths = rtrim($getTotalOrderMonths,',');
        $getTotalOrderAmountMonths = rtrim($getTotalOrderAmountMonths,',');

        return view('admin.dashboard',compact('getTotalOrders','getTotalTodayOrders','getTotalAmount',
        'getTotalTodayAmount','getTotalUsers','getTotalTodayUsers','getLatestOrders','getTotalCustomerMoths',
        'getTotalOrderMonths','getTotalOrderAmountMonths','totalAmount','year'));
    }

}
