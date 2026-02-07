@php
    $adminAssets = asset('user/assets');
@endphp

<section class="categorie-area mb-60px mt-30">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Popular Categories</h2>
                    <p>Add Popular Categories to weekly line up</p>
                </div>
            </div>
        </div>

        <div class="category-slider owl-carousel owl-nav-style">

            @forelse($categories as $category)
                <div class="category-item">

                    <div class="category-list mb-30px">
                        <div class="category-thumb">
                            <a href="#">
                                <img
                                    src="{{ $category->image
                                        ? asset('storage/'.$category->image)
                                        : $adminAssets.'/images/product-image/electronic/thumb-1.jpg' }}"
                                    alt="{{ $category->name }}"
                                >
                            </a>
                        </div>

                        <div class="desc-listcategoreis">
                            <div class="name_categories">
                                <h4>{{ $category->name }}</h4>
                            </div>

                            <span class="number_product">
                                {{ $category->products_count }} Products
                            </span>

                            <a href="#">
                                Shop Now
                                <i class="ion-android-arrow-dropright-circle"></i>
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <p class="text-center">No popular categories found.</p>
            @endforelse

        </div>
    </div>
</section>
