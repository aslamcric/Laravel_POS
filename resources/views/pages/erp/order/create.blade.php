@extends('layout.erp.app')

@section('title', 'Create Order')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('page')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="invoice-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-address mb-4">
                                    <h6 class="fw-bold mb-2 text-primary">Invoice From:</h6>
                                    <ul class="list-unstyled">
                                        <li>Laravel POS</li>
                                        <li>Dhaka, Bangladesh</li>
                                        <li>Phone: 01793 956 777</li>
                                        <li>Email: mdaslamcric@gmail.com</li>
                                    </ul>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="invoice-address text-start mb-4 wow fadeInRight" data-wow-delay="0.3s">
                                    <h6 class="fw-bold mb-2 text-primary">Invoice To:</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">Customer Name</li>

                                        <select class="form-control mb-2" name="customer_id" id="customer_id">
                                            <option value="">Select Customer</option>
                                            @forelse ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @empty
                                                <option value="">No Customer Found</option>
                                            @endforelse
                                        </select>
                                        <li>Address: <span class="address"></span></li>
                                        <li>Email: <span class="email"></span>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-2">
                            <table class="table table-bordered">
                                <thead class="table-light text-white bg-primary">
                                    <tr>
                                        <th>Product/Service</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Discount</th>
                                        <th>Subtotal</th>
                                        <th><button class="btn btn-danger">Clear All</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <select class="form-control" name="product_id" id="product_id">
                                                <option value="">Select Product</option>
                                                @forelse ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}
                                                    </option>
                                                @empty
                                                    <option value="">No Product Found</option>
                                                @endforelse
                                            </select>
                                        </th>

                                        {{-- <th><input type="text" disabled class=" form-control p_description"></th> --}}
                                        <th>
                                            <textarea disabled class="form-control p_description" name="" id="" cols="30" rows="2"></textarea>
                                        </th>
                                        <th><input type="text" disabled class=" form-control p_price"></th>
                                        <th><input type="number" class=" form-control p_qty"></th>
                                        <th><input type="text" class=" form-control p_discount"></th>
                                        <th><input type="text" class=" form-control p_subtotal"></th>
                                        <th> <button class="btn btn-primary add_cart_btn">Add</button></th>
                                    </tr>
                                    <tr>
                                        <td>Product B</td>
                                        <td>Another great product</td>
                                        <td>$150.00</td>
                                        <td>1</td>
                                        <td>$15.00</td>
                                        <td>$135.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-end">Sub Total</td>
                                        <td>$325.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end">Tax (5%)</td>
                                        <td>$16.25</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold">Total</td>
                                        <td class="fw-bold">$341.25</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Buttons Section -->
                        <div class="d-flex justify-content-end mt-4">
                            <button class="btn btn-success me-2" onclick="processInvoice()">Process</button>
                            <button class="btn btn-primary" onclick="printInvoice()">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
    <script>
        // Process Invoice Function Placeholder
        function processInvoice() {
            alert("Processing invoice...");
        }

        // Print Invoice Function
        function printInvoice() {
            window.print();
        }

        function printInvoice() {
            // Hide the buttons after printing
            $('.btn').hide();

            // Trigger the print dialog
            window.print();
        }

        function printInvoice() {
            // Hide only the Process and Print buttons
            $('.btn-success, .btn-primary, .btn-danger').hide();

            // Trigger the print dialog
            window.print();
        }




        $(function() {

            // const cart = new Cart('order');
            // printCart();

            let cart= [];

            let token = "{{ csrf_token() }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            // Customer
            $('#customer_id').on('change', function() {

                let customer_id = $(this).val();
                $.ajax({
                    url: "{{ route('find_customer') }}",
                    type: 'post',
                    data: {
                        id: customer_id
                    },
                    success: function(res) {
                        // Logging the customer data for debugging
                        console.log(res);

                        // Displaying customer information if available
                        $(".address").text(res.customer?.address);
                        $(".email").text(res.customer?.email);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });


            // Product
            $('#product_id').on('change', function() {
                let product_id = $(this).val();
                $.ajax({
                    url: "{{ url('find_product') }}",
                    type: 'post',
                    data: {
                        id: product_id
                    },
                    success: function(res) {
                        console.log(res);

                        $(".p_description").val(res.product?.description);
                        $(".p_price").val(res.product?.price);
                        $(".p_qty").val(1);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });


            $('.add_cart_btn').on('click', function() {

                let item_id = $("#product_id").val();
                let name = $("#product_id option:selected").text();

                let price = $(".p_price").val();
                let qty = $(".p_qty").val();
                let discount = $(".p_discount").val();

                let total_discount = discount * qty;
                let subtotal = price * qty - total_discount;

                let item = {
                    "name": name,
                    "item_id": item_id,
                    "price": price,
                    "qty": parseFloat(qty),
                    "discount": discount,
                    'total_discount': total_discount,
                    "subtotal": subtotal
                };

                cart.save(item);
                printCart();

            });

            function printCart() {
                let cartdata = cart.getCart();
                if (cartdata) {


                    let htmldata = "";
                    let subtotal = 0;
                    let dicount = 0;
                    let grandtotal = 0;

                    cartdata.forEach(element => {
                        subtotal += element.subtotal
                        dicount += element.total_discount

                        htmldata += `
				 <tr>
					<td>
						 <button data="${element.item_id}" class='btn btn-danger remove'>-</button>
					</td>
					<td>
						<p class="fs-14">${element.name}</p>
					</td>
					<td>
						<p class="fs-14 text-gray">${element.name}</p>

					</td>
					<td><span class="fs-14 text-gray">$${element.price} </span></td>
					<td>
						<p class="fs-14 text-gray">${element.qty}</p>
					</td>
					<td><span class="fs-14 text-gray">$${element.total_discount} </span></td>
					<td><span class="fs-14 text-gray">$${element.subtotal} </span></td>
				</tr>
				`;
                    });

                    $('.dataAppend').html(htmldata);


                    $('.subtotal').html(subtotal);
                    $('.tax').html(subtotal * 5 / 100);
                    $('.Discount').html(dicount);
                    $('.grandtotal').html(subtotal + (subtotal * 5 / 100));
                    cartIconIncrease()
                }

            }

            $(document).on('click', '.remove', function() {
                let id = $(this).attr('data');
                cart.delItem(id);
                printCart();
            })


            $(document).on('click', '.clearAll', function() {
                cart.clearCart();
                printCart();
            });
            cartIconIncrease()

            function cartIconIncrease() {
                let items = cart.getCart().length
                $(".cartIcon").html(items);
            }

            $('.btn_process').on('click', function() {
                alert()
            })

        });
    </script>
@endsection
