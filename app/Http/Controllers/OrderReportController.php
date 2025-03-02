<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{

    public function index()
    {
        $purchases = Order::paginate(10);
        return view('pages.erp.order.report', ['orders' => []]);
    }

    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $query = Order::query();

        if ($startDate && $endDate) {
            $query->whereBetween('order_date', [$startDate, $endDate]);

        }

        $orders = $query->orderBy('order_date', 'asc')->get();

        return view('pages.erp.order.report', compact('orders', 'startDate', 'endDate'));
    }


}
