<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
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
    public function store_react(Request $request)
    {
        try {

            print_r($request->all());

            $order = new Order;
            $order->customer_id = $request->customer_id;
            $order->order_total = $request->total;
            $order->discount = $request->discount;
            $order->shipping_address = "";
            $order->paid_amount = $request->total;
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




             foreach ($request->items as $key => $product) {
                $orderdetail = new OrderDetail;
                $orderdetail->order_id = $lastInsertedId;
                $orderdetail->product_id = $product['product_id'];
                $orderdetail->qty = $product['quantity'];
                $orderdetail->price = $product['price'];
                $orderdetail->vat = 0;
                $orderdetail->uom_id = 1;
                $orderdetail->discount = $product['discount'];
                date_default_timezone_set("Asia/Dhaka");
                $orderdetail->created_at = date('Y-m-d H:i:s');
                date_default_timezone_set("Asia/Dhaka");
                $orderdetail->updated_at = date('Y-m-d H:i:s');

                $orderdetail->save();


                $stock = new Stock;
                $stock->product_id = $product['product_id'];
                $stock->transaction_type_id = 2;
                $stock->warehouse_id = 1;
                $stock->qty = $product['quantity'] * (-1);
                $stock->uom_id = 1;
                $stock->remark = "Sales";
                $stock->created_at = date('Y-m-d H:i:s');
                $stock->updated_at = date('Y-m-d H:i:s');

                $stock->save();
            }
            return response()->json(['success' => "success"]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage()]);
        }
    }










    public function store(Request $request)
    {
        // print_r($request->all());

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
            $stock->product_id = $product['item_id'];
            $stock->transaction_type_id = 2;
            $stock->warehouse_id = 1;
            $stock->qty = $product['qty'] * (-1);
            $stock->uom_id = 1;
            $stock->remark = "Sales";
            $stock->created_at = date('Y-m-d H:i:s');
            $stock->updated_at = date('Y-m-d H:i:s');

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

    public function find_customer(Request $request)
    {
        $customer = Customer::get();
        $order = Order::orderByDesc("id")->limit(1)->get();

        return response()->json(['customer' => $customer, "order" => $order]);
    }

    public function find_product(Request $request)
    {
        $product = Product::get();
        return response()->json(['product' => $product]);
    }
}
