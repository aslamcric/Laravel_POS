<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockReportController extends Controller
{
    public function index()
    {

        return view('pages.erp.stock.report', ['stocks' => []]);
    }


    public function show(Request $request)
{
    $startDate = $request->start_date;
    $endDate = $request->end_date;
    $remark = $request->remark;
    $product_id = $request->product_id;

    $query = Stock::query();

    if ($startDate && $endDate) {
        $query->whereBetween('updated_at', [$startDate, $endDate]);
    }

    if (!empty($remark)) {
        $query->where('remark', $remark);
    }

    if (!empty($product_id)) {
        $query->where('product_id', $product_id);
    }

    $stocks = $query->orderBy('updated_at', 'asc')->get();
    $products = \App\Models\Product::all();

    return view('pages.erp.stock.report', compact('stocks', 'startDate', 'endDate', 'remark', 'product_id', 'products'));
}

}
