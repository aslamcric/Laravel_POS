<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public function index()
    {
       
        return view('pages.erp.purchase.report', ['purchases' => []]);
    }


    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $query = Purchase::query();

        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);

        }

        $purchases = $query->orderBy('date', 'asc')->get();

        return view('pages.erp.purchase.report', compact('purchases', 'startDate', 'endDate'));
    }
}
