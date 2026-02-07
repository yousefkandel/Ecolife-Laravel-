@extends('user.layouts.main')
@php
    $pageTitle = ' Cart Page';
@endphp

@section('section')
<div class="cart-main-area mtb-60px">
    <div class="container">
        <h3 class="cart-page-title">Your Cart Items</h3>
        <div class="row">
            <div class="col-12">

                {{-- فورم تحديث الكميات --}}
                <form id="update-cart-form" action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $grandTotal = 0; @endphp

                                @if(count($cartItems) > 0)
                                    @foreach($cartItems as $item)
                                        @php
                                            $subtotal = $item->product->price * $item->quantity;
                                            $grandTotal += $subtotal;
                                        @endphp
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img width="50%" src="{{ asset('storage/'.$item->product->image) }}" alt="{{ $item->product->name }}">
                                                </a>
                                            </td>
                                            <td class="product-name">{{ $item->product->name }}</td>
                                            <td class="product-price-cart">${{ $item->product->price }}</td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <div class="dec qtybutton">-</div>
                                                    <input class="cart-plus-minus-box" type="number" name="quantity[{{ $item->product->id }}]" value="{{ $item->quantity }}" min="1">
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">${{ $subtotal }}</td>
                                            <td class="product-remove">
                                                {{-- حذف المنتج --}}
                                                <form id="remove-{{ $item->product->id }}" action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>


                    {{-- أزرار التحكم --}}
                    <div class="cart-shiping-update-wrapper mt-3 d-flex justify-content-between">
                        <div class="cart-shiping-update">
                            <a href="{{ url('/') }}">Continue Shopping</a>
                        </div>
                        <div class="cart-clear d-flex gap-2">
                            {{-- تحديث الكميات --}}
                            <button type="submit" form="update-cart-form" class="btn btn-primary">
                                Update Shopping Cart
                            </button>

                            {{-- مسح الكارت بالكامل --}}
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Clear Shopping Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </form>
<div class="row">

                                <div class="col-lg-12 col-md-12">
                                    <div class="grand-totall">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                        </div>
                                        <h5>Total products <span>{{ $grandTotal }}EGP</span></h5>

                                        <a href="{{ route('checkout.index') }}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
</div>

{{-- JS أزرار + / - --}}
<script>
document.querySelectorAll('.inc').forEach(button => {
    button.addEventListener('click', () => {
        let input = button.previousElementSibling;
        input.value = parseInt(input.value) + 1;
    });
});

document.querySelectorAll('.dec').forEach(button => {
    button.addEventListener('click', () => {
        let input = button.nextElementSibling;
        if(parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
    });
});
</script>
@endsection
