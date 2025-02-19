<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "resources/views/customer/_create.blade.php" was generated by ProBot AI.
* Date: 2/19/2025 9:26:40 AM
* Contact: towhid1@outlook.com
*/
?>
@extends('layout.erp.app')
@section('title','Create Customer')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('customers.index')}}">Manage</a>
<form action="{{route('customers.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo" id="photo" placeholder="Photo">
	</div>
</div>
<div class="row mb-3">
	<label for="phone" class="col-sm-2 col-form-label">Phone</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="phone" id="phone" placeholder="Phone">
	</div>
</div>
<div class="row mb-3">
	<label for="email" class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="email" id="email" placeholder="Email">
	</div>
</div>
<div class="row mb-3">
	<label for="address" class="col-sm-2 col-form-label">Address</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="address" id="address" placeholder="Address">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
