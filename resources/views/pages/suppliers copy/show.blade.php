@extends('layout.backend.main')

@section('page_content')
    <div class="container mt-1">
        <div class="card shadow-lg">
            <div class="card-header bg-warning text-white">
                <h3 class="card-title mb-0">Show Supplier</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('supplier/{id}') }}" method="get">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name:</label>
                        <input disabled type="text" name="name" class="form-control" value="{{ $supplier['name'] }}">
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label fw-bold">Contact:</label>
                        <input disabled type="text" name="contact" class="form-control" value="{{ $supplier['contact'] }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email:</label>
                        <input disabled type="email" name="email" class="form-control" value="{{ $supplier['email'] }}">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address:</label>
                        <input disabled type="text" name="address" class="form-control" value="{{ $supplier['address'] }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
