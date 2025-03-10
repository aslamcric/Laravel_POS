<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_ManufacturerController.php" was generated by ProBot AI.
* Date: 2/18/2025 1:03:11 PM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Manufacturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ManufacturerController extends Controller{
	public function index(){
		$manufacturers = Manufacturer::paginate(10);
		return view("pages.erp.manufacturer.index",["manufacturers"=>$manufacturers]);
	}
	public function create(){
		return view("pages.erp.manufacturer.create",[]);
	}
	public function store(Request $request){
		//Manufacturer::create($request->all());
		$manufacturer = new Manufacturer;
		$manufacturer->name=$request->name;
		$manufacturer->phone=$request->phone;
		$manufacturer->email=$request->email;
		$manufacturer->address=$request->address;
date_default_timezone_set("Asia/Dhaka");
		$manufacturer->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$manufacturer->updated_at=date('Y-m-d H:i:s');

		$manufacturer->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$manufacturer = Manufacturer::find($id);
		return view("pages.erp.manufacturer.show",["manufacturer"=>$manufacturer]);
	}
	public function edit(Manufacturer $manufacturer){
		return view("pages.erp.manufacturer.edit",["manufacturer"=>$manufacturer,]);
	}
	public function update(Request $request,Manufacturer $manufacturer){
		//Manufacturer::update($request->all());
		$manufacturer = Manufacturer::find($manufacturer->id);
		$manufacturer->name=$request->name;
		$manufacturer->phone=$request->phone;
		$manufacturer->email=$request->email;
		$manufacturer->address=$request->address;
date_default_timezone_set("Asia/Dhaka");
		$manufacturer->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$manufacturer->updated_at=date('Y-m-d H:i:s');

		$manufacturer->save();

		return redirect()->route("manufacturers.index")->with('success','Updated Successfully.');
	}
	public function destroy(Manufacturer $manufacturer){
		$manufacturer->delete();
		return redirect()->route("manufacturers.index")->with('success', 'Deleted Successfully.');
	}
}
?>
