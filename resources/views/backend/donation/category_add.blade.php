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
                                    <a href="{{ route('admin.donation-category.list') }}" class="btn btn-outline-primary"><i class="fas fa-list"></i> Category List</a>
                                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Back</a>
                                </h4>
                            </div>

                            <div class="card-body">

                                @include('widgets.errors')
                                @include('widgets.success')

                                <form id="form" action="{{ route('admin.donation-category.store') }}" method="post" enctype="multipart/form-data" data-parsley-validate>
                                    @csrf

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Cover Image [700px by 500px]</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" required data-parsley-required-message="Cover Image is required*" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required data-parsley-required-message="Title is required*">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Short Description</label>
                                            <textarea name="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror" required data-parsley-required-message="Short Description is required*">{{ old('short_description') }}</textarea>
                                            <small class="text-muted">Shown on the donation cards (max 500 characters).</small>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Full Description</label>
                                            <textarea class="summernote" name="description" required data-parsley-required-message="Description is required*">{{ old('description') }}</textarea>
                                        </div>
                                    </div>

                                    <hr class="mb-4" style="border: 1px solid #000">

                                    <div class="form-group row mb-4">
                                        <div class="col-md-4">
                                            <label class="col-form-label">Target Amount (৳)</label>
                                            <input type="number" step="0.01" class="form-control" name="target_amount" value="{{ old('target_amount') }}" placeholder="Leave empty for no fixed target">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label">Serial (display order)</label>
                                            <input type="number" class="form-control" name="serial" value="{{ old('serial', 0) }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="active" selected>Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label>
                                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                                Mark as Featured
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <button class="btn btn-primary">Create Category</button>
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
