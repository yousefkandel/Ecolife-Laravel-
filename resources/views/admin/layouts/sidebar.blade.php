@php
    $adminAssets = asset('admin/assets');
@endphp

<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div>
        <!-- Logo Section -->
        <div class="logo-wrapper">
            <a href="{{ route('home') }}">
                <img class="img-fluid for-light"
                src="  {{ asset('user/assets/images/logo/logo-electronic-2.jpg') }}" alt="">
            </a>
            <div class="toggle-sidebar">
                <svg class="sidebar-toggle">
                    <use href="{{ $adminAssets }}/svg/icon-sprite.svg#toggle-icon"></use>
                </svg>
            </div>
        </div>

        <!-- Logo Icon for collapsed sidebar -->
        <div class="logo-icon-wrapper">
            <a href="{{ route('home') }}">
                <img class="img-fluid" src="{{ $adminAssets }}/images/logo/logo-icon.png" alt="Logo Icon">
            </a>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <!-- Back button for mobile -->
                    <li class="back-btn">
                        <a href="{{ route('home') }}">
                            <img class="img-fluid" src="{{ $adminAssets }}/images/logo/logo-icon.png" alt="Logo Icon">
                        </a>
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    <!-- Pinned Section -->
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>

                    <!-- General Section -->
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-thumb-tack"></i>
                        <a href="{{ route('home') }}">
                            <span>Web Site</span>
                        </a>
                    </li>

                    <!-- Applications Section -->
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-8">Applications</h6>
                        </div>
                    </li>

                    <!-- Categories -->
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#stroke-project"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#fill-project"></use>
                            </svg>
                            <span>Categories</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('categories.index') }}">Categories</a></li>
                            <li><a href="{{ route('categories.create') }}">Create New</a></li>
                        </ul>
                    </li>

                    <!-- Products -->
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#stroke-project"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#fill-project"></use>
                            </svg>
                            <span>Products</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('products.index') }}">Products</a></li>
                            <li><a href="{{ route('products.create') }}">Create New</a></li>
                        </ul>
                    </li>

                    <!-- Sliders -->
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#stroke-project"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#fill-project"></use>
                            </svg>
                            <span>Sliders</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('sliders.index') }}">Sliders</a></li>
                            <li><a href="{{ route('sliders.create') }}">Create New</a></li>
                        </ul>
                    </li>

                    <!-- Contact Us -->
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#stroke-project"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#fill-project"></use>
                            </svg>
                            <span>Contact Us</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('contacts.index') }}">Contact Us</a></li>
                        </ul>
                    </li>

                    <!-- Orders -->
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#stroke-project"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ $adminAssets }}/svg/icon-sprite.svg#fill-project"></use>
                            </svg>
                            <span>Order</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('orders.index') }}">Orders</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->
