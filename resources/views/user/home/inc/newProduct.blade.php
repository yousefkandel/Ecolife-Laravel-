@php
    $adminAssets = asset('user/assets');
@endphp

<section class="recent-add-area">
    <div class="container">

        <!-- title -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>New Arrivals</h2>
                    <p>Add new products to weekly line up</p>
                </div>
            </div>
        </div>

        <!-- slider -->
        <div class="recent-product-slider owl-carousel owl-nav-style">

            @foreach ($products as $product)
                <article class="list-product">

                    <!-- image -->
                    <div class="img-block">
                        <a href="#" class="thumbnail">
                            <img class="first-img" src="{{ asset('storage/'.$product->image) }}" alt="">
                        </a>
                    </div>

                    <!-- badge -->
                    @if($product->is_new)
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                    @endif

                    <!-- details -->
                    <div class="product-decs">
                        <a class="inner-link" href="#">
                            <span>{{ $product->category->name ?? '' }}</span>
                        </a>

                        <h2>
                            <a href="#" class="product-link">
                                {{ $product->name }}
                            </a>
                        </h2>

                        <div class="pricing-meta">
                            <ul>
                                @if($product->old_price)
                                    <li class="old-price">{{ $product->old_price }} EGP</li>
                                @endif
                                <li class="current-price">{{ $product->price }} EGP</li>
                            </ul>
                        </div>
                    </div>

                    <!-- actions -->
                    <div class="add-to-link">
                        <ul>
                            <li class="cart">
                                <a class="cart-btn"
                                   href="{{ route('cart.add', $product->id) }}">
                                    ADD TO CART
                                </a>
                            </li>
                        </ul>
                    </div>

                </article>
            @endforeach

        </div>
    </div>
</section>
