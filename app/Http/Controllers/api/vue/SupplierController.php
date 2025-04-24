<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     try {
    //         $suppliers = Supplier::all();

    //         if (!$suppliers) {
    //             $suppliers = "Data Not Found";
    //         }

    //         return response()->json(['suppliers' => $suppliers]);
    //     } catch (\Throwable $th) {
    //         return response()->json(["error" => $th->getMessage()]);
    //     }
    // }


    public function index(Request $request)
    {
        $query = Supplier::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        // Paginate the results
        $suppliers = $query->paginate(5);

        // Return paginated data with links (for frontend pagination component)
        return response()->json($suppliers);
    }

    // Store a new supplier
    public function store(Request $request)
    {
        try {
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->address = $request->address;

            if (isset($request->photo)) {
                $supplier->photo = $request->photo;
            }

            date_default_timezone_set("Asia/Dhaka");
            $supplier->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $supplier->updated_at = date('Y-m-d H:i:s');

            $supplier->save();

            if (isset($request->photo)) {
                $imageName = $supplier->id . '.' . $request->photo->extension();
                $supplier->photo = $imageName;
                $supplier->update();
                $request->photo->move(public_path('img'), $imageName);
            }

            return response()->json(['supplier' => $supplier]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }


    // Show a single supplier
    public function show($id)
    {
        try {
            $supplier = Supplier::find($id);
            if (!$supplier) {
                return response()->json(['message' => 'Supplier not found'], 404);
            }
            return response()->json(['supplier' => $supplier]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }

    // Update supplier
    public function update(Request $request, $id)
    {
        try {
            $supplier = Supplier::find($id);

            if (!$supplier) {
                return response()->json(['message' => 'Supplier not found'], 404);
            }


            $supplier->name = $request->name;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->address = $request->address;

            if (isset($request->photo)) {
                $supplier->photo = $request->photo;
            }


            $supplier->save();

            if (isset($request->photo)) {
                $imageName = $supplier->id . '.' . $request->photo->extension();
                $supplier->photo = $imageName;
                $supplier->update();
                $request->photo->move(public_path('img'), $imageName);
            }

            return response()->json(['supplier' => $supplier]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }

    // Delete a supplier
    public function destroy($id)
    {
        try {
            Supplier::destroy($id);
            return response()->json(['message' => 'Supplier deleted']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }



}
