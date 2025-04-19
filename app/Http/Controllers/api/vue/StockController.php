<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Transaction_Type;
use App\Models\Warehouse;
use App\Models\Uom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class StockController extends Controller
{
    public function apiIndex()
    {
        $query = DB::table('stocks as s')
            ->select('p.id', 'p.name', DB::raw('SUM(s.qty) as qty'))
            ->join('products as p', 'p.id', '=', 's.product_id')
            ->groupBy('p.id', 'p.name');

        // If search parameter exists
        if (request()->has('search') && request('search') != '') {
            $search = request('search');
            $query->where('p.name', 'like', "%{$search}%");
        }

        $stocks = $query->paginate(8)->withQueryString(); // Keep search term during pagination

        return response()->json($stocks);
    }

}
