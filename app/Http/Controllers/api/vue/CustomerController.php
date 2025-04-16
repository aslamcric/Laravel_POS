<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Customer::query();

            if ($request->search) {
                $query->where('name', 'like', "%{$request->search}%")
                    ->orWhere('email', 'like', "%{$request->search}%");
            }

            $customers = $query->paginate(5);

            return response()->json(['customers' => $customers]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $customer = new Customer;

            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;

            if (isset($request->photo)) {
                $customer->photo = $request->photo;
            }

            date_default_timezone_set("Asia/Dhaka");
            $customer->created_at = date('Y-m-d H:i:s');
            $customer->updated_at = date('Y-m-d H:i:s');

            $customer->save();

            if (isset($request->photo)) {
                $imageName = $customer->id . '.' . $request->photo->extension();
                $customer->photo = $imageName;
                $customer->update();
                $request->photo->move(public_path('img'), $imageName);
            }

            return response()->json(["customer" => $customer]);
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
            $customer = Customer::find($id);

            if (!$customer) {
                return response()->json(["message" => "Customer not found"], 404);
            }

            return response()->json(["customer" => $customer]);
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
            $customer = Customer::find($id);

            if (!$customer) {
                return response()->json(["message" => "Customer not found"], 404);
            }

            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;

            date_default_timezone_set("Asia/Dhaka");
            $customer->updated_at = date('Y-m-d H:i:s');

            $customer->save();

            if (isset($request->photo)) {
                $imageName = $customer->id . rand(5, 100) . '.' . $request->photo->extension();
                $customer->photo = $imageName;
                $customer->update();
                $request->photo->move(public_path('img'), $imageName);
            }

            return response()->json(["customer" => $customer]);
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
            $deleted = Customer::destroy($id);
            return response()->json(["deleted" => $deleted]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}
