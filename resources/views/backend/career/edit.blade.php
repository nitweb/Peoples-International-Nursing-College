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
                                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-dark">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </h4>
                            </div>

                            <div class="card-body">

                                @include('widgets.errors')

                                <form id="form" action="{{ route('admin.career.update') }}" method="post" enctype="multipart/form-data" data-parsley-validate>

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $career->id }}">

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Image [830px by 500px]</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="career_image" id="image-upload">
                                                <div class="table_slider_update_image" style="background-image: url({{ asset($career->career_image) }}); background-size: cover; background-position: center;" id="imageShow"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $career->title }}" required data-parsley-required-message="Title is required*">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-4">
                                            <label class="col-form-label">Location</label>
                                            <input type="text" class="form-control" name="location" value="{{ $career->location }}" placeholder="e.g. Head Office, Dhaka">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label selectric">Job Type</label>
                                            <select name="job_type" class="form-control" required>
                                                <option value="full-time" {{ $career->job_type == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                                <option value="part-time" {{ $career->job_type == 'part-time' ? 'selected' : '' }}>Part-time</option>
                                                <option value="internship" {{ $career->job_type == 'internship' ? 'selected' : '' }}>Internship</option>
                                                <option value="contract" {{ $career->job_type == 'contract' ? 'selected' : '' }}>Contract</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label">Vacancy (number of positions)</label>
                                            <input type="number" min="1" class="form-control" name="vacancy" value="{{ $career->vacancy }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-4">
                                            <label class="col-form-label">Salary Range (optional)</label>
                                            <input type="text" class="form-control" name="salary_range" value="{{ $career->salary_range }}" placeholder="e.g. Negotiable / 25,000 - 35,000 BDT">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label">Application Deadline (optional)</label>
                                            <input type="date" class="form-control" name="deadline" value="{{ $career->deadline ? $career->deadline->format('Y-m-d') : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Description</label>
                                            <textarea class="summernote" name="description" required data-parsley-required-message="Description is required*">{{ $career->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Requirements / Qualifications (optional)</label>
                                            <textarea class="summernote" name="requirements">{{ $career->requirements }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Status</label>
                                            <select class="form-control selectric" name="status">
                                                <option value="">- SELECT STATUS -</option>
                                                @if (is_array(App\Inc\Settings::getGlobalStatus()))
                                                    @foreach (App\Inc\Settings::getGlobalStatus() as $statusKey => $statusName)
                                                        <option value="{{ $statusKey }}" {{ $career->status == $statusKey ? 'selected' : '' }}>
                                                            {{ $statusName }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <hr class="mb-4" style="border: 1px solid #000">

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" value="{{ $career->meta_title }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Meta Description</label>
                                            <textarea name="meta_description" rows="4" class="form-control">{{ $career->meta_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-8">
                                            <label class="col-form-label">Meta Keyword</label>
                                            <input type="text" class="form-control" name="meta_keyword" value="{{ $career->meta_keyword }}">
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

    <script>
        $(document).ready(function() {
            $('#image-upload').change(function(e) {
                $('#imageShow').css('background-image', `url(${URL.createObjectURL(e.target.files[0])})`);
            });
        });
    </script>

@endsection
