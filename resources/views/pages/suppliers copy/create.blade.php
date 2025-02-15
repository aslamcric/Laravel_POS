@extends('layout.backend.main')

@section('page_content')
    <div class="container mt-1">
        <div class="card shadow-lg">
            <div class="card-header bg-warning">
                <h3 class="card-title mb-0">Create Supplier</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('supplier') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label fw-bold">Contact:</label>
                        <input type="text" name="contact" class="form-control" value="{{ old('contact') }}">
                        @error('contact')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address:</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary fw-bold">
                            <i class=""></i> Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
