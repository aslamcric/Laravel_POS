<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Display the list of suppliers
    public function index()
    {
        $suppliers = Supplier::paginate(3); // Pagination
        return view('pages.suppliers.index', compact('suppliers'));
    }

    // Show form to create a new supplier
    public function create()
    {
        return view('pages.suppliers.create');
    }

    // Store a new supplier
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoname = $request->name . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('supplier_photos'), $photoname);
            $supplier->photo = $photoname;
        }

        if ($supplier->save()) {
            return redirect('supplier')->with('success', 'Supplier has been added successfully.');
        }

        return back()->with('error', 'An error occurred while adding the supplier.');
    }

    // Show details of a supplier
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('pages.suppliers.show', compact('supplier'));
    }

    // Show form to edit supplier details
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('pages.suppliers.update', compact('supplier'));
    }

    // Update supplier details
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'photo' => 'required|image|mimes:jpg,jpeg,png',
        //     'phone' => 'required|numeric',
        //     'email' => 'required|email',
        //     'address' => 'required',
        // ]);


        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;

        // Han
        if ($request->file('photo')) {
            $photoname = $request->name . "." . $request->file('photo')->extension();

            $photoPath = public_path('photo/' . $photoname);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }

            $request->file('photo')->move(public_path('photo'), $photoname);
            $supplier->photo = $photoname;
        } else {
            $supplier->photo = $supplier->photo;
        }


        if ($supplier->save()) {
            return redirect('supplier')->with('success', "Product has been registred");
        } else {
            echo "error";
        };
    }



    public function destroy($id)
    {
        Supplier::destroy($id);

        return redirect('supplier')->with('success', "Supplier has been Deleted");
    }
}
