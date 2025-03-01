@extends('layout.erp.app')
@section('title', 'Manage Purchase')
@section('style')


@endsection
@section('page')
    <a class="btn btn-primary" href="{{ route('purchases.create') }}">New Purchase</a>
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>Id</th>
                <th>Supplier Id</th>
                <th>Status Id</th>
                <th>Order Total</th>
                <th>Paid Amount</th>
                <th>Discount</th>
                <th>Vat</th>
                {{-- <th>Photo</th> --}}
                <th>Date</th>
                <th>Shipping Address</th>
                <th>Description</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    {{-- <td>{{$purchase->supplier_id}}</td> --}}
                    <td>{{ optional($purchase->supplier)->name }}</td>
                    <td>{{ $purchase->status_id }}</td>
                    <td>{{ $purchase->order_total }}</td>
                    <td>{{ $purchase->paid_amount }}</td>
                    <td>{{ $purchase->discount }}</td>
                    <td>{{ $purchase->vat }}</td>
                    {{-- <td><img src="{{asset('img/'.$purchase->photo)}}" width="100" /></td> --}}
                    <td>{{ $purchase->date }}</td>
                    <td>{{ optional($purchase->supplier)->address }}</td>
                    <td>{{$purchase->description}}</td>

                    <td>
                        <form action = "{{ route('purchases.destroy', $purchase->id) }}" method = "post">
                            <a class= 'btn btn-primary' href = "{{ route('purchases.show', $purchase->id) }}">View</a>
                            <a class= 'btn btn-success' href = "{{ route('purchases.edit', $purchase->id) }}"> Edit </a>
                            @method('DELETE')
                            @csrf
                            <input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-5">
        {!! $purchases->links('pagination::bootstrap-5') !!}
    </div>
@endsection
@section('script')


@endsection
