<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_ProductController.php" was generated by ProBot AI.
* Date: 2/19/2025 11:56:49 AM
* Contact: towhid1@outlook.com
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Uom;
use App\Models\Manufacturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view("pages.erp.product.index", ["products" => $products]);
    }
    public function create()
    {
        return view("pages.erp.product.create", ["categories" => Category::all(), "uom" => Uom::all(), "manufacturers" => Manufacturer::all()]);
    }
    public function store(Request $request)
    {
        //Product::create($request->all());
        $product = new Product;
        $product->name = $request->name;
        if (isset($request->photo)) {
            $product->photo = $request->photo;
        }
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->category_id = $request->category_id;
        $product->uom_id = $request->uom_id;
        $product->barcode = $request->barcode;
        $product->sku = $request->sku;
        $product->manufacturer_id = $request->manufacturer_id;
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

        return back()->with('success', 'Created Successfully.');
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view("pages.erp.product.show", ["product" => $product]);
    }
    public function edit(Product $product)
    {
        return view("pages.erp.product.edit", ["product" => $product, "categories" => Category::all(), "uom" => Uom::all(), "manufacturers" => Manufacturer::all()]);
    }
    public function update(Request $request, Product $product)
    {
        //Product::update($request->all());
        $product = Product::find($product->id);
        $product->name = $request->name;
        if (isset($request->photo)) {
            $product->photo = $request->photo;
        }
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->category_id = $request->category_id;
        $product->uom_id = $request->uom_id;
        $product->barcode = $request->barcode;
        $product->sku = $request->sku;
        $product->manufacturer_id = $request->manufacturer_id;
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

        return redirect()->route("products.index")->with('success', 'Updated Successfully.');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index")->with('success', 'Deleted Successfully.');
    }
}
