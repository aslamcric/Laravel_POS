<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function getDashboardData()
    {
        $data = [
            'total_orders' => DB::table('orders')->sum('order_total'),
            'total_orders_paid' => DB::table('orders')->sum('paid_amount'),
            'total_orders_no' => DB::table('orders')->count(),

            'total_purchases' => DB::table('purchases')->sum('order_total'),
            'total_purchases_paid' => DB::table('purchases')->sum('paid_amount'),
            'total_purchases_no' => DB::table('purchases')->count(),

            'total_customers' => DB::table('customers')->count(),
            'total_suppliers' => DB::table('suppliers')->count(),
        ];

        return response()->json($data);
    }

}
