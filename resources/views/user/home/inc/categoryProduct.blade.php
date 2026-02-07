@php
    $adminAssets = asset('user/assets');
@endphp



<section class="category-product-area home-10">
    <div class="container">
        <div class="row">

            <!-- ================= Categories ================= -->
            <div class="col-xl-9 col-lg-12">
                <div class="row">

                    @forelse ($categories as $category)
                        <div class="col-lg-4 col-md-6 col-12">

                            <!-- Category Title -->
                            <div class="section-title">
                                <h2>{{ $category->name }}</h2>
                            </div>

                            <!-- Products Slider -->
                            <div class="category-product-slider owl-carousel owl-nav-style">

                                @forelse ($category->product ?? [] as $product)
                                    <div class="feature-slider-item">
                                        <article class="list-product">

                                            <!-- Image -->
                                            <div class="img-block">
                                                <a href="#" class="thumbnail">
                                                    <img class="first-img" src="{{ asset('storage/'.$product->image) }}" alt="">
                                                </a>
                                            </div>

                                            <!-- Content -->
                                            <div class="product-decs">
                                                <h2 class="product-link">
                                                    <a href="#">
                                                        {{ $product->name }}
                                                    </a>
                                                </h2>

                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="current-price">
                                                            {{ number_format($product->price, 2) }} EGP
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </article>
                                    </div>
                                @empty
                                    <div class="text-center p-3 text-muted">
                                        لا توجد منتجات
                                    </div>
                                @endforelse

                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center text-muted">
                            لا توجد أقسام حالياً
                        </div>
                    @endforelse

                </div>
            </div>

            <!-- ================= Banner ================= -->
            <div class="col-xl-3 d-none d-xl-block">
                <div class="banner-inner">
                    <img src="{{ $adminAssets }}/images/banner-image/29.jpg" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= Best Sellers ================= -->
<section class="best-seller-area mt-5">
    <div class="container">
        <div class="section-title">
            <h2>Best Sellers</h2>
        </div>

        <div class="row">
            @forelse ($bestSellers as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <article class="list-product">

                        <div class="img-block">
                            <a href="#">
                                <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid">
                            </a>
                        </div>

                        <div class="product-decs text-center">
                            <h4>{{ $product->name }}</h4>
                            <strong>{{ number_format($product->price, 2) }} EGP</strong>
                        </div>

                    </article>
                </div>
            @empty
                <p class="text-muted text-center">لا توجد منتجات مميزة</p>
            @endforelse
        </div>
    </div>
</section>

