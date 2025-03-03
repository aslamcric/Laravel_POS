@extends('layout.erp.app')
@section('title', 'Purchase Report')
@section('style')
@endsection

@section('page')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="mb-4">Purchase Report</h2>

                    <form method="POST" action="{{ url('/purchase-report') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-control"
                                    value="{{ old('start_date', $startDate ?? '') }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="form-control"
                                    value="{{ old('end_date', $endDate ?? '') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label for="supplier_id" class="form-label">Supplier</label>
                                <select id="supplier_id" name="supplier_id" class="form-control">
                                    <option value="">All Suppliers</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ old('supplier_id', $supplierId ?? '') == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="payment_status_id" class="form-label">Payment Status</label>
                                <select id="payment_status_id" name="payment_status_id" class="form-control">
                                    <option value="">All Status</option>
                                    @foreach ($paymentStatuses as $status)
                                        <option value="{{ $status->id }}"
                                            {{ old('payment_status_id', $paymentStatusId ?? '') == $status->id ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                            </div>
                        </div>
                    </form>

                    @if (!empty($purchases))
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Supplier</th>
                                    <th>Payment Status</th>
                                    <th>Order Total</th>
                                    <th>Paid Amount</th>
                                    <th>Discount</th>
                                    <th>Vat</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->id }}</td>
                                        <td>{{ optional($purchase->supplier)->name }}</td>
                                        <td>{{ optional($purchase->payment_status)->name }}</td>
                                        <td>{{ number_format($purchase->order_total, 2) }}</td>
                                        <td>{{ number_format($purchase->paid_amount, 2) }}</td>
                                        <td>{{ number_format($purchase->discount, 2) }}</td>
                                        <td>{{ number_format($purchase->vat, 2) }}</td>
                                        <td>{{ $purchase->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-end fw-bold">Total Paid Amount:</td>
                                    <td class="fw-bold text-success">{{ number_format($totalPaid, 2) }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end fw-bold">Total Unpaid Amount:</td>
                                    <td class="fw-bold text-danger">{{ number_format($totalUnpaid, 2) }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end fw-bold">Total Pending Amount:</td>
                                    <td class="fw-bold text-warning">{{ number_format($totalPending, 2) }}</td>
                                    <td colspan="3"></td>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="mt-4 text-center">No purchases found for the selected date range.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
