@php
    $adminAssets = asset('user/assets');
@endphp

<div class="slider-area">
    <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
        @forelse($sliders as $slider)
            <div class="slider-height-10 d-flex align-items-start justify-content-start bg-img"
                 style="background-image: url('{{ $slider->image ? asset('storage/'.$slider->image) : $adminAssets.'/images/default-slider.jpg' }}');">
                <div class="container">
                    <div class="slider-content-5 slider-animated-1 text-left">
                        @if($slider->title)
                            <span class="animated">{{ $slider->title }}</span>
                        @endif
                        @if($slider->subtitle)
                            <h1 class="animated">
                                <strong>{{ $slider->subtitle }}</strong>
                            </h1>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            {{-- لو مفيش سلايدر --}}
            <div class="slider-height-10 d-flex align-items-center justify-content-center bg-dark text-white">
                <h2>No Sliders Found</h2>
            </div>
        @endforelse
    </div>
</div>
