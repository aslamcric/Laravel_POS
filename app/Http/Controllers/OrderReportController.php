<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Statu;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        $statuses = Statu::all();
        return view('pages.erp.order.report', ['orders' => [], 'customers' => $customers, 'statuses' => $statuses]);
    }

    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $customerId = $request->customer_id;
        $statusId = $request->status_id;

        $query = Order::query();

        if ($startDate && $endDate) {
            $query->whereBetween('order_date', [$startDate, $endDate]);
        }

        if ($customerId) {
            $query->where('customer_id', $customerId);
        }

        if ($statusId) {
            $query->where('status_id', $statusId);
        }

        $orders = $query->orderBy('order_date', 'asc')->get();
        $customers = Customer::all();
        $statuses = Statu::all();

        return view('pages.erp.order.report', compact('orders', 'startDate', 'endDate', 'customers', 'customerId', 'statuses', 'statusId'));
    }


}
