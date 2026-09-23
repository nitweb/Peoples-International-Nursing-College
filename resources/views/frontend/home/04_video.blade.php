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
            <img src="{{ asset('frontend/assets/videos/video_thumbnail.jpeg') }}" class="rounded-12 cover-img" alt="Campus">
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#campusVideoModal" class="campus-play-btn position-absolute start-50 top-50 translate-middle z-1 w-72 h-72 flex-center bg-main-two-600 text-white rounded-circle text-2xl">
                <i class="ph-fill ph-play"></i>
            </a>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="campusVideoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl campus-video-dialog">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0 p-0">
                <button type="button" class="campus-video-close btn-close bg-white rounded-circle p-8 ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <video id="campusVideoPlayer" class="w-100 rounded-12 campus-video-player" controls muted playsinline autoplay>
                    <source src="{{ asset('frontend/assets/videos/home.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>

<style>
    .campus-video-dialog {
        max-width: 90vw;
        width: 90vw;
    }

    .campus-video-player {
        max-height: 85vh;
        width: 100%;
        object-fit: contain;
        background: #000;
    }

    @media (max-width: 768px) {
        .campus-video-dialog {
            max-width: 95vw;
            width: 95vw;
        }
        .campus-video-player {
            max-height: 60vh;
        }
    }
</style>

@push('scripts')
<script>
    const campusVideoModal = document.getElementById('campusVideoModal');
    const campusVideoPlayer = document.getElementById('campusVideoPlayer');

    campusVideoModal.addEventListener('shown.bs.modal', function () {
        campusVideoPlayer.currentTime = 0;
        campusVideoPlayer.muted = true;

        const tryPlay = () => {
            const playPromise = campusVideoPlayer.play();
            if (playPromise !== undefined) {
                playPromise.then(() => {
                    console.log('Video playing successfully');
                }).catch(function (error) {
                    console.log('Autoplay blocked by browser:', error);
                });
            }
        };

        if (campusVideoPlayer.readyState >= 2) {
            tryPlay();
        } else {
            campusVideoPlayer.addEventListener('loadeddata', tryPlay, { once: true });
        }
    });

    campusVideoModal.addEventListener('hidden.bs.modal', function () {
        campusVideoPlayer.pause();
        campusVideoPlayer.currentTime = 0;
    });
</script>
@endpush