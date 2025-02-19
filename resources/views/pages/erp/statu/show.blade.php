<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/statu/_show.blade.php" was generated by ProBot AI.
* Date: 2/19/2025 9:25:57 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Show Statu')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('status.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$statu->id}}</td></tr>
		<tr><th>Name</th><td>{{$statu->name}}</td></tr>
		<tr><th>Created At</th><td>{{$statu->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$statu->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
