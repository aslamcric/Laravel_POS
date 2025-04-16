<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\PaymentStatuse;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        // $paymentStatuses = PaymentStatuse::all();

        return response()->json([
            'purchases' => [],
            'suppliers' => $suppliers,
            // 'payment_statuses' => $paymentStatuses,
        ]);
    }

    public function purchaseReport(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $supplierId = $request->supplier_id;
        $paymentStatusId = $request->payment_status_id;

        // Start the query
        $query = Purchase::query();

        // Apply filters
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        if (!empty($supplierId)) {
            $query->where('supplier_id', $supplierId);
        }

        if (!empty($paymentStatusId)) {
            $query->where('status_id', $paymentStatusId);
        }

        // Get the filtered purchases
        $purchases = $query->orderBy('date', 'asc')->get();

        // Fetch suppliers and payment statuses
        $suppliers = Supplier::all();
        $paymentStatuses = PaymentStatuse::all();

        // Calculate totals based on payment status
        $totalPaid = $purchases->where('status_id', 1)->sum('paid_amount');
        $totalUnpaid = $purchases->where('status_id', 2)->sum('paid_amount');
        $totalPending = $purchases->where('status_id', 3)->sum('paid_amount');

        // Return the response
        return response()->json([
            'purchases' => $purchases,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'supplierId' => $supplierId,
            'suppliers' => $suppliers,
            'total_paid' => $totalPaid,
            'total_unpaid' => $totalUnpaid,
            'total_pending' => $totalPending,
        ]);
    }
    
}
