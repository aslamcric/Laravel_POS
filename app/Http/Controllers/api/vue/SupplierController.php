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
        try {
            // If search parameter exists, filter by name
            $suppliers = Supplier::when($request->search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%");
            })
                ->paginate(5); // Paginate with 10 suppliers per page

            // Include pagination data in the response
            return response()->json([
                'suppliers' => $suppliers->items(),  // Only return the items on the current page
                'pagination' => [
                    'current_page' => $suppliers->currentPage(),
                    'total_pages' => $suppliers->lastPage(),
                    'total_items' => $suppliers->total(),
                ]
            ]); // Return paginated data along with pagination details
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]); // Catch exceptions
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
}
