@extends('layout.erp.app')

@section('page')

<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Update Category</h4>
                <!-- Back Button -->
                <a href="{{ url('category') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url("category/{$category['id']}") }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control" name="id" value="{{ $category['id'] }}">

                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Category Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $category['name']) }}">
                            @error('name')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Description</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="description">{{ old('description', $category['description']) }}</textarea>
                            @error('description')
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
