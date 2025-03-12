@extends('layout.erp.app')

@section('title', 'Create Order')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('page')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="invoice-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-address mb-4">
                                    <h6 class="fw-bold mb-2 text-primary">Order Invoice From:</h6>
                                    <ul class="list-unstyled">
                                        <li>Laravel POS</li>
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
                                        <li>Email: <span class="email"></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-2">
                            <table class="table table-bordered">
                                <thead class="table-light text-white bg-primary">
                                    <tr>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Discount</th>
                                        <th>Subtotal</th>
                                        <th><button class="btn btn-danger clearAll">Clear All</button></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <select class="form-control" name="product_id" id="product_id">
                                                <option value="">Select Product</option>
                                                @forelse ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @empty
                                                    <option value="">No Product Found</option>
                                                @endforelse
                                            </select>
                                        </th>

                                        <th>
                                            <textarea disabled class="form-control p_description" name="" id="" cols="30" rows="2"></textarea>
                                        </th>
                                        <th><input type="text" disabled class="form-control p_price"></th>
                                        <th><input type="number" class="form-control p_qty"></th>
                                        <th><input type="text" class="form-control p_discount"></th>
                                        <th><input type="text" class="form-control p_subtotal"></th>
                                        <th><button class="btn btn-success add_cart_btn">Add</button></th>
                                    </tr>
                                </thead>
                                <tbody class="dataAppend">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-end p_subtotal">Sub Total</td>
                                        <td class="subtotal">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end">Tax (5%)</td>
                                        <td class="tax">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end">Discount</td>
                                        <td class="Discount">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold">Total</td>
                                        <td class="grandtotal fw-bold">$0.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Buttons Section -->
                        <div class="d-flex justify-content-end mt-4">
                            {{-- <a class="btn btn-success me-2 btn_process">Process</a> --}}
                            <a class="btn btn-success me-2 btn_process" href="{{ url('orders') }}">Process</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            // Initialize cart
            const cart = new Cart('order');
            printCart();

            let token = "{{ csrf_token() }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            // Customer change event
            $('#customer_id').on('change', function() {
                let customer_id = $(this).val();
                if (customer_id) {
                    $.ajax({
                        url: "{{ route('find_customer') }}",
                        type: 'POST',
                        data: {
                            id: customer_id
                        },
                        success: function(res) {
                            $(".address").text(res.customer?.address || 'N/A');
                            $(".email").text(res.customer?.email || 'N/A');
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });

            // Product change event
            $('#product_id').on('change', function() {
                let product_id = $(this).val();
                if (product_id) {
                    $.ajax({
                        url: "{{ url('find_product') }}",
                        type: 'POST',
                        data: {
                            id: product_id
                        },
                        success: function(res) {
                            if (res.product) {
                                $(".p_description").val(res.product.description);
                                $(".p_price").val(res.product.price);
                                $(".p_qty").val(1);
                                updateTotalandSubtotal();
                            } else {
                                $(".p_description").val('');
                                $(".p_price").val('');
                                $(".p_qty").val(0);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });

            // Update total and subtotal when qty, price, or discount changes
            $(document).on("input", ".p_qty, .p_price, .p_discount", function() {
                updateTotalandSubtotal();
            });

            function updateTotalandSubtotal() {
                let qty = parseFloat($('.p_qty').val()) || 0;
                let price = parseFloat($('.p_price').val()) || 0;
                let discount = parseFloat($('.p_discount').val()) || 0;

                let total = qty * price;
                let subtotal = total - discount;

                $(".p_subtotal").val(subtotal.toFixed(2));
            }

            // Add item to cart
            $('.add_cart_btn').on('click', function() {
                let item_id = $("#product_id").val();
                let name = $("#product_id option:selected").text();

                let price = parseFloat($(".p_price").val()) || 0;
                let qty = parseFloat($(".p_qty").val()) || 0;
                let discount = parseFloat($(".p_discount").val()) || 0;
                let description = $(".p_description").val() || ""; // Ensure description is defined

                let total_discount = discount;
                let subtotal = price * qty - total_discount;

                let item = {
                    "name": name,
                    "item_id": item_id,
                    "description": description,
                    "price": price,
                    "qty": qty,
                    "discount": discount,
                    "total_discount": total_discount,
                    "subtotal": subtotal
                };

                cart.save(item);
                printCart();

                // Clear input fields after adding to cart
                $("#product_id").val("");
                $(".p_price").val("");
                $(".p_qty").val("");
                $(".p_discount").val("");
                $(".p_description").val("");
            });

            // Update cart display
            function printCart() {
                let cartdata = cart.getCart();
                if (cartdata) {
                    let htmldata = "";
                    let subtotal = 0;
                    let discount = 0;
                    let grandtotal = 0;

                    cartdata.forEach(element => {
                        subtotal += element.subtotal;
                        discount += element.total_discount;

                        htmldata += `
                            <tr>
                                <td><p class="fs-14">${element.name}</p></td>
                                <td><p class="fs-14 text-gray">${element.description}</p></td>
                                <td><span class="fs-14 text-gray">$${element.price}</span></td>
                                <td><p class="fs-14 text-gray">${element.qty}</p></td>
                                <td><span class="fs-14 text-gray">$${element.total_discount}</span></td>
                                <td><span class="fs-14 text-gray">$${element.subtotal}</span></td>
                                <td><button data="${element.item_id}" class='btn btn-danger remove'>Remove</button></td>
                            </tr>
                        `;
                    });

                    $('.dataAppend').html(htmldata);
                    $('.subtotal').html(subtotal.toFixed(2));
                    $('.tax').html((subtotal * 5 / 100).toFixed(2));
                    $('.Discount').html(discount.toFixed(2));
                    $('.grandtotal').html((subtotal + (subtotal * 5 / 100)).toFixed(2));
                }
            }

            // Remove item from cart
            $(document).on('click', '.remove', function() {
                let id = $(this).attr('data');
                cart.delItem(id);
                printCart();
            });

            // Clear all items from cart
            $(document).on('click', '.clearAll', function() {
                cart.clearCart();
                printCart();
            });

            // Process order
            $('.btn_process').on('click', function() {
                let customer_id = $('#customer_id').val();
                let order_total = $('.grandtotal').text();
                let paid_amount = $('.grandtotal').text();
                let discount = $('.Discount').text();
                let vat = $('.tax').text();
                let products = cart.getCart();

                // Send the order data via AJAX
                $.ajax({
                    url: "{{ url('api/orders') }}",
                    type: 'Post',
                    data: {
                        customer_id: customer_id,
                        order_total: order_total,
                        paid_amount: paid_amount,
                        discount: discount,
                        vat: vat,
                        products: products,
                    },
                    success: function(res) {
                        console.log(res);

                        // Clear the cart after successful order processing
                        cart.clearCart();
                        printCart();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }

                });
            });

        });
    </script>

    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
