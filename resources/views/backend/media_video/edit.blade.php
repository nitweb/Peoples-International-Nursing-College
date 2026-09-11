@extends('backend.admin.master')

@section('admin_title', $title )

@section('admin_content')

    <div class="main-content">

        <section class="section">

            <div class="section-body">

                <div class="row">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ $title }}</h4>
                                <h4>
                                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-dark"> <i class="fas fa-arrow-left"></i> Back</a>
                                </h4>
                            </div>

                            <div class="card-body">

                                @include('widgets.errors')

                                <form id="form" action="{{ route('admin.media_video.update') }}" method="post" data-parsley-validate>

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $media_video->id }}">

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <img src="{{ $media_video->thumbnail }}" alt="{{ $media_video->title }}" style="max-width: 240px; border-radius: 6px;">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Video Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $media_video->title }}" data-parsley-required-message="Title is required*" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">YouTube Video URL</label>
                                            <input type="text" class="form-control @error('youtube_url') is-invalid @enderror" name="youtube_url" value="{{ $media_video->youtube_url }}" data-parsley-required-message="YouTube URL is required*" required>
                                            <small class="form-text text-muted">Paste the full YouTube link. The video ID will be detected automatically.</small>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Stats (auto-tracked)</label>
                                            <div>
                                                <span class="badge badge-info">{{ $media_video->views_label }}</span>
                                                <span class="badge badge-secondary">Uploaded {{ $media_video->time_ago }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Status</label>
                                            <select class="form-control selectric" name="status">
                                                <option value="">- SELECT STATUS -</option>
                                                @if (is_array(App\Inc\Settings::getGlobalStatus()))
                                                    @foreach (App\Inc\Settings::getGlobalStatus() as $statusKey => $statusName)
                                                        <option value="{{ $statusKey }}" {{ $media_video->status == $statusKey ? 'selected' : '' }}>
                                                            {{ $statusName }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

@endsection
