<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/purchasereturndetail/_edit.blade.php" was generated by ProBot AI.
* Date: 3/5/2025 11:31:32 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Edit PurchaseReturnDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('purchasereturndetails.index')}}">Manage</a>
<form action="{{route('purchasereturndetails.update',$purchasereturndetail)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="purchase_return_id" class="col-sm-2 col-form-label">Purchase_Return</label>
	<div class="col-sm-10">
		<select class="form-control" name="purchase_return_id" id="purchase_return_id">
			@foreach($purchase_returns as $purchase_return)
				@if($purchase_return->id==$purchasereturndetail->purchase_return_id)
					<option value="{{$purchase_return->id}}" selected>{{$purchase_return->name}}</option>
				@else
					<option value="{{$purchase_return->id}}">{{$purchase_return->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="product_id" class="col-sm-2 col-form-label">Product</label>
	<div class="col-sm-10">
		<select class="form-control" name="product_id" id="product_id">
			@foreach($products as $product)
				@if($product->id==$purchasereturndetail->product_id)
					<option value="{{$product->id}}" selected>{{$product->name}}</option>
				@else
					<option value="{{$product->id}}">{{$product->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="qty" class="col-sm-2 col-form-label">Qty</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="qty" value="{{$purchasereturndetail->qty}}" id="qty" placeholder="Qty">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$purchasereturndetail->price}}" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="discount" class="col-sm-2 col-form-label">Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount" value="{{$purchasereturndetail->discount}}" id="discount" placeholder="Discount">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
