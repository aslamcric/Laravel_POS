<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/stockadjustmentdetail/_index.blade.php" was generated by ProBot AI.
* Date: 2/19/2025 12:01:00 PM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Manage StockAdjustmentDetail')
@section('style')


@endsection
@section('page')
<a href="{{route('stockadjustmentdetails.create')}}">New StockAdjustmentDetail</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Stock Adjustment Id</th>
			<th>Product Id</th>
			<th>Qty</th>
			<th>Price</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($stockadjustmentdetails as $stockadjustmentdetail)
		<tr>
			<td>{{$stockadjustmentdetail->id}}</td>
			<td>{{$stockadjustmentdetail->stock_adjustment_id}}</td>
			<td>{{$stockadjustmentdetail->product_id}}</td>
			<td>{{$stockadjustmentdetail->qty}}</td>
			<td>{{$stockadjustmentdetail->price}}</td>

			<td>
			<form action = "{{route('stockadjustmentdetails.destroy',$stockadjustmentdetail->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('stockadjustmentdetails.show',$stockadjustmentdetail->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('stockadjustmentdetails.edit',$stockadjustmentdetail->id)}}"> Edit </a>
				@method('DELETE')
				@csrf
				<input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
			</form>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
@section('script')


@endsection
