<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Statu;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function allOrderindex(Request $request)
    {
        $query = Order::with('customers', 'statuse');

        if ($request->search) {
            $query->whereHas('customers', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            });
        }

        return response()->json($query->paginate(5));
    }


    // public function index()
    // {
    //     $orders = Order::with(['customers'])->paginate(10);
    //     return view("pages.erp.order.index", ["orders" => $orders]);
    // }

    // public function create()
    // {
    //     return view("pages.erp.order.create", ["customers" => Customer::all(), "status" => Statu::all(), "products" => Product::all()]);
    // }


    // public function store(Request $request)
    // {
    //     //Order::create($request->all());
    //     $order = new Order;
    //     $order->customer_id = $request->customer_id;
    //     $order->order_total = $request->order_total;
    //     $order->discount = $request->discount;
    //     $order->shipping_address = $request->shipping_address;
    //     $order->paid_amount = $request->paid_amount;
    //     $order->status_id = $request->status_id;
    //     $order->order_date = $request->order_date;
    //     $order->delivery_date = $request->delivery_date;
    //     $order->vat = $request->vat;
    //     $order->remark = $request->remark;
    //     date_default_timezone_set("Asia/Dhaka");
    //     $order->created_at = date('Y-m-d H:i:s');
    //     date_default_timezone_set("Asia/Dhaka");
    //     $order->updated_at = date('Y-m-d H:i:s');

    //     $order->save();

    //     return back()->with('success', 'Created Successfully.');
    // }


    // public function show($id)
    // {
    //     $order = Order::find($id);
    //     $orderdetails = OrderDetail::where ('order_id', $order->id)->get();
    //     return view("pages.erp.order.show", ["order" => $order, 'orderdetails'=>$orderdetails]);
    // }


    // public function edit(Order $order)
    // {
    //     return view("pages.erp.order.edit", ["order" => $order, "customers" => Customer::all(), "status" => Statu::all()]);
    // }


    // public function update(Request $request, Order $order)
    // {
    //     //Order::update($request->all());
    //     $order = Order::find($order->id);
    //     $order->customer_id = $request->customer_id;
    //     $order->order_total = $request->order_total;
    //     $order->discount = $request->discount;
    //     $order->shipping_address = $request->shipping_address;
    //     $order->paid_amount = $request->paid_amount;
    //     $order->status_id = $request->status_id;
    //     $order->order_date = $request->order_date;
    //     $order->delivery_date = $request->delivery_date;
    //     $order->vat = $request->vat;
    //     $order->remark = $request->remark;
    //     date_default_timezone_set("Asia/Dhaka");
    //     $order->created_at = date('Y-m-d H:i:s');
    //     date_default_timezone_set("Asia/Dhaka");
    //     $order->updated_at = date('Y-m-d H:i:s');

    //     $order->save();

    //     return redirect()->route("orders.index")->with('success', 'Updated Successfully.');
    // }


    // public function destroy(Order $order)
    // {
    //     $order->delete();
    //     return redirect()->route("orders.index")->with('success', 'Deleted Successfully.');
    // }



    // public function find_customer(Request $request)
    // {
    //     $customer = Customer::find($request->id);
    //     return response()->json(['customer' => $customer]);
    // }

    // public function find_product(Request $request)
    // {
    //     $product = Product::find($request->id);
    //     return response()->json(['product' => $product]);
    // }
}
