<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/orderstatuse/_edit.blade.php" was generated by ProBot AI.
* Date: 3/4/2025 10:28:36 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Edit OrderStatuse')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('orderstatuses.index')}}">Manage</a>
<form action="{{route('orderstatuses.update',$orderstatuse)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$orderstatuse->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="description" class="col-sm-2 col-form-label">Description</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="description" value="{{$orderstatuse->description}}" id="description" placeholder="Description">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
