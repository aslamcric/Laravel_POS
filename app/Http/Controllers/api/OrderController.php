<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json(['orders' => $orders]);
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

        $order = new Order;
        $order->customer_id = $request->customer_id;
        $order->order_total = $request->order_total;
        $order->discount = $request->discount;
        $order->shipping_address = "";
        $order->paid_amount = $request->paid_amount;
        $order->status_id = 1;
        $order->order_date = now();
        $order->delivery_date = date('Y-m-d H:i:s', strtotime('+7 days'));
        $order->vat = $request->vat;
        $order->remark = "";   //$request->remark;
        date_default_timezone_set("Asia/Dhaka");
        $order->created_at = date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
        $order->updated_at = date('Y-m-d H:i:s');

        $order->save();

        $lastInsertedId = $order->id;
        $productsdata = $request->products;

        //    print_r( $productsdata);

        foreach ($productsdata as $key => $product) {
            $orderdetail = new OrderDetail;
            // print_r($product);
            $orderdetail->order_id = $lastInsertedId;
            $orderdetail->product_id = $product['item_id'];
            $orderdetail->qty = $product['qty'];
            $orderdetail->price = $product['price'];
            $orderdetail->vat = $request->vat;
            $orderdetail->uom_id = 1;
            $orderdetail->discount = $product['total_discount'];
            date_default_timezone_set("Asia/Dhaka");
            $orderdetail->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $orderdetail->updated_at = date('Y-m-d H:i:s');

            $orderdetail->save();



            $stock = new Stock;
            $stock->product_id=$product['item_id'];
            $stock->transaction_type_id= 2;
            $stock->warehouse_id=1;
            $stock->qty=$product['qty'] * (-1);
            $stock->uom_id=1;
            $stock->remark="Sales";
            $stock->created_at=date('Y-m-d H:i:s');
            $stock->updated_at=date('Y-m-d H:i:s');

            $stock->save();
        }
        return response()->json(['success' => "success"]);
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
