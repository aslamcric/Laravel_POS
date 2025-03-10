@extends('layout.erp.app')
@section('title', 'Show Order')

@section('page')

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="invoice-wrap" id="invoice">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-address mb-4">
                                    <h6 class="fw-bold mb-2 text-primary">Order Invoice From:</h6>
                                    <ul class="list-unstyled">
                                        <li>Invoice: IN-100{{ $order->id }}</li>
                                        <li>Phone: 01793 956 777</li>
                                        <li>Email: mdaslamcric@gmail.com</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="invoice-address text-start mb-4">
                                    <h6 class="fw-bold mb-2 text-primary">Invoice To:</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">Customer Name: {{ optional($order->customers)->name }}</li>
                                        <li>Address: {{ optional($order->customers)->address }}</li>
                                        <li>Email: {{ optional($order->customers)->email }}</li>
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
                                        {{-- <th>Description</th> --}}
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = null;
                                        $total = null;

                                    @endphp
                                    @foreach ($orderdetails as $orderdetail)
                                        <tr>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td>{{ optional($orderdetail->products)->name }}</td>
                                            <td>{{ $orderdetail->qty }}</td>
                                            <td>{{ $orderdetail->price }}</td>
                                            <td>{{ $orderdetail->discount }}</td>
                                            <td>{{ $subtotal+=$orderdetail->price*$orderdetail->qty }}</td>
                                        </tr>
                                        @php
                                        // $subtotal = null;
                                        $total+= $subtotal;

                                    @endphp

                                    @endforeach

                                    @php
                                        // $subtotal = null;
                                        $total+= $subtotal;

                                    @endphp


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-end">Total</td>
                                        <td>{{ $total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end">Tax (5%)</td>
                                        <td>$6.25</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end">Discount</td>
                                        <td>$5.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold">Grand Total</td>
                                        <td class="fw-bold">$126.25</td>
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
            // Print Button Hide
            document.getElementById('printButton').style.display = 'none';

            // Print Invoice
            window.print();

            // Print Button Show Again After Print
            setTimeout(() => {
                document.getElementById('printButton').style.display = 'block';
            }, 1000);
        }
    </script>
@endsection
