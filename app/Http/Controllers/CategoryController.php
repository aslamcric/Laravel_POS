<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    // Display the list of categories
    public function index()
    {
        $categories = Category::paginate(3); // Pagination
        return view('pages.erp.categories.index', compact('categories'));
    }

    // Show form to create a new category
    public function create()
    {
        return view('pages.erp.categories.create');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        if ($category->save()) {
            return redirect('category')->with('success', "Category has been created");
        } else {
            echo "error";
        };
    }

    // Show details of a category
    public function show($id)
    {
        $category = Category::find($id);
        return view('pages.erp.categories.show', compact('category'));
    }

    // Show form to edit category details
    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages.erp.categories.update', compact('category'));
    }

    // Update category details
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        if ($category->save()) {
            return redirect('category')->with('success', "Category has been updated");

            // Calculate the last page
            // $perPage = 3;
            // $totalItems = Category::count();
            // $lastPage = ceil($totalItems / $perPage);

            // // Redirect to the last page
            // return redirect()->route('category.index', ['page' => $lastPage])
            //     ->with('status', 'Category updated successfully!');
        } else {
            echo "error";
        };
    }

    // Delete a category
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect('category')->with('success', "Category has been deleted");
    }

    public function search(Request $request)
    {
        $categories= Category::where('name',"like", "%{$request->name}%" )->paginate(3);

        $requestdata= $request->name;

        return view('pages.erp.categories.index' , compact('categories','requestdata'));
        if($students){
            return view('pages.erp.categories.index' , compact('categories'));
         }else{
            $categories=[];
         }
    }
}
