<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchasesDetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function allPurchaseindex(Request $request)
    {
        $query = Purchase::with('supplier', 'payment_status');

        if ($request->search) {
            $query->whereHas('supplier', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            });
        }

        return response()->json($query->paginate(3));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $purchases = Purchase::with('supplier', 'payment_status')->get();
            // $products = Product::all();
            return response()->json(compact('purchases'));
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

   


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $purchase = new Purchase;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->status_id = 2;
        $purchase->order_total = $request->order_total;
        $purchase->paid_amount = $request->paid_amount;
        $purchase->discount = $request->discount;
        $purchase->vat = $request->vat;
        if (isset($request->photo)) {
            $purchase->photo = "";
        }
        $purchase->date = now();
        $purchase->shipping_address = $request->shipping_address;
        // $purchase->shipping_address = "";
        $purchase->description = "";
        // foreach ($request->products as $key => $product) {
        //     $purchase->description = $product['description'];
        // }

        date_default_timezone_set("Asia/Dhaka");
        $purchase->created_at = date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
        $purchase->updated_at = date('Y-m-d H:i:s');

        $purchase->save();

        if (isset($request->photo)) {
            $imageName = $purchase->id . '.' . $request->photo->extension();
            $purchase->photo = $imageName;
            $purchase->update();
            $request->photo->move(public_path('img'), $imageName);
        }


        $lastInsertedId = $purchase->id;
        $productsdata = $request->products;

        foreach ($productsdata as $key => $product) {

            $purchasesdetail = new PurchasesDetail;
            //  print_r($product);

            $purchasesdetail->purchases_id = $lastInsertedId;
            $purchasesdetail->product_id = $product['item_id'];
            $purchasesdetail->qty = $product['qty'];
            $purchasesdetail->price = $product['price'];
            $purchasesdetail->discount = $product['total_discount'];
            date_default_timezone_set("Asia/Dhaka");
            $purchasesdetail->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $purchasesdetail->updated_at = date('Y-m-d H:i:s');

            $purchasesdetail->save();


            $stock = new Stock;
            // print_r($stock);
            $stock->product_id=$product['item_id'];
            $stock->transaction_type_id= 2;
            $stock->warehouse_id=1;
            $stock->qty=$product['qty'] * (1);
            $stock->uom_id=1;
            $stock->remark="Purchase";
            $stock->created_at=date('Y-m-d H:i:s');
            $stock->updated_at=date('Y-m-d H:i:s');

            $stock->save();

        };
        return response()->json(['success' => "success"]);
    }
}
