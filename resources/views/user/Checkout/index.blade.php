@extends('user.layouts.main')
@php
    $pageTitle = ' Check Out Page';
@endphp

@section('section')

<div class="checkout-area mt-60px mb-40px">
    <div class="container">
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Billing Details -->
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <label>Country</label>
                                    <input type="text" name="country" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <label>Street Address</label>
                                    <input class="billing-address" placeholder="House number and street name" type="text" name="address" required>
                                    <input placeholder="Apartment, suite, unit etc." type="text" name="address2">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <label>Town / City</label>
                                    <input type="text" name="city" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>State / County</label>
                                    <input type="text" name="state" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Postcode / ZIP</label>
                                    <input type="text" name="zip" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Phone</label>
                                    <input type="text" name="phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Email Address</label>
                                    <input type="email" name="email" required>
                                </div>
                            </div>
                        </div>

                        <!-- Order Notes -->
                        <div class="additional-info-wrap mt-30">
                            <h4>Additional information</h4>
                            <div class="additional-info">
                                <label>Order notes</label>
                                <textarea placeholder="Notes about your order, e.g. special notes for delivery." name="notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-5">
                    <div class="your-order-area">
                        <h3>Your order</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Product</li>
                                        <li>Total</li>
                                    </ul>
                                </div>

                                <div class="your-order-middle">
                                    <ul>
                                  @foreach($cart as $item)
<li>
    <span class="order-middle-left">
        {{ $item->product?->name ?? 'Product not found' }} × {{ $item->quantity }}
    </span>
    <span class="order-price">${{ $item->subtotal }}</span>
</li>
@endforeach

                                    </ul>
                                </div>

                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Shipping</li>
                                        <li>Free shipping</li>
                                    </ul>
                                </div>

                                <div class="your-order-total">
                                    @php
                                        $total = collect($cart)->sum('subtotal');
                                    @endphp
                                    <ul>
                                        <li class="order-total">Total</li>
                                        <li>${{ $total }}</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="payment-method mt-30">
                                <h4>Payment Method</h4>
                            </div>
                        </div>

                        <!-- Place Order Button -->
                        <div class="Place-order mt-25">
                            <button type="submit" class="btn-hover">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
