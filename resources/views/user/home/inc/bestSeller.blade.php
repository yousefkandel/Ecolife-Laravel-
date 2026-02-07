@php
    $adminAssets = asset('user/assets');
@endphp

<section class="best-sells-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>Best Sellers</h2>
                    <p>Add bestselling products to weekly line up</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <!-- Best Sell Slider Carousel Start -->
        <div class="best-sell-slider owl-carousel owl-nav-style">

            @foreach($bestSellers as $product)
            <div class="owl-item">
                <article class="list-product">

                    <div class="img-block">
                        <a href="#" class="thumbnail">
                            <img class="first-img" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            <img class="second-img" src="{{ asset('storage/' . ($product->hover_image ?? $product->image)) }}" alt="{{ $product->name }}">
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>

                    @if($product->is_new)
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                    @endif

                    <div class="product-decs">
                        <a class="inner-link" href="#">
                            <span>{{ $product->category->name }}</span>
                        </a>
                        <h2>
                            <a href="#" class="product-link">{{ $product->name }}</a>
                        </h2>

                        <div class="rating-product">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="ion-android-star{{ $i <= $product->rating ? '' : '-outline' }}"></i>
                            @endfor
                        </div>

                        <div class="pricing-meta">
                            <ul>
                                @if($product->old_price)
                                    <li class="old-price">€{{ number_format($product->old_price, 2) }}</li>
                                @endif
                                <li class="current-price">€{{ number_format($product->price, 2) }}</li>
                                @if($product->old_price)
                                    <li class="discount-price">-{{ round((($product->old_price - $product->price)/$product->old_price)*100) }}%</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="add-to-link">
                        <ul>
                            <li class="cart">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="cart-btn">ADD TO CART</button>
                                </form>
                            </li>
                         
                        </ul>
                    </div>

                </article>
            </div>
            @endforeach

        </div>
        <!-- Best Sell Slider Carousel End -->

    </div>
</section>

<!-- Owl Carousel Initialization -->
<script>
    $(document).ready(function(){
        $('.best-sell-slider').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            responsive:{
                0:{ items:1 },
                576:{ items:2 },
                768:{ items:3 },
                992:{ items:4 }
            }
        });
    });
</script>
