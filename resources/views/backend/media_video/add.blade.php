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

                                <form id="form" action="{{ route('admin.media_video.store') }}" method="post" data-parsley-validate>

                                    @csrf

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Video Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" data-parsley-required-message="Title is required*" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">YouTube Video URL</label>
                                            <input type="text" class="form-control @error('youtube_url') is-invalid @enderror" name="youtube_url" placeholder="https://www.youtube.com/watch?v=xxxxxxxxxxx" value="{{ old('youtube_url') }}" data-parsley-required-message="YouTube URL is required*" required>
                                            <small class="form-text text-muted">Paste the full YouTube link. The video ID will be detected automatically. Views count and upload time will be tracked automatically.</small>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label"></label>
                                            <button class="btn btn-primary">Create</button>
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
