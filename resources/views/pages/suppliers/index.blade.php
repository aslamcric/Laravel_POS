@extends('layout.backend.main')
@section('page_content')
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Supplier List</h4>
                    <div class="row d-flex">
                        <div class="col-md-3">
                            <a class="btn btn-primary" href="{{ url('supplier/create') }}">Register Supplier</a>
                        </div>
                        <form class="col-md-9" action="{{ url('supplier/search') }}" method="post">
                            @csrf
                            <div class="input">
                                <div class="d-flex">
                                    <input type="text" class="form-control" name="name" value="{{ @$requestdata }}"
                                        placeholder="Search by name">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->id }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>
                                            <img width="50" height="50"
                                                src="{{ asset('photo') }}/{{ $supplier->photo }}"
                                                alt="{{ $supplier->name }}">
                                        </td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>
                                            <!-- Show button with an eye icon -->
                                            <a class="btn btn-info btn-sm" href="{{ url("supplier/{$supplier->id}") }}">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <!-- Edit button with a pencil icon -->
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ url("supplier/{$supplier->id}/edit") }}">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>

                                            <!-- Delete button with a trash icon -->
                                            <form action="{{ url("supplier/{$supplier->id}") }}" method="post"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Data Not Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        {!! $suppliers->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
