<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $data['TotalOrder'] = OrderModel::getTotalOrder();
        $data['TotalTodayOrder'] = OrderModel::getTotalTodayOrders();
        $data['TotalPayment'] = OrderModel::getTotalPayment();
        $data['TotalTodayPayment'] = OrderModel::getTotalTodayPayment();
        $data['TotalCustomer'] = User::getTotalCustomer();
        $data['TotalTodayCustomer'] = User::getTotalTodayCustomer();

        $data['getLatestOrders'] = OrderModel::getLatestOrders();

        if(!empty($request->year)){
            $year = $request->year;
        }
        else{
            $year = date('Y');
        }

        

        $getTotalCustomerMonth = '';
        $getTotalOrderMonth = '';
        $getTotalOrderAmountMonth = '';

        $totalAmount = 0;

        for($month = 1; $month <= 12; $month++){
            $startDate = new \DateTime("$year-$month-01");
            $endDate = new \DateTime("$year-$month-01");
            $endDate->modify('last day of this month');

            $start_date = $startDate->format('Y-m-d');
            $end_date = $endDate->format('Y-m-d');

            $customer = User::getTotalCustomerMonth($start_date, $end_date);
            $getTotalCustomerMonth .= $customer.',';

            $order = OrderModel::getTotalOrderMonth($start_date, $end_date);
            $getTotalOrderMonth .= $order.',';

            $orderPayment = OrderModel::getTotalOrderAmountMonth($start_date, $end_date);
            $getTotalOrderAmountMonth .= $orderPayment.',';
            $totalAmount = $totalAmount + $orderPayment;
        }
        
        $data['getTotalCustomerMonth'] = rtrim($getTotalCustomerMonth, ",");
        $data['getTotalOrderMonth'] = rtrim($getTotalOrderMonth, ",");
        $data['getTotalOrderAmountMonth'] = rtrim($getTotalOrderAmountMonth, ",");
        $data['totalAmount'] = $totalAmount;
        $data['year'] = $year;

        $data['header_title'] = "Dashboard";
        return view('admin.dashboard', $data);
    }
}
