{{-- resources/views/backend/admission_info/edit.blade.php --}}

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
                                @include('widgets.success')

                                <form id="form" action="{{ route('admin.admission-info.update') }}" method="post" enctype="multipart/form-data" data-parsley-validate>
                                    @csrf

                                    <div class="form-group row mb-4">
                                        <div class="col-md-12">
                                            <label class="col-form-label">General Admission Information / Process</label>
                                            <textarea class="summernote" name="long_description">{{ old('long_description', $admission_info->long_description) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-12">
                                            <label class="col-form-label">General Eligibility Notes</label>
                                            <small class="text-muted d-block mb-2">Program-specific eligibility is set per program under Academy. Use this field for overall/college-wide eligibility rules.</small>
                                            <textarea class="summernote" name="eligibility_notes">{{ old('eligibility_notes', $admission_info->eligibility_notes) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-12">
                                            <label class="col-form-label">Required Documents (Checklist)</label>
                                            <textarea class="summernote" name="required_documents">{{ old('required_documents', $admission_info->required_documents) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-12">
                                            <label class="col-form-label">Key Admission Dates</label>
                                            <textarea class="summernote" name="key_dates">{{ old('key_dates', $admission_info->key_dates) }}</textarea>
                                        </div>
                                    </div>

                                    <hr style="border: 1px dashed #999">

                                    <div class="form-group row mb-4">
                                        <div class="col-md-6">
                                            <label class="col-form-label">Prospectus (PDF)</label>
                                            <input type="file" class="form-control @error('prospectus_file') is-invalid @enderror" name="prospectus_file" accept="application/pdf">
                                            @if ($admission_info->prospectus_file)
                                                <small class="text-muted d-block mt-1">Current: <a href="{{ asset($admission_info->prospectus_file) }}" target="_blank">view uploaded PDF</a></small>
                                            @endif
                                            @error('prospectus_file')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-form-label">Admission Form (PDF)</label>
                                            <input type="file" class="form-control @error('admission_form_file') is-invalid @enderror" name="admission_form_file" accept="application/pdf">
                                            @if ($admission_info->admission_form_file)
                                                <small class="text-muted d-block mt-1">Current: <a href="{{ asset($admission_info->admission_form_file) }}" target="_blank">view uploaded PDF</a></small>
                                            @endif
                                            @error('admission_form_file')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-12">
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
