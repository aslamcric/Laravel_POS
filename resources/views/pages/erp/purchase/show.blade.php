@extends('layout.erp.app')
@section('title', 'Show Purchase')

@section('page')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="invoice-wrap" id="invoice">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-address mb-4">
                                    <h6 class="fw-bold mb-2 text-primary">Purchase Invoice From:</h6>
                                    <ul class="list-unstyled">
                                        <li>Invoice: NO-100{{ $purchase->id }}</li>
                                        <li>Dhaka, Bangladesh</li>
                                        <li>Phone: 01793 956 777</li>
                                        <li>Email: mdaslamcric@gmail.com</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="invoice-address text-start mb-4">
                                    <h6 class="fw-bold mb-2 text-primary">Invoice To:</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">Supplier Name: {{ optional($purchase->supplier)->name }}</li>
                                        <li>Address: {{ optional($purchase->supplier)->address }}</li>
                                        <li>Email: {{ optional($purchase->supplier)->email }}</li>
                                        <li>Phone: {{ optional($purchase->supplier)->phone }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-2">
                            <table class="table table-bordered">
                                <thead class="table-light text-white bg-primary">
                                    <tr>
                                        <th>SL</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $total_discount = 0;
                                    @endphp
                                    @foreach ($purchasedetails as $purchasedetail)
                                        @php
                                            $subtotal = ($purchasedetail->price * $purchasedetail->qty) - $purchasedetail->discount;
                                            $total += $subtotal;
                                            $total_discount += $purchasedetail->discount;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ optional($purchasedetail->products)->name }}</td>
                                            <td>{{ $purchasedetail->qty }}</td>
                                            <td>{{ number_format($purchasedetail->price, 2) }}</td>
                                            <td>{{ number_format($purchasedetail->discount, 2) }}</td>
                                            <td>{{ number_format($subtotal, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                @php
                                    $tax = $total * 0.05;
                                    $grandTotal = $total + $tax - $total_discount;
                                @endphp

                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-end">Total</td>
                                        <td>{{ number_format($total, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end">Tax (5%)</td>
                                        <td>{{ number_format($tax, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end">Total Discount</td>
                                        <td>{{ number_format($total_discount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold">Grand Total</td>
                                        <td class="fw-bold">{{ number_format($grandTotal, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button id="printButton" class="btn btn-success me-2" onclick="printInvoice()">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function printInvoice() {
            document.getElementById('printButton').style.display = 'none';
            window.print();
            setTimeout(() => {
                document.getElementById('printButton').style.display = 'block';
            }, 1000);
        }
    </script>
@endsection
