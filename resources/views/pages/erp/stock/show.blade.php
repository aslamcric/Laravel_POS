<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/stock/_show.blade.php" was generated by ProBot AI.
* Date: 2/19/2025 11:58:38 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Show Stock')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('stocks.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$stock->id}}</td></tr>
		<tr><th>Product Id</th><td>{{$stock->product_id}}</td></tr>
		<tr><th>Transaction Type Id</th><td>{{$stock->transaction_type_id}}</td></tr>
		<tr><th>Warehouse Id</th><td>{{$stock->warehouse_id}}</td></tr>
		<tr><th>Qty</th><td>{{$stock->qty}}</td></tr>
		<tr><th>Uom Id</th><td>{{$stock->uom_id}}</td></tr>
		<tr><th>Remark</th><td>{{$stock->remark}}</td></tr>
		<tr><th>Created At</th><td>{{$stock->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$stock->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
