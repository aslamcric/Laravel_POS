<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class purchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::all();
        return response()->json(['purchases' => $purchases]);
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
        // print_r($request->products[0]['description']);
        print_r($request->all());


        $purchase = new Purchase;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->status_id = 2;
        $purchase->order_total = $request->order_total;
        $purchase->paid_amount = $request->paid_amount;
        $purchase->discount = $request->discount;
        $purchase->vat = $request->vat;
        if (isset($request->photo)) {
            $purchase->photo = $request->photo;
        }
        $purchase->date = now();
        // $purchase->shipping_address = $request->shipping_address;
        $purchase->shipping_address = "";
        // $purchase->description = $request->description;
        foreach ($request->products as $key => $product) {
            $purchase->description =$product['description'];
        }

        date_default_timezone_set("Asia/Dhaka");
        $purchase->created_at = date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
        $purchase->updated_at = date('Y-m-d H:i:s');

        $purchase->save();


        if(isset($request->photo)){
			$imageName=$purchase->id.'.'.$request->photo->extension();
			$purchase->photo=$imageName;
			$purchase->update();
			$request->photo->move(public_path('img'),$imageName);
		}
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
