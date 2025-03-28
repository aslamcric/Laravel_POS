<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/orderstatuse/_index.blade.php" was generated by ProBot AI.
* Date: 3/4/2025 10:28:36 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Manage OrderStatuse')
@section('style')


@endsection
@section('page')
<a href="{{route('orderstatuses.create')}}">New OrderStatuse</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($orderstatuses as $orderstatuse)
		<tr>
			<td>{{$orderstatuse->id}}</td>
			<td>{{$orderstatuse->name}}</td>
			<td>{{$orderstatuse->description}}</td>
			<td>{{$orderstatuse->created_at}}</td>
			<td>{{$orderstatuse->updated_at}}</td>

			<td>
			<form action = "{{route('orderstatuses.destroy',$orderstatuse->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('orderstatuses.show',$orderstatuse->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('orderstatuses.edit',$orderstatuse->id)}}"> Edit </a>
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
