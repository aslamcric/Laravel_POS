<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_OrderController.php" was generated by ProBot AI.
* Date: 2/19/2025 11:57:22 AM
* Contact: towhid1@outlook.com
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Statu;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customers'])->paginate(10);
        return view("pages.erp.order.index", ["orders" => $orders]);
    }
    public function create()
    {
        return view("pages.erp.order.create", ["customers" => Customer::all(), "status" => Statu::all(), "products" => Product::all()]);
    }
    public function store(Request $request)
    {
        //Order::create($request->all());
        $order = new Order;
        $order->customer_id = $request->customer_id;
        $order->order_total = $request->order_total;
        $order->discount = $request->discount;
        $order->shipping_address = $request->shipping_address;
        $order->paid_amount = $request->paid_amount;
        $order->status_id = $request->status_id;
        $order->order_date = $request->order_date;
        $order->delivery_date = $request->delivery_date;
        $order->vat = $request->vat;
        $order->remark = $request->remark;
        date_default_timezone_set("Asia/Dhaka");
        $order->created_at = date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
        $order->updated_at = date('Y-m-d H:i:s');

        $order->save();

        return back()->with('success', 'Created Successfully.');
    }
    public function show($id)
    {
        $order = Order::find($id);
        $orderdetails = OrderDetail::where ('order_id', $order->id)->get();
        return view("pages.erp.order.show", ["order" => $order, 'orderdetails'=>$orderdetails]);
    }
    public function edit(Order $order)
    {
        return view("pages.erp.order.edit", ["order" => $order, "customers" => Customer::all(), "status" => Statu::all()]);
    }
    public function update(Request $request, Order $order)
    {
        //Order::update($request->all());
        $order = Order::find($order->id);
        $order->customer_id = $request->customer_id;
        $order->order_total = $request->order_total;
        $order->discount = $request->discount;
        $order->shipping_address = $request->shipping_address;
        $order->paid_amount = $request->paid_amount;
        $order->status_id = $request->status_id;
        $order->order_date = $request->order_date;
        $order->delivery_date = $request->delivery_date;
        $order->vat = $request->vat;
        $order->remark = $request->remark;
        date_default_timezone_set("Asia/Dhaka");
        $order->created_at = date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
        $order->updated_at = date('Y-m-d H:i:s');

        $order->save();

        return redirect()->route("orders.index")->with('success', 'Updated Successfully.');
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("orders.index")->with('success', 'Deleted Successfully.');
    }



    public function find_customer(Request $request)
    {
        $customer = Customer::find($request->id);
        return response()->json(['customer' => $customer]);
    }

    public function find_product(Request $request)
    {
        $product = Product::find($request->id);
        return response()->json(['product' => $product]);
    }
}
