<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        // $query = Product::query();
        $query = Product::with('categories');

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        return response()->json($query->paginate(5));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $product = new Product;
            $product->name = $request->name;
            if (isset($request->photo)) {
                $product->photo = $request->photo;
            }
            $product->price = $request->price;
            $product->offer_price = $request->offer_price;
            $product->category_id = $request->category_id;
            $product->uom_id = 1;
            $product->barcode = $request->barcode;
            $product->sku = $request->sku;
            $product->manufacturer_id = 1;
            $product->description = $request->description;
            $product->weight = $request->weight;
            $product->size = $request->size;

            date_default_timezone_set("Asia/Dhaka");
            $product->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $product->updated_at = date('Y-m-d H:i:s');

            $product->save();

            if (isset($request->photo)) {
                $imageName = $product->id . '.' . $request->photo->extension();
                $product->photo = $imageName;
                $product->update();
                $request->photo->move(public_path('img'), $imageName);
            }

            return response()->json(["product" => $product]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                $product = "Data Not Found";
            }

            return response()->json(['product' => $product]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json(["message" => "product not Found"]);
            }

            $product->name = $request->name;
            if (isset($request->photo)) {
                $product->photo = $request->photo;
            }
            $product->price = $request->price;
            $product->offer_price = $request->offer_price;
            $product->category_id = $request->category_id;
            $product->uom_id = 1;
            $product->barcode = $request->barcode;
            $product->sku = $request->sku;
            $product->manufacturer_id = 1;
            $product->description = $request->description;
            $product->weight = $request->weight;
            $product->size = $request->size;

            date_default_timezone_set("Asia/Dhaka");
            $product->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $product->updated_at = date('Y-m-d H:i:s');

            $product->save();

            if (isset($request->photo)) {
                $imageName = $product->id . rand(5,100). '.' . $request->photo->extension();
                $product->photo = $imageName;
                $product->update();
                $request->photo->move(public_path('img'), $imageName);
            }

            return response()->json(["product" => $product]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $products = Product::destroy($id);
            return response()->json(["products" => $products]);
        } catch (\Throwable $th) {
            return response()->json(["products" => $th]);
        }
    }
}
