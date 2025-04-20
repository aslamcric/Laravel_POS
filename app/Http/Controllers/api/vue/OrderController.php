<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Statu;
use App\Models\Stock;
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

    public function index()
    {

        try {
            $customers = Customer::all();
            $products = Product::all();
            return response()->json(compact('customers', 'products'));
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    public function process(Request $request)
    {
        // order table
        try {
            $order = new Order();
            $order->customer_id = $request->customer['id'];
            $order->order_date = now();
            $order->delivery_date =  date('Y-m-d', strtotime('+7 days'));
            $order->shipping_address = $request->customer['address'];
            $order->order_total = $request->grandtotal;
            $order->paid_amount = $request->grandtotal;
            $order->remark = "";
            $order->status_id = 1;
            $order->discount = $request->discount;
            $order->vat = 0;
            date_default_timezone_set("Asia/Dhaka");
            $order->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $order->updated_at = date('Y-m-d H:i:s');
            $order->save();
            $last_id = $order->id;

            foreach ($request->products as $key => $product) {

                $orderdetail = new OrderDetail();
                $orderdetail->order_id = $last_id;
                $orderdetail->product_id = $product['item_id'];
                $orderdetail->qty = $product['qty'];
                $orderdetail->price = $product['price'];
                $orderdetail->vat = 0;
                $orderdetail->discount = $product['discount'];
                date_default_timezone_set("Asia/Dhaka");
                $orderdetail->created_at = date('Y-m-d H:i:s');
                date_default_timezone_set("Asia/Dhaka");
                $orderdetail->updated_at = date('Y-m-d H:i:s');
                $orderdetail->save();

                $stock = new Stock();
                $stock->product_id = $product['item_id'];
                $stock->transaction_type_id = 2;
                $stock->warehouse_id = 1;
                $stock->qty = $product['qty'] * -1;
                $stock->uom_id = 1;
                $stock->remark = "Sales";
                $stock->created_at = date('Y-m-d H:i:s');
                $stock->updated_at = date('Y-m-d H:i:s');
                $stock->save();
            }

            $allData = $request->all();
            return response()->json(["success" => $allData]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }


    public function show($id)
    {
        // return response()->json(["abc" => $id]);
        try {
            $order = Order::with(['order_details', 'customers', 'order_details.products'])->where("id", $id)->get();


           return response()->json([
                'order' => $order,
            ]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}
