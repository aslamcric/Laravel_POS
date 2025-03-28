<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/orderdetail/_show.blade.php" was generated by ProBot AI.
* Date: 2/19/2025 11:57:43 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Show OrderDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('orderdetails.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$orderdetail->id}}</td></tr>
		<tr><th>Order Id</th><td>{{$orderdetail->order_id}}</td></tr>
		<tr><th>Product Id</th><td>{{$orderdetail->product_id}}</td></tr>
		<tr><th>Qty</th><td>{{$orderdetail->qty}}</td></tr>
		<tr><th>Price</th><td>{{$orderdetail->price}}</td></tr>
		<tr><th>Vat</th><td>{{$orderdetail->vat}}</td></tr>
		<tr><th>Uom Id</th><td>{{$orderdetail->uom_id}}</td></tr>
		<tr><th>Discount</th><td>{{$orderdetail->discount}}</td></tr>
		<tr><th>Created At</th><td>{{$orderdetail->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$orderdetail->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
