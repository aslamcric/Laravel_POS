<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::paginate(3);
        return view('pages.suppliers.index', compact('suppliers'));
    }


    public function create()
    {
        return view('pages.suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'contact' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required'
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->contact = $request->contact;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        if ($supplier->save()) {
            return redirect('supplier')->with('success', 'Supplier has been added Succersfully');
        }
    }


    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('pages.suppliers.show', compact('supplier'));
    }


    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('pages.suppliers.update', compact('supplier'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'contact' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required'
        ]);

        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->contact = $request->contact;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        if ($supplier->save()) {
            return redirect('supplier')->with('success', 'Supplier has been updated Succersfully');
        }
    }


    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect('supplier')->with('success', ' Supplier is deleted');
    }


    public function search(Request $request)
    {
        $suppliers = Supplier::where('name', "like", "%{$request->name}%")->paginate(3);

        $requestdata = $request->name;

        return view('pages.suppliers.index', compact('suppliers', 'requestdata'));
        if ($suppliers) {
            return view('pages.suppliers.index', compact('suppliers'));
        } else {
            $suppliers = [];
        }
    }

}
