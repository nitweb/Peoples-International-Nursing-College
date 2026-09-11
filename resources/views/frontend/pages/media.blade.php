@extends('frontend.dashboard')
@section('title', 'Media')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Media</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Media List</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-page-section centred" style="padding-top: 60px; padding-bottom: 60px;">

        <div class="auto-container">

            <div class="row clearfix align-items-stretch">

                @forelse ($media_videos as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 team-block d-flex">
                        <div class="team-block-two w-100">
                            <div class="inner-box d-flex flex-column h-100">
                                <figure class="image-box" style="width: 100%; height: 190px; overflow: hidden; margin: 0 auto; position: relative; cursor: pointer; flex-shrink: 0;" data-toggle="modal" data-target="#media_video_modal" data-embed="{{ $item->embed_url }}" data-id="{{ $item->id }}">
                                    <img src="{{ $item->thumbnail }}" alt="{{ $item->title }}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                                    <span style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:56px; height:56px; background:rgba(220,0,0,.85); border-radius:50%; display:flex; align-items:center; justify-content:center;">
                                        <i class="fa fa-play" style="color:#fff; font-size:20px; margin-left:3px;"></i>
                                    </span>
                                </figure>
                                <div class="lower-content d-flex flex-column flex-grow-1 justify-content-between">
                                    <h3><a href="#!" data-toggle="modal" data-target="#media_video_modal" data-embed="{{ $item->embed_url }}" data-id="{{ $item->id }}">{{ $item->title }}</a></h3>
                                    <div class="d-flex justify-content-between" style="font-size: 13px; opacity: .75;">
                                        <span class="media_views_label" data-id="{{ $item->id }}">{{ $item->views_label }}</span>
                                        @if ($item->time_ago)
                                            <span>{{ $item->time_ago }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No videos available yet.</p>
                    </div>
                @endforelse

            </div>

            <div class="d-flex justify-content-center" style="margin-top: 30px;">
                {{ $media_videos->links() }}
            </div>

        </div>

    </section>

    {{-- YouTube Video Modal (Bootstrap 4 syntax) --}}
    <div class="modal fade" id="media_video_modal" tabindex="-1" role="dialog" aria-hidden="true" data-view-base="{{ url('/media') }}">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 900px; width: 92%; margin: 1.75rem auto;">
            <div class="modal-content bg-transparent border-0" style="width: 100%;">
                <div class="modal-header border-0" style="padding: 0 0 10px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:1; text-shadow:none; margin-left:auto;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
                        <iframe id="media_video_iframe" src="" title="YouTube video" style="position:absolute; top:0; left:0; width:100%; height:100%; border:0;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            jQuery(function($) {
                var $mediaModal = $('#media_video_modal');
                if (!$mediaModal.length) {
                    return;
                }

                var viewBase = $mediaModal.attr('data-view-base');
                var csrfMeta = document.querySelector('meta[name="csrf-token"]');
                var csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : null;

                $mediaModal.on('show.bs.modal', function(event) {
                    var $trigger = $(event.relatedTarget);
                    var embedUrl = $trigger.data('embed');
                    var videoId = $trigger.data('id');

                    // Load & play the video immediately
                    $('#media_video_iframe').attr('src', embedUrl + '?autoplay=1');

                    // Count the view via AJAX, no page reload
                    if (videoId && viewBase && csrfToken) {
                        $.ajax({
                            url: viewBase + '/' + videoId + '/view',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            dataType: 'json',
                        }).done(function(data) {
                            if (data && data.views) {
                                $('.media_views_label[data-id="' + videoId + '"]').text(data.views);
                            }
                        });
                    }
                });

                $mediaModal.on('hidden.bs.modal', function() {
                    $('#media_video_iframe').attr('src', '');
                });
            });
        });
    </script>

@endsection
