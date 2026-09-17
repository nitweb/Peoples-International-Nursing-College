{{-- resources/views/backend/facility/add.blade.php --}}

@extends('backend.admin.master')

@section('admin_title', $title)

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
                                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Back</a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @include('widgets.errors')

                                <form id="form" action="{{ route('admin.facility.store') }}" method="post" enctype="multipart/form-data" data-parsley-validate>
                                    @csrf

                                    <div class="form-group row">

                                        {{-- Title --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required data-parsley-required-message="Title is required*">
                                            @error('title')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Icon --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label">Icon Class (optional)</label>
                                            <input type="text" class="form-control" name="icon" value="{{ old('icon') }}" placeholder="e.g. ph-bold ph-bed, ph-bold ph-books">
                                        </div>

                                        {{-- Image --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label">Facility Photo</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
                                            @error('image')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Display Order --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label">Display Order</label>
                                            <input type="number" min="0" class="form-control" name="display_order" value="{{ old('display_order', 0) }}">
                                            <small class="text-muted">Lower numbers show first.</small>
                                        </div>

                                        {{-- Short Description --}}
                                        <div class="col-md-12 mb-3">
                                            <label class="col-form-label">Short Description</label>
                                            <input type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{ old('short_description') }}" maxlength="250" required data-parsley-required-message="Short description is required*">
                                            @error('short_description')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Long Description --}}
                                        <div class="col-md-12 mb-3">
                                            <label class="col-form-label">Details</label>
                                            <textarea class="summernote" name="long_description">{{ old('long_description') }}</textarea>
                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary">Save</button>
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
