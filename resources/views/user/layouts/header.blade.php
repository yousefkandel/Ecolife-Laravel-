     @php
    $adminAssets = asset('user/assets');
@endphp
<header class="main-header">

            <!-- Header Buttom Start -->
            <div class="header-navigation sticky-nav d-none d-lg-block">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Logo Start -->
                        <div class="col-md-2 col-sm-2">
                            <div class="logo">
                                <a href="index.html"><img src="{{ $adminAssets }}  alt=""></a>
                            </div>
                        </div>
                        <!-- Logo End -->
                        <!-- Navigation Start -->
                        <div class="col-md-10 col-sm-10">
                            <!--Main Navigation Start -->
                            <div class="main-navigation">
                                <ul>
                                    <li >
                                        <a href="{{ route('home') }}">Home </a>

                                    </li>
                                    <li class="menu-dropdown">
                                        <a href="index-11.html#">Shop <i class="ion-ios-arrow-down"></i></a>
                                        <ul class="mega-menu-wrap">
                                            <li>
                                                <ul>

        @foreach ($categories as $category)
    <a href="{{ route('shop.index', ['category' => $category->id]) }}">
        {{ $category->name }}
    </a>
@endforeach


                                                </ul>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="menu-dropdown">
                                        <a href="">About </a>


                                    <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                                </ul>
                            </div>
                            <!--Main Navigation End -->
                            <!--Header Bottom Account Start -->
                            <div class="header_account_area">
                                <!--Seach Area Start -->
                                <div class="header_account_list search_list">
                                    <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
                                    <div class="dropdown_search">
                                        <form action="index-11.html#">
                                            <input placeholder="Search entire store here ..." type="text">

                                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <!--Seach Area End -->

                                <!--Cart info Start -->
                               <div class="cart-info home-10 home-9 d-flex">
    <div class="mini-cart-warp">
        <a href="{{ route('cart.index') }}" class="count-cart offcanvas-toggle color-black">
            <span class="amount-tag">{{ number_format($cartTotal, 2) }} EGP</span>
            <span class="item-quantity-tag">{{ $cartCount }}</span>
        </a>
    </div>
</div>


                                <!--Cart info End -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </header>

