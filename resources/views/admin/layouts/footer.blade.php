@php
    $adminAssets = asset('admin/assets');
@endphp

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 p-0 footer-copyright">
                <p class="mb-0">Copyright 2024 © Zono theme by pixelstrap.</p>
            </div>
            <div class="col-md-6 p-0 text-end">
                <p class="heart mb-0">
                    Hand crafted &amp; made with
                    <svg class="footer-icon" width="16" height="16" fill="red">
                        <use href="{{ $adminAssets }}/svg/icon-sprite.svg#heart"></use>
                    </svg>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

</div> <!-- page-body-wrapper -->
</div> <!-- main wrapper -->

<!-- Core JS -->
<script src="{{ $adminAssets }}/js/jquery.min.js"></script>
<script src="{{ $adminAssets }}/js/bootstrap/bootstrap.bundle.min.js"></script>

<!-- Icons -->
<script src="{{ $adminAssets }}/js/icons/feather-icon/feather.min.js"></script>
<script src="{{ $adminAssets }}/js/icons/feather-icon/feather-icon.js"></script>

<!-- Scrollbar -->
<script src="{{ $adminAssets }}/js/scrollbar/simplebar.js"></script>
<script src="{{ $adminAssets }}/js/scrollbar/custom.js"></script>

<!-- Sidebar & Config -->
<script src="{{ $adminAssets }}/js/config.js"></script>
<script src="{{ $adminAssets }}/js/sidebar-menu.js"></script>
<script src="{{ $adminAssets }}/js/sidebar-pin.js"></script>

<!-- Plugins -->
<script src="{{ $adminAssets }}/js/slick/slick.min.js"></script>
<script src="{{ $adminAssets }}/js/header-slick.js"></script>
<script src="{{ $adminAssets }}/js/range-slider/ion.rangeSlider.min.js"></script>
<script src="{{ $adminAssets }}/js/range-slider/rangeslider-script.js"></script>
<script src="{{ $adminAssets }}/js/touchspin/vendors.min.js"></script>
<script src="{{ $adminAssets }}/js/touchspin/touchspin.js"></script>
<script src="{{ $adminAssets }}/js/touchspin/input-groups.min.js"></script>
<script src="{{ $adminAssets }}/js/owlcarousel/owl.carousel.js"></script>
<script src="{{ $adminAssets }}/js/select2/select2.full.min.js"></script>
<script src="{{ $adminAssets }}/js/select2/select2-custom.js"></script>
<script src="{{ $adminAssets }}/js/product-tab.js"></script>

<!-- Theme JS -->
<script src="{{ $adminAssets }}/js/script.js"></script>
<script src="{{ $adminAssets }}/js/theme-customizer/customizer.js"></script>
