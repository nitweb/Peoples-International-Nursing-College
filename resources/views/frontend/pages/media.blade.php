@extends('frontend.dashboard')
@section('title', 'Media')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Media'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24">Videos &amp; Media</h2>
                <p>Watch highlights, events, and campus stories from Peoples International Nursing College</p>
            </div>

            @if($media_videos->count())
                <div class="row gy-4">
                    @foreach($media_videos as $video)
                        <div class="col-lg-4 col-sm-6">
                            <div class="rounded-16 overflow-hidden border border-neutral-30 bg-white h-100">
                                <button type="button"
                                    class="media-play-btn w-100 p-0 border-0 position-relative d-block"
                                    data-embed="{{ $video->embed_url }}"
                                    data-id="{{ $video->id }}">
                                    <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}" class="w-100 cover-img" style="height: 200px; object-fit: cover;">
                                    <span class="position-absolute top-50 start-50 translate-middle w-64 h-64 bg-white text-main-600 rounded-circle flex-center text-3xl">
                                        <i class="ph-fill ph-play"></i>
                                    </span>
                                </button>
                                <div class="p-20">
                                    <h6 class="mb-8 text-line-2">{{ $video->title }}</h6>
                                    <div class="flex-align gap-16 text-neutral-500 text-sm">
                                        <span class="js-views-label-{{ $video->id }}">{{ $video->views_label }}</span>
                                        @if($video->time_ago)
                                            <span>{{ $video->time_ago }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-48">
                    {{ $media_videos->links() }}
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">No videos published yet. Please check back soon.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Video Modal --}}
    <div class="modal fade" id="mediaVideoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-black">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-16 z-1" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="ratio ratio-16x9">
                    <iframe id="mediaVideoFrame" src="" title="Video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.media-play-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var embedUrl = btn.dataset.embed;
                var videoId = btn.dataset.id;
                var frame = document.getElementById('mediaVideoFrame');
                frame.src = embedUrl + '?autoplay=1';

                var modalEl = document.getElementById('mediaVideoModal');
                var modal = new bootstrap.Modal(modalEl);
                modal.show();

                modalEl.addEventListener('hidden.bs.modal', function onHide() {
                    frame.src = '';
                    modalEl.removeEventListener('hidden.bs.modal', onHide);
                }, { once: true });

                fetch("{{ url('/media') }}/" + videoId + "/view", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                })
                .then(function (res) { return res.json(); })
                .then(function (data) {
                    if (data.success && data.views) {
                        var label = document.querySelector('.js-views-label-' + videoId);
                        if (label) { label.textContent = data.views; }
                    }
                })
                .catch(function () {});
            });
        });
    </script>

@endsection
