{{-- Expects optional $career (single Career model to lock position) and $career_list (collection for dropdown) --}}
<div class="p-32 bg-main-25 rounded-16 border border-neutral-30">
    <h4 class="mb-32">Job Application Form</h4>

    @include('widgets.errors')
    @include('widgets.success')

    <form action="{{ route('admin.job_apply.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if(isset($career))
            <input type="hidden" name="career_id" value="{{ $career->id }}">
            <input type="hidden" name="interested_in" value="{{ $career->title }}">
            <div class="mb-24">
                <label class="text-neutral-700 fw-medium mb-8">Position</label>
                <input type="text" class="common-input rounded-8 w-100" value="{{ $career->title }}" disabled>
            </div>
        @else
            <div class="mb-24">
                <label class="text-neutral-700 fw-medium mb-8">Position Interested In <span class="text-danger-600">*</span></label>
                <select name="interested_in" class="common-input rounded-8 w-100" required
                    onchange="document.getElementById('career_id_field').value = this.options[this.selectedIndex].dataset.id || ''">
                    <option value="">-- Select a position --</option>
                    @foreach($career_list as $c)
                        <option value="{{ $c->title }}" data-id="{{ $c->id }}" {{ old('interested_in') == $c->title ? 'selected' : '' }}>{{ $c->title }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="career_id" id="career_id_field" value="{{ old('career_id') }}">
            </div>
        @endif

        <div class="row">
            <div class="col-sm-6 mb-24">
                <label class="text-neutral-700 fw-medium mb-8">Full Name <span class="text-danger-600">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="common-input rounded-8 w-100" required>
            </div>
            <div class="col-sm-6 mb-24">
                <label class="text-neutral-700 fw-medium mb-8">Phone <span class="text-danger-600">*</span></label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="common-input rounded-8 w-100" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 mb-24">
                <label class="text-neutral-700 fw-medium mb-8">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="common-input rounded-8 w-100">
            </div>
            <div class="col-sm-6 mb-24">
                <label class="text-neutral-700 fw-medium mb-8">NID Number <span class="text-danger-600">*</span></label>
                <input type="text" name="nid_number" value="{{ old('nid_number') }}" class="common-input rounded-8 w-100" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 mb-24">
                <label class="text-neutral-700 fw-medium mb-8">Date of Birth <span class="text-danger-600">*</span></label>
                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="common-input rounded-8 w-100" required>
            </div>
            <div class="col-sm-6 mb-24">
                <label class="text-neutral-700 fw-medium mb-8">Gender <span class="text-danger-600">*</span></label>
                <select name="gender" class="common-input rounded-8 w-100" required>
                    <option value="">-- Select --</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
        </div>

        <div class="mb-24">
            <label class="text-neutral-700 fw-medium mb-8">Present Address <span class="text-danger-600">*</span></label>
            <input type="text" name="address" value="{{ old('address') }}" class="common-input rounded-8 w-100" required>
        </div>

        <div class="row">
            <div class="col-sm-6 mb-24">
                <label class="text-neutral-700 fw-medium mb-8">District <span class="text-danger-600">*</span></label>
                <input type="text" name="district" value="{{ old('district') }}" class="common-input rounded-8 w-100" required>
            </div>
            <div class="col-sm-6 mb-24">
                <label class="text-neutral-700 fw-medium mb-8">Thana / Upazila <span class="text-danger-600">*</span></label>
                <input type="text" name="thana" value="{{ old('thana') }}" class="common-input rounded-8 w-100" required>
            </div>
        </div>

        <div class="mb-24">
            <label class="text-neutral-700 fw-medium mb-8">Highest Education <span class="text-danger-600">*</span></label>
            <input type="text" name="education" value="{{ old('education') }}" class="common-input rounded-8 w-100" placeholder="e.g. BSc in Nursing" required>
        </div>

        <div class="mb-24">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="has_field_experience" value="1" id="has_field_experience" {{ old('has_field_experience') ? 'checked' : '' }}>
                <label class="form-check-label text-neutral-700" for="has_field_experience">I have relevant field experience</label>
            </div>
        </div>

        <div class="mb-24">
            <label class="text-neutral-700 fw-medium mb-8">Message</label>
            <textarea name="message" rows="3" class="common-input rounded-8 w-100" placeholder="Anything you'd like to add">{{ old('message') }}</textarea>
        </div>

        <div class="mb-32">
            <label class="text-neutral-700 fw-medium mb-8">Upload CV (PDF, max 2MB) <span class="text-danger-600">*</span></label>
            <input type="file" name="job_files" accept="application/pdf" class="common-input rounded-8 w-100" required>
        </div>

        <button type="submit" class="btn btn-main rounded-pill w-100 justify-content-center">
            Submit Application
        </button>
    </form>
</div>
