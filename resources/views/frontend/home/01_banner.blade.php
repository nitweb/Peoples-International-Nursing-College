<section class="banner-style-two p_relative centred">

    <div class="banner-carousel owl-theme owl-carousel owl-dots-none">

        @forelse ($slider as $item)
            <div class="slide-item p_relative">
                <div class="image-layer p_absolute" style="background-image:url({{ asset($item->slider_image) }})"></div>
                <div class="auto-container">
                    <div class="content-box p_relative d_block z_5">
                        <span class="special-text special_fonts p_relative d_block">Change The World</span>
                        @if ($item->title)
                            <h2 class="p_relative d_block">{{ $item->title }}</h2>
                        @endif
                        @if ($item->short_description)
                            <p class="p_relative d_block">{!! $item->short_description !!}</p>
                        @endif
                        @if ($item->link)
                            <div class="btn-box">
                                <a href="{{ $item->link }}" class="theme-btn-one"><span>Discover More</span></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="slide-item p_relative">
                <div class="image-layer p_absolute" style="background-image:url({{ asset('frontend/assets/images/banner/banner-3.jpg') }})"></div>
                <div class="auto-container">
                    <div class="content-box p_relative d_block z_5">
                        <span class="special-text special_fonts p_relative d_block">Change The World</span>
                        <h2 class="p_relative d_block">Protect Wildlife On The Frontlines</h2>
                    </div>
                </div>
            </div>
        @endforelse

    </div>

</section>
