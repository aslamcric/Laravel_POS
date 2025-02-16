@extends('layout.backend.main')

@section('page_content')

<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Show Supplier</h4>
                <!-- Back Button -->
                <a href="{{ url('supplier') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('supplier/{$supplier->id}') }}" method="get" enctype="multipart/form-data">

                    <!-- Supplier Name -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-9">
                            <input disabled type="text" class="form-control" name="name" value="{{ old('name', $supplier['name'] ?? '') }}">
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Phone</label>
                        <div class="col-lg-9">
                            <input disabled type="text" class="form-control" name="phone" value="{{ old('phone', $supplier['phone'] ?? '') }}">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9">
                            <input disabled type="email" class="form-control" name="email" value="{{ old('email', $supplier['email'] ?? '') }}">
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Address</label>
                        <div class="col-lg-9">
                            <input disabled type="text" class="form-control" name="address" value="{{ old('address', $supplier['address'] ?? '') }}">
                        </div>
                    </div>

                    <!-- Photo Upload -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Photo</label>
                        <div class="col-lg-9">
                            @if(!empty($supplier['photo']))
                                <img src="{{ asset('photo/' . $supplier['photo']) }}" alt="{{ $supplier['name'] }}" width="50">
                            @endif
                            <input type="file" class="form-control" name="photo">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
