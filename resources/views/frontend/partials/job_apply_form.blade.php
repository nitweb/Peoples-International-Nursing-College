{{--
    Shared detailed Job Application form.
    Expected optional variables:
      $career        -> a single Career model (pre-selected, hides the dropdown)
      $careerOptions -> a collection of active Career models (shown as a dropdown)
--}}

<style>
    .jaf-wrap {
        --jaf-primary: #1c4e64;
        --jaf-accent: #f26a2e;
        --jaf-border: #e3e8ec;
        --jaf-bg: #f8fafb;
        font-family: inherit;
    }

    .jaf-section-title {
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: var(--jaf-primary);
        margin: 28px 0 16px;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--jaf-border);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .jaf-section-title:first-of-type {
        margin-top: 4px;
    }

    .jaf-section-title i {
        color: var(--jaf-accent);
    }

    .jaf-wrap .form-group {
        margin-bottom: 20px;
    }

    .jaf-wrap label.col-form-label {
        font-size: 13px;
        font-weight: 600;
        color: #3a4a52;
        margin-bottom: 6px;
        display: block;
    }

    .jaf-wrap .form-control,
    .jaf-wrap select.form-control {
        border: 1.5px solid var(--jaf-border);
        background: var(--jaf-bg);
        border-radius: 8px;
        padding: 11px 14px;
        font-size: 14px;
        height: auto;
        transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        width: 100%;
    }

    .jaf-wrap .form-control:focus,
    .jaf-wrap select.form-control:focus {
        outline: none;
        border-color: var(--jaf-primary);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(28, 78, 100, .12);
    }

    .jaf-wrap select.form-control {
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%231c4e64' stroke-width='2'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 14px center;
        background-size: 16px;
        padding-right: 38px;
        cursor: pointer;
    }

    .jaf-wrap textarea.form-control {
        resize: vertical;
        min-height: 110px;
    }

    /* CV upload dropzone */
    .jaf-upload {
        border: 2px dashed #b9c8ce;
        border-radius: 10px;
        background: var(--jaf-bg);
        padding: 28px 20px;
        text-align: center;
        position: relative;
        transition: border-color .2s ease, background .2s ease;
    }

    .jaf-upload:hover,
    .jaf-upload.jaf-dragover {
        border-color: var(--jaf-primary);
        background: #eef4f6;
    }

    .jaf-upload i {
        font-size: 34px;
        color: var(--jaf-primary);
        margin-bottom: 10px;
        display: block;
    }

    .jaf-upload input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .jaf-upload-text {
        font-size: 14px;
        color: #55666e;
        margin-bottom: 4px;
        font-weight: 600;
    }

    .jaf-upload-sub {
        font-size: 12px;
        color: #90a0a7;
    }

    .jaf-filename {
        margin-top: 10px;
        font-size: 13px;
        font-weight: 600;
        color: var(--jaf-primary);
    }

    .jaf-submit-btn {
        width: 100%;
        border: none;
        cursor: pointer;
        background: linear-gradient(135deg, var(--jaf-accent), #ff8a4c);
        color: #fff;
        font-weight: 700;
        letter-spacing: .3px;
        padding: 15px 20px;
        border-radius: 10px;
        font-size: 15px;
        box-shadow: 0 8px 20px rgba(242, 106, 46, .3);
        transition: transform .15s ease, box-shadow .15s ease;
    }

    .jaf-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(242, 106, 46, .4);
    }

    .jaf-submit-btn i {
        margin-left: 6px;
    }
</style>

<div class="jaf-wrap">
    <form method="post" action="{{ route('admin.job_apply.store') }}" enctype="multipart/form-data" class="job-apply-form">
        @csrf

        @if (isset($career) && $career)
            <input type="hidden" name="career_id" value="{{ $career->id }}">
            <input type="hidden" name="interested_in" value="{{ $career->title }}">
        @else
            <div class="jaf-section-title"><i class="fas fa-briefcase"></i> Position</div>
            <div class="form-group">
                <label class="col-form-label">Position Applying For</label>
                <select name="interested_in" class="form-control" required onchange="this.form.career_id.value = this.options[this.selectedIndex].dataset.id || ''">
                    <option value="">Select a position</option>
                    @foreach ($careerOptions ?? [] as $option)
                        <option value="{{ $option->title }}" data-id="{{ $option->id }}">{{ $option->title }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="career_id" value="">
            </div>
        @endif

        <div class="jaf-section-title"><i class="fas fa-user"></i> Personal Information</div>

        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">Full Name (as per NID)</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">Mobile Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">Email (optional)</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">NID Number</label>
                <input type="text" name="nid_number" class="form-control" value="{{ old('nid_number') }}" required>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">Date of Birth (as per NID)</label>
                <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="">Select gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
        </div>

        <div class="jaf-section-title"><i class="fas fa-map-marker-alt"></i> Address</div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label class="col-form-label">Present Address (village/area, house/road no.)</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">District</label>
                <select name="district" class="form-control" required>
                    <option value="">Select district</option>
                    @foreach (['Dhaka','Chattogram','Khulna','Rajshahi','Sylhet','Barishal','Rangpur','Mymensingh','Comilla','Gazipur','Narayanganj','Cox\'s Bazar','Bogura','Jashore','Dinajpur','Faridpur','Tangail','Noakhali','Pabna','Kishoreganj'] as $district)
                        <option value="{{ $district }}" {{ old('district') == $district ? 'selected' : '' }}>{{ $district }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">Thana / Upazila</label>
                <input type="text" name="thana" class="form-control" value="{{ old('thana') }}" required>
            </div>
        </div>

        <div class="jaf-section-title"><i class="fas fa-graduation-cap"></i> Education & Experience</div>

        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">Highest Educational Qualification</label>
                <select name="education" class="form-control" required>
                    <option value="">Select qualification</option>
                    @foreach (['SSC','HSC','Diploma','Bachelor','Master','PhD'] as $edu)
                        <option value="{{ $edu }}" {{ old('education') == $edu ? 'selected' : '' }}>{{ $edu }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label class="col-form-label">Do you have field-level work experience?</label>
                <select name="has_field_experience" class="form-control">
                    <option value="0">No</option>
                    <option value="1" {{ old('has_field_experience') ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label class="col-form-label">Cover Message (optional)</label>
                <textarea name="message" class="form-control" rows="4" placeholder="Tell us briefly why you're a great fit for this role...">{{ old('message') }}</textarea>
            </div>
        </div>

        <div class="jaf-section-title"><i class="fas fa-file-upload"></i> Resume / CV</div>

        <div class="form-group">
            <div class="jaf-upload" id="jafUpload">
                <i class="fas fa-cloud-upload-alt"></i>
                <div class="jaf-upload-text">Upload Your CV</div>
                <div class="jaf-upload-sub">PDF only &middot; Max 2MB &middot; Click or drag file here</div>
                <div class="jaf-filename" id="jafFileName"></div>
                <input type="file" name="job_files" accept="application/pdf" required id="jafFileInput">
            </div>
        </div>

        <div class="form-group" style="margin-top:8px;">
            <button type="submit" class="jaf-submit-btn">
                Submit Application <i class="fas fa-paper-plane"></i>
            </button>
        </div>

    </form>
</div>

<script>
    (function () {
        var input = document.getElementById('jafFileInput');
        var zone = document.getElementById('jafUpload');
        var label = document.getElementById('jafFileName');
        if (!input || !zone || !label) return;

        input.addEventListener('change', function () {
            label.textContent = input.files.length ? input.files[0].name : '';
        });

        ['dragenter', 'dragover'].forEach(function (evt) {
            zone.addEventListener(evt, function (e) {
                e.preventDefault();
                zone.classList.add('jaf-dragover');
            });
        });

        ['dragleave', 'drop'].forEach(function (evt) {
            zone.addEventListener(evt, function (e) {
                e.preventDefault();
                zone.classList.remove('jaf-dragover');
            });
        });
    })();
</script>
