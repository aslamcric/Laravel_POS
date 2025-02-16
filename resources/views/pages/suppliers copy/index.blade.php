@extends('layout.backend.main')

@section('page_content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card-header bg-warning text-white">
                <h3 class="card-title mb-0">Supplier List</h3>
            </div>
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <!-- Add Supplier Button -->
                    <div class="col-md-3">
                        <a class="btn btn-dark fw-bold" href="{{ url('supplier/create') }}">
                            <i class=""></i> Add Supplier
                        </a>
                    </div>

                    <!-- Search Form -->
                    <div class="col-md-9">
                        <form action="{{ url('supplier/search') }}" method="post" class="d-flex">
                            @csrf
                            <input type="text" class="form-control me-2" name="name" placeholder="Search by name..."
                                value="{{ @$requestdata }}">
                            <button class="btn btn-dark fw-bold">
                                Search
                            </button>
                        </form>
                    </div>

                </div>

                <!-- Supplier Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suppliers as $supplier)
                                <tr>
                                    <td class="text-center">{{ $supplier->id }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->contact }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td class="text-center">
                                        <a href="{{ url("supplier/{$supplier->id}") }}" class="btn btn-info btn-sm">
                                            <i class=""></i> Show
                                        </a>
                                        <a href="{{ url("supplier/{$supplier->id}/edit") }}"
                                            class="btn btn-warning btn-sm">
                                            <i class=""></i> Edit
                                        </a>
                                        <form action="{{ url("supplier/$supplier->id") }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">
                                                <i class=""></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-danger fw-bold">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-end mt-3">
                    {!! $suppliers->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
