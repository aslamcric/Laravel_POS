<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_TransactionTypeController.php" was generated by ProBot AI.
* Date: 2/19/2025 11:59:09 AM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\TransactionType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class TransactionTypeController extends Controller{
	public function index(){
		$transactiontypes = TransactionType::paginate(10);
		return view("pages.erp.transactiontype.index",["transactiontypes"=>$transactiontypes]);
	}
	public function create(){
		return view("pages.erp.transactiontype.create",[]);
	}
	public function store(Request $request){
		//TransactionType::create($request->all());
		$transactiontype = new TransactionType;
		$transactiontype->name=$request->name;
		$transactiontype->factor=$request->factor;
date_default_timezone_set("Asia/Dhaka");
		$transactiontype->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$transactiontype->updated_at=date('Y-m-d H:i:s');

		$transactiontype->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$transactiontype = TransactionType::find($id);
		return view("pages.erp.transactiontype.show",["transactiontype"=>$transactiontype]);
	}
	public function edit(TransactionType $transactiontype){
		return view("pages.erp.transactiontype.edit",["transactiontype"=>$transactiontype,]);
	}
	public function update(Request $request,TransactionType $transactiontype){
		//TransactionType::update($request->all());
		$transactiontype = TransactionType::find($transactiontype->id);
		$transactiontype->name=$request->name;
		$transactiontype->factor=$request->factor;
date_default_timezone_set("Asia/Dhaka");
		$transactiontype->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$transactiontype->updated_at=date('Y-m-d H:i:s');

		$transactiontype->save();

		return redirect()->route("transactiontypes.index")->with('success','Updated Successfully.');
	}
	public function destroy(TransactionType $transactiontype){
		$transactiontype->delete();
		return redirect()->route("transactiontypes.index")->with('success', 'Deleted Successfully.');
	}
}
?>
