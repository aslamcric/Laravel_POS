<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $customers = Customer::all();

            if (!$customers) {
                $customers = "Data Not Found";
            }

            return response()->json(['customers' => $customers]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $customer = new Customer();

            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;

            // $customer->photo = $request->photo;

            // date_default_timezone_set("Asia/Dhaka");
            // $customer->created_at = date('Y-m-d H:i:s');
            // date_default_timezone_set("Asia/Dhaka");
            // $customer->updated_at = date('Y-m-d H:i:s');

            $customer->save();

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
                $customer = "Data Not Found";
            }

            return response()->json(['customer' => $customer]);
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
                return response()->json(["message" => "Customer not Found"]);
            }

            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->photo = $request->photo;

            $customer->save();

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
            $customers = Customer::destroy($id);
            return response()->json(["customers" => $customers]);
        } catch (\Throwable $th) {
            return response()->json(["customers" => $th]);
        }
    }
}
