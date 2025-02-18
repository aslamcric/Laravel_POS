<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/manufacturer/_show.blade.php" was generated by ProBot AI.
* Date: 2/18/2025 1:03:21 PM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Show Manufacturer')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('manufacturers.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$manufacturer->id}}</td></tr>
		<tr><th>Name</th><td>{{$manufacturer->name}}</td></tr>
		<tr><th>Phone</th><td>{{$manufacturer->phone}}</td></tr>
		<tr><th>Email</th><td>{{$manufacturer->email}}</td></tr>
		<tr><th>Address</th><td>{{$manufacturer->address}}</td></tr>
		<tr><th>Created At</th><td>{{$manufacturer->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$manufacturer->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
