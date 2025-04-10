<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(3));
    }
    public function dropCategory(Request $request)
    {
        $query = Category::all();

        return response()->json($query);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $category = new Category;
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();

            return response()->json(["category" => $category]);
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
            $category = Category::find($id);

            if (!$category) {
                $category = "Data Not Found";
            }

            return response()->json(['category' => $category]);
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
            $category = Category::find($id);

            if (!$category) {
                $category = "Data Not Found";
            }
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();

            return response()->json(['category' => $category]);
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
            $categories = Category::destroy($id);
            return response()->json(["categories" => $categories]);
        } catch (\Throwable $th) {
            return response()->json(["categories" => $th]);
        }
    }
}
