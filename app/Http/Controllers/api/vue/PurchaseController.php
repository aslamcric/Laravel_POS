<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchasesDetail;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    // for show
    public function allPurchaseindex(Request $request)
    {
        $query = Purchase::with('supplier', 'payment_status');

        if ($request->search) {
            $query->whereHas('supplier', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            });
        }

        return response()->json($query->paginate(5));
    }

    // for find data
    public function index()
    {
        try {
            $purchases = Purchase::with('supplier', 'payment_status')->get();
            $products = Product::all();
            $suppliers = Supplier::all();
            return response()->json(compact('purchases', 'products', 'suppliers'));
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    public function process(Request $request)
    {
        try {
            $purchase = new Purchase();
            $purchase->supplier_id = $request->supplier['id'];
            $purchase->status_id = 3;
            $purchase->order_total = $request->order_total;
            $purchase->paid_amount = $request->paid_amount;
            $purchase->discount = $request->discount;
            $purchase->vat = $request->vat;
            $purchase->date = now();
            $purchase->shipping_address = $request->supplier['address'];
            // $purchase->description = "";

            date_default_timezone_set("Asia/Dhaka");
            $purchase->created_at = date('Y-m-d H:i:s');
            $purchase->updated_at = date('Y-m-d H:i:s');
            $purchase->save();


            $lastInsertedId = $purchase->id;

            foreach ($request->products as $product) {
                $purchaseDetail = new PurchasesDetail();
                $purchaseDetail->purchases_id = $lastInsertedId;
                $purchaseDetail->product_id = $product['item_id'];
                $purchaseDetail->qty = $product['qty'];
                $purchaseDetail->price = $product['price'];
                $purchaseDetail->discount = $product['discount'];
                date_default_timezone_set("Asia/Dhaka");
                $purchaseDetail->created_at = date('Y-m-d H:i:s');
                $purchaseDetail->updated_at = date('Y-m-d H:i:s');
                $purchaseDetail->save();

                $stock = new Stock();
                $stock->product_id = $product['item_id'];
                $stock->transaction_type_id = 2;
                $stock->warehouse_id = 1;
                $stock->qty = $product['qty'];
                $stock->uom_id = 1;
                $stock->remark = "Purchase";
                $stock->created_at = date('Y-m-d H:i:s');
                $stock->updated_at = date('Y-m-d H:i:s');
                $stock->save();
            }

            $allData = $request->all();
            return response()->json(["success" => $allData]);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    // public function show($id)
    // {
    //     try {
    //         $purchase = Purchase::with(['purchases_details', 'supplier', 'purchases_details.products'])->where("id", $id)->get();

    //         return response()->json([
    //             'purchase' => $purchase,
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json(["error" => $th->getMessage()]);
    //     }
    // }
}
