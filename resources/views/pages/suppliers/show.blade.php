@extends('layout.backend.main')

@section('page_content')

<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h4 class="card-title mb-0">Register Supplier</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('supplier/{$supplier->id}') }}" method="get" enctype="multipart/form-data">
                   
                    <!-- Supplier Name -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $supplier['name'] ?? '') }}">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Phone</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $supplier['phone'] ?? '') }}">
                            @error('phone')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9">
                            <input type="email" class="form-control" name="email" value="{{ old('email', $supplier['email'] ?? '') }}">
                            @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Address</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="address" value="{{ old('address', $supplier['address'] ?? '') }}">
                            @error('address')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Photo Upload -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Photo</label>
                        <div class="col-lg-9">
                            @if(!empty($supplier['photo']))
                                <img src="{{ asset('photos/' . $supplier['photo']) }}" alt="{{ $supplier['name'] }}" width="50">
                            @endif
                            <input type="file" class="form-control" name="photo">
                            @error('photo')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

        
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
