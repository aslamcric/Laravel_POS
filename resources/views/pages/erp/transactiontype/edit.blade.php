<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/transactiontype/_edit.blade.php" was generated by ProBot AI.
* Date: 2/19/2025 11:59:10 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Edit TransactionType')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('transactiontypes.index')}}">Manage</a>
<form action="{{route('transactiontypes.update',$transactiontype)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$transactiontype->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="factor" class="col-sm-2 col-form-label">Factor</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="factor" value="{{$transactiontype->factor}}" id="factor" placeholder="Factor">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
