@if(!request()->is('/')) <!-- لن يظهر في الهوم -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">{{ $title ?? 'Page' }}</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>{{ $title ?? 'Page' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
