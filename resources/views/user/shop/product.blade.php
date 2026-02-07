@php
    $adminAssets = asset('user/assets');
@endphp
@extends('user.layouts.main')
@php
    $pageTitle = ' Shop Page';
@endphp

@section('section')
{{-- @include('user.layouts.banner') --}}

<!-- Shop Category Area Start -->
<div class="shop-category-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <!-- Shop Top Area Start -->
                <div class="shop-top-bar">
                    <!-- Left Side start -->

                    <!-- Left Side End -->
                </div>
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area mt-35">
                    <!-- Shop Tab Content Start -->
                    <div class="tab-content jump">
                        <!-- Grid View -->
                        <div id="shop-grid" class="tab-pane active">
                            <div class="row">
                                @foreach($products as $product)
                                <div class="col-md-4 col-sm-6">
                                    <article class="list-product">
                                        <div class="img-block">
                                            <a href="#" class="thumbnail">
                                                <img class="first-img" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" />
                                            </a>
                                        </div>

                                        <div class="product-decs">
                                            <a class="inner-link" href="{{ route('shop.index', $product->category->id) }}">
                                                <span>{{ $product->category->name }}</span>
                                            </a>

                                            <h2>
                                                <a href="#" class="product-link">{{ $product->name }}</a>
                                            </h2>

                                            <div class="pricing-meta">
                                                <ul>
                                                    <li class="current-price">{{ $product->price }} جنيه</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="add-to-link">
                                            <ul>
                                                <li class="cart">
                                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                        @csrf
                                                        <button class="cart-btn">ADD TO CART</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Grid View End -->

                        <!-- List View -->
                        <div id="shop-list" class="tab-pane">
                            @foreach($products as $product)
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <h4>{{ $product->name }}</h4>
                                    <p>Category: <a href="{{ route('shop.index', $product->category->id) }}">{{ $product->category->name }}</a></p>
                                    <p>Price: {{ $product->price }} EGP</p>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button class="cart-btn">ADD TO CART</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- List View End -->
                    </div>
                    <!-- Shop Tab Content End -->

                    <!-- Pagination -->
                    <div class="pro-pagination-style text-center mt-30">
                        {{-- {{ $products->links() }} --}}
                    </div>
                    <!-- Pagination End -->
                </div>
                <!-- Shop Bottom Area End -->

            </div>
        </div>
    </div>
</div>
<!-- Shop Category Area End -->

@endsection
