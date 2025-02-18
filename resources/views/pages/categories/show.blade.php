@extends('layout.backend.main')

@section('page_content')

<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Show Category</h4>
                <!-- Back Button -->
                <a href="{{ url('category') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('categories/{$category->id}') }}" method="get" enctype="multipart/form-data">

                    <!-- Category Name -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-9">
                            <input disabled type="text" class="form-control" name="name" value="{{ old('name', $category['name'] ?? '') }}">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Description</label>
                        <div class="col-lg-9">
                            <textarea disabled class="form-control" name="description">{{ old('description', $category['description'] ?? '') }}</textarea>
                        </div>
                    </div>

                    <!-- Created At -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Created At</label>
                        <div class="col-lg-9">
                            <input disabled type="text" class="form-control" name="created_at" value="{{ old('created_at', $category['created_at'] ?? '') }}">
                        </div>
                    </div>

                    <!-- Updated At -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Updated At</label>
                        <div class="col-lg-9">
                            <input disabled type="text" class="form-control" name="updated_at" value="{{ old('updated_at', $category['updated_at'] ?? '') }}">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
