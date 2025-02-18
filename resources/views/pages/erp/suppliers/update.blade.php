@extends('layout.erp.app')

@section('page')

<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Update Supplier</h4>
                <!-- Back Button -->
                <a href="{{ url('supplier') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url("supplier/{$supplier['id']}") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control" name="id" value="{{ $supplier['id'] }}">

                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $supplier['name']) }}">
                            @error('name')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Phone</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $supplier['phone']) }}">
                            @error('phone')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9">
                            <input type="email" class="form-control" name="email" value="{{ old('email', $supplier['email']) }}">
                            @error('email')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Address</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="address" value="{{ old('address', $supplier['address']) }}">
                            @error('address')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Photo</label>
                        <div class="col-lg-9">
                            @if ($supplier['photo'])
                                <img width="50" src="{{ asset('photo/' . $supplier['photo']) }}" alt="{{ $supplier['name'] }}">
                            @endif
                            <input type="file" class="form-control" name="photo">
                            @error('photo')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                     <!-- Update Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
