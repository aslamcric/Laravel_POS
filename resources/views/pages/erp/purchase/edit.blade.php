<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/purchase/_edit.blade.php" was generated by ProBot AI.
* Date: 2/19/2025 11:58:05 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Edit Purchase')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('purchases.index')}}">Manage</a>
<form action="{{route('purchases.update',$purchase)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="supplier_id" class="col-sm-2 col-form-label">Supplier</label>
	<div class="col-sm-10">
		<select class="form-control" name="supplier_id" id="supplier_id">
			@foreach($suppliers as $supplier)
				@if($supplier->id==$purchase->supplier_id)
					<option value="{{$supplier->id}}" selected>{{$supplier->name}}</option>
				@else
					<option value="{{$supplier->id}}">{{$supplier->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="status_id" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="status_id" id="status_id">
			@foreach($status as $status)
				@if($status->id==$purchase->status_id)
					<option value="{{$status->id}}" selected>{{$status->name}}</option>
				@else
					<option value="{{$status->id}}">{{$status->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="order_total" class="col-sm-2 col-form-label">Order Total</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="order_total" value="{{$purchase->order_total}}" id="order_total" placeholder="Order Total">
	</div>
</div>
<div class="row mb-3">
	<label for="paid_amount" class="col-sm-2 col-form-label">Paid Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="paid_amount" value="{{$purchase->paid_amount}}" id="paid_amount" placeholder="Paid Amount">
	</div>
</div>
<div class="row mb-3">
	<label for="discount" class="col-sm-2 col-form-label">Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount" value="{{$purchase->discount}}" id="discount" placeholder="Discount">
	</div>
</div>
<div class="row mb-3">
	<label for="vat" class="col-sm-2 col-form-label">Vat</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="vat" value="{{$purchase->vat}}" id="vat" placeholder="Vat">
	</div>
</div>
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo"  id="photo" placeholder="Photo">
	</div>
</div>
<div class="row mb-3">
	<label for="date" class="col-sm-2 col-form-label">Date</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="date" value="{{$purchase->date}}" id="date" placeholder="Date">
	</div>
</div>
<div class="row mb-3">
	<label for="shipping_address" class="col-sm-2 col-form-label">Shipping Address</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="shipping_address" value="{{$purchase->shipping_address}}" id="shipping_address" placeholder="Shipping Address">
	</div>
</div>
<div class="row mb-3">
	<label for="description" class="col-sm-2 col-form-label">Description</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="description" value="{{$purchase->description}}" id="description" placeholder="Description">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
