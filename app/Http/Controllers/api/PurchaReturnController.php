<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseReturn;
use Illuminate\Http\Request;

class PurchaReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchasereturns = PurchaseReturn::paginate(10);
        return response()->json(['purchasereturns' => $purchasereturns, "products" => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        print_r($request->all());

        $purchasereturn = new PurchaseReturn;
        $purchasereturn->purchases_id = $request->purchases_id;
        $purchasereturn->supplier_id = $request->supplier_id;
        $purchasereturn->purchase_status_id = $request->purchase_status_id;
        $purchasereturn->order_total = $request->order_total;
        $purchasereturn->paid_amount = $request->paid_amount;
        $purchasereturn->discount = $request->discount;
        $purchasereturn->vat = $request->vat;
        $purchasereturn->date = $request->date;
        $purchasereturn->shipping_address = $request->shipping_address;
        $purchasereturn->description = $request->description;
        date_default_timezone_set("Asia/Dhaka");
        $purchasereturn->created_at = date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
        $purchasereturn->updated_at = date('Y-m-d H:i:s');

        $purchasereturn->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
