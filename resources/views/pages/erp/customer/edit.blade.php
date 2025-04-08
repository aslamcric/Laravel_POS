@extends('layout.erp.app')
@section('title', 'Edit Customer')
@section('style')
<!-- Add any custom styles if needed -->
@endsection

@section('page')
<a class='btn btn-success' href="{{ route('customers.index') }}">Manage</a>

<form action="{{ route('customers.update', $customer) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value="{{ $customer->name }}" id="name" placeholder="Name">
        </div>
    </div>

    <div class="row mb-3">
        <label for="photo" class="col-sm-2 col-form-label">Photo</label>
        <div class="col-sm-10">
            <!-- Display current photo if exists -->
            @if ($customer->photo)
                <img src="{{ asset('uploads/' . $customer->photo) }}" alt="Customer Photo" class="img-fluid mb-2" style="max-height: 100px;">
            @endif
            <input type="file" class="form-control" name="photo" id="photo" placeholder="Photo">
        </div>
    </div>

    <div class="row mb-3">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}" id="phone" placeholder="Phone">
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" value="{{ $customer->email }}" id="email" placeholder="Email">
        </div>
    </div>

    <div class="row mb-3">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" value="{{ $customer->address }}" id="address" placeholder="Address">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection

@section('script')
<!-- Add any custom scripts if needed -->
@endsection
