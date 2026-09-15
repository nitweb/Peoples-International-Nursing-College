<section class="video pt-120">
    <div class="container">
        <div class="section-heading text-center">
            <div class="flex-align d-inline-flex gap-8 mb-16">
                <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                <h5 class="text-main-600 mb-0">Campus Life</h5>
            </div>
            <h2 class="mb-24 wow bounceIn">Campus Highlights</h2>
            <p class="wow bounceInDown">Welcome to our vibrant campus, where learning comes to life in a caring and disciplined environment.</p>
        </div>
    </div>

    <div class="video-img position-relative half-bg">
        <div class="container wow bounceIn">
            <img src="{{ asset('frontend/assets/images/thumbs/video-img.png') }}" class="rounded-12 cover-img" alt="Campus">
            @if ($media_videos->count())
                <a href="{{ $media_videos->first()->embed_url }}" target="_blank" class="play-button position-absolute start-50 top-50 translate-middle z-1 w-72 h-72 flex-center bg-main-two-600 text-white rounded-circle text-2xl">
                    <i class="ph-fill ph-play"></i>
                </a>
            @endif
        </div>
    </div>
</section>
