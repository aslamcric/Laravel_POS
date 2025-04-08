<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnDetail;
use App\Models\PurchaseStatuse;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchasereturns = PurchaseReturn::paginate(10);
        return response()->json(['purchasereturns' => $purchasereturns]);
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
        $purchasereturn->purchases_id = 1;
        $purchasereturn->supplier_id = $request->supplier_id;
        $purchasereturn->purchase_status_id = 1;
        $purchasereturn->order_total = $request->order_total;
        $purchasereturn->paid_amount = $request->paid_amount;
        $purchasereturn->discount = $request->discount;
        $purchasereturn->vat = $request->vat;
        $purchasereturn->date = now();
        $purchasereturn->shipping_address = $request->shipping_address;

        // $purchasereturn->description = $request->description;
        foreach ($request->products as $key => $product) {
                $purchasereturn->description = $product['description'];
            }


        date_default_timezone_set("Asia/Dhaka");
        $purchasereturn->created_at = date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
        $purchasereturn->updated_at = date('Y-m-d H:i:s');

        $purchasereturn->save();

        $lastInsertedId = $purchasereturn->id;
        $productsdata = $request->products;


        foreach ($productsdata as $key => $product) {
            // print_r($product);

            $purchasereturndetail = new PurchaseReturnDetail;

            $purchasereturndetail->purchase_return_id = $lastInsertedId;
            $purchasereturndetail->product_id = $product['item_id'];
            $purchasereturndetail->qty = $product['qty'];
            $purchasereturndetail->price = $product['price'];
            $purchasereturndetail->discount = $product['total_discount'];
            date_default_timezone_set("Asia/Dhaka");
            $purchasereturndetail->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $purchasereturndetail->updated_at = date('Y-m-d H:i:s');

            $purchasereturndetail->save();


            $stock = new Stock;
            $stock->product_id=$product['item_id'];
            $stock->transaction_type_id= 2;
            $stock->warehouse_id=1;
            $stock->qty=$product['qty'] * (-1);
            $stock->uom_id=1;
            $stock->remark="Purchase Returns";
            $stock->created_at=date('Y-m-d H:i:s');
            $stock->updated_at=date('Y-m-d H:i:s');

            $stock->save();
        }
        return response()->json(['success' => "success"]);
    }
}
