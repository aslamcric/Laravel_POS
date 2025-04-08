<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockReportController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.erp.stock.report', ['stocks' => [], 'products' => $products]);
    }

    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $remark = $request->remark;
        $product_id = $request->product_id;

        $query = Stock::query();

        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('created_at', [
                date('Y-m-d 00:00:00', strtotime($startDate)),
                date('Y-m-d 23:59:59', strtotime($endDate))
            ]);
        }

        if (!empty($remark)) {
            $query->where('remark', $remark);
        }

        if (!empty($product_id)) {
            $query->where('product_id', $product_id);
        }

        $stocks = $query->orderBy('created_at', 'asc')->get();
        $products = Product::all();

        return view('pages.erp.stock.report', compact('stocks', 'startDate', 'endDate', 'remark', 'product_id', 'products'));
    }
}
