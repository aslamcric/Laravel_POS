<?php

namespace App\Http\Controllers;

use App\Models\PaymentStatuse;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        $paymentStatuses = PaymentStatuse::all();

        return view('pages.erp.purchase.report', [
            'purchases' => [],
            'suppliers' => $suppliers,
            'paymentStatuses' => $paymentStatuses,
        ]);
    }




    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $supplierId = $request->supplier_id;
        $paymentStatusId = $request->payment_status_id;

        $query = Purchase::query();

        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        if ($supplierId) {
            $query->where('supplier_id', $supplierId);
        }

        if ($paymentStatusId) {
            $query->where('status_id', $paymentStatusId);
        }

        $purchases = $query->orderBy('date', 'asc')->get();
        $suppliers = Supplier::all();
        $paymentStatuses = PaymentStatuse::all();

        // Calculate total amounts dynamically based on status
        $totalPaid = $purchases->where('status_id', 1)->sum('paid_amount');  // Paid
        $totalUnpaid = $purchases->where('status_id', 2)->sum('paid_amount'); // Unpaid
        $totalPending = $purchases->where('status_id', 3)->sum('paid_amount'); // Pending

        return view('pages.erp.purchase.report', compact(
            'purchases',
            'startDate',
            'endDate',
            'supplierId',
            'suppliers',
            'paymentStatusId',
            'paymentStatuses',
            'totalPaid',
            'totalUnpaid',
            'totalPending'
        ));
    }
}
