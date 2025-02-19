<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_StockAdjustmentController.php" was generated by ProBot AI.
* Date: 2/19/2025 12:00:25 PM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\StockAdjustment;
use App\Models\User;
use App\Models\Adjustment_Type;
use App\Models\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class StockAdjustmentController extends Controller{
	public function index(){
		$stockadjustments = StockAdjustment::paginate(10);
		return view("pages.erp.stockadjustment.index",["stockadjustments"=>$stockadjustments]);
	}
	public function create(){
		return view("pages.erp.stockadjustment.create",["users"=>User::all(),"adjustment_types"=>Adjustment_Type::all(),"warehouses"=>Warehouse::all()]);
	}
	public function store(Request $request){
		//StockAdjustment::create($request->all());
		$stockadjustment = new StockAdjustment;
		$stockadjustment->user_id=$request->user_id;
		$stockadjustment->adjustment_type_id=$request->adjustment_type_id;
		$stockadjustment->warehouse_id=$request->warehouse_id;
date_default_timezone_set("Asia/Dhaka");
		$stockadjustment->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stockadjustment->updated_at=date('Y-m-d H:i:s');

		$stockadjustment->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$stockadjustment = StockAdjustment::find($id);
		return view("pages.erp.stockadjustment.show",["stockadjustment"=>$stockadjustment]);
	}
	public function edit(StockAdjustment $stockadjustment){
		return view("pages.erp.stockadjustment.edit",["stockadjustment"=>$stockadjustment,"users"=>User::all(),"adjustment_types"=>Adjustment_Type::all(),"warehouses"=>Warehouse::all()]);
	}
	public function update(Request $request,StockAdjustment $stockadjustment){
		//StockAdjustment::update($request->all());
		$stockadjustment = StockAdjustment::find($stockadjustment->id);
		$stockadjustment->user_id=$request->user_id;
		$stockadjustment->adjustment_type_id=$request->adjustment_type_id;
		$stockadjustment->warehouse_id=$request->warehouse_id;
date_default_timezone_set("Asia/Dhaka");
		$stockadjustment->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stockadjustment->updated_at=date('Y-m-d H:i:s');

		$stockadjustment->save();

		return redirect()->route("stockadjustments.index")->with('success','Updated Successfully.');
	}
	public function destroy(StockAdjustment $stockadjustment){
		$stockadjustment->delete();
		return redirect()->route("stockadjustments.index")->with('success', 'Deleted Successfully.');
	}
}
?>
