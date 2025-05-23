<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/purchasestatuse/_edit.blade.php" was generated by ProBot AI.
* Date: 3/5/2025 10:48:34 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Edit PurchaseStatuse')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('purchasestatuses.index')}}">Manage</a>
<form action="{{route('purchasestatuses.update',$purchasestatuse)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$purchasestatuse->name}}" id="name" placeholder="Name">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
