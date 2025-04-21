<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\PurchasesDetail;
use Illuminate\Http\Request;

class PurchaseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PurchasesDetail::with('product');

        if ($request->search) {
            $query->where('purchases_id', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(8));
    }

}
