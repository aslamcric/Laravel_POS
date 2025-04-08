@extends('layout.erp.app')
@section('title', 'Manage Customer')

@section('style')
    <!-- Add any custom styles here -->
@endsection

@section('page')
    <a class="btn btn-primary" href="{{ route('customers.create') }}">New Customer</a>
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td><img src="{{ asset('img/' . ($customer->photo ? $customer->photo : 'default.jpg')) }}" width="100" /></td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->address }}</td>

                    <td>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                            <a class="btn btn-primary" href="{{ route('customers.show', $customer->id) }}">View</a>
                            <a class="btn btn-success" href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-5">
        {!! $customers->links('pagination::bootstrap-5') !!}
    </div>
@endsection

@section('script')
    <!-- Add any custom scripts here -->
@endsection
