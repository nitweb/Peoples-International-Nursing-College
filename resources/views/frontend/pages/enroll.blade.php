@extends('frontend.dashboard')
@section('title', 'Admission Form - ' . $training->title)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Admission Form', 'parent' => $training->title, 'parent_url' => route('frontend.training.development.details', $training->slug)])

    <style>
        .file-upload-box {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            border: 1px solid #e0e3eb;
            border-radius: 8px;
            background: #fff;
            overflow: hidden;
        }

        .file-upload-box input[type="file"] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            margin: 0;
        }

        .file-upload-box .file-upload-btn {
            flex-shrink: 0;
            padding: 10px 18px;
            background: #163355;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
        }

        .file-upload-box .file-upload-name {
            flex-grow: 1;
            padding: 10px 14px;
            font-size: 14px;
            color: #6b7280;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .file-upload-box:hover .file-upload-btn {
            background: #0f2440;
        }

        .file-upload-box.has-file .file-upload-name {
            color: #163355;
            font-weight: 500;
        }
    </style>

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5 justify-content-center">

                <div class="col-lg-12">
                    <div class="p-32 bg-main-25 rounded-16 border border-neutral-30">
                        <h4 class="mb-32">Admission Application Form</h4>

                        @include('widgets.errors')
                        @include('widgets.success')

                        <form action="{{ route('frontend.training.enroll.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="training_id" value="{{ $training->id }}">

                            {{-- Course + Photo --}}
                            <div class="row">
                                <div class="col-sm-8 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Courses for admission <span class="text-danger-600">*</span></label>
                                    <input type="text" class="common-input rounded-8 w-100" value="{{ $training->title }}" disabled>
                                </div>
                                <div class="col-sm-4 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Photo <span class="text-danger-600">*</span></label>
                                    <label class="file-upload-box">
                                        <span class="file-upload-btn">Choose File</span>
                                        <span class="file-upload-name" data-placeholder="No file chosen">No file chosen</span>
                                        <input type="file" name="photo" accept="image/*" required>
                                    </label>
                                </div>
                            </div>

                            <h6 class="mt-16 mb-16">Personal Information</h6>
                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Name of Candidate <span class="text-danger-600">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="common-input rounded-8 w-100" required>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Father's Name <span class="text-danger-600">*</span></label>
                                    <input type="text" name="father_name" value="{{ old('father_name') }}" class="common-input rounded-8 w-100" required>
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Mother's Name</label>
                                    <input type="text" name="mother_name" value="{{ old('mother_name') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Age</label>
                                    <input type="number" name="age" value="{{ old('age') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Place of Birth</label>
                                    <input type="text" name="place_of_birth" value="{{ old('place_of_birth') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Nationality</label>
                                    <input type="text" name="nationality" value="{{ old('nationality') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Religion</label>
                                    <input type="text" name="religion" value="{{ old('religion') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Permanent Address</label>
                                    <input type="text" name="permanent_address" value="{{ old('permanent_address') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Present Address</label>
                                    <input type="text" name="present_address" value="{{ old('present_address') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Tel/Mobile (Student) <span class="text-danger-600">*</span></label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="common-input rounded-8 w-100" placeholder="01XXXXXXXXX" required>
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Father/Mother Mobile <span class="text-danger-600">*</span></label>
                                    <input type="text" name="father_mother_mobile" value="{{ old('father_mother_mobile') }}" class="common-input rounded-8 w-100" required>
                                </div>
                            </div>

                            <h6 class="mt-16 mb-16">Local Guardian</h6>
                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Name of Local Guardian</label>
                                    <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Guardian Mobile</label>
                                    <input type="text" name="guardian_mobile" value="{{ old('guardian_mobile') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>

                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Local Guardian Address</label>
                                <input type="text" name="guardian_address" value="{{ old('guardian_address') }}" class="common-input rounded-8 w-100">
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Relation</label>
                                    <input type="text" name="guardian_relation" value="{{ old('guardian_relation') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Occupation</label>
                                    <input type="text" name="guardian_occupation" value="{{ old('guardian_occupation') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Tel/Mobile</label>
                                    <input type="text" name="guardian_tel" value="{{ old('guardian_tel') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Blood Group</label>
                                    <select name="blood_group" class="common-input rounded-8 w-100">
                                        <option value="">Select Blood Group</option>
                                        @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bg)
                                            <option value="{{ $bg }}" @selected(old('blood_group') === $bg)>{{ $bg }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <h6 class="mt-16 mb-16">Academic Profile</h6>
                            <div class="table-responsive mb-24">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name of Exam</th>
                                            <th>Group</th>
                                            <th>GPA/Grade/Division</th>
                                            <th>Year</th>
                                            <th>Institute</th>
                                            <th>Board</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">SSC / Equivalent</td>
                                            <td><input type="text" name="ssc_group" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="ssc_gpa" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="ssc_year" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="ssc_institute" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="ssc_board" class="common-input rounded-8 w-100"></td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">HSC / Equivalent</td>
                                            <td><input type="text" name="hsc_group" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="hsc_gpa" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="hsc_year" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="hsc_institute" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="hsc_board" class="common-input rounded-8 w-100"></td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">Diploma in Nursing Science and Midwifery / Orthopaedics</td>
                                            <td><input type="text" name="diploma_group" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="diploma_gpa" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="diploma_year" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="diploma_institute" class="common-input rounded-8 w-100"></td>
                                            <td><input type="text" name="diploma_board" class="common-input rounded-8 w-100"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Admit Roll <span class="text-danger-600">*</span></label>
                                    <input type="text" name="admit_roll" value="{{ old('admit_roll') }}" class="common-input rounded-8 w-100" required>
                                </div>
                                <div class="col-sm-4 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Test Score</label>
                                    <input type="text" name="test_score" value="{{ old('test_score') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-4 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Merit Position</label>
                                    <input type="text" name="merit_position" value="{{ old('merit_position') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>

                            <h6 class="mt-16 mb-16">Document Uploads</h6>
                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">SSC Certificate</label>
                                    <label class="file-upload-box">
                                        <span class="file-upload-btn">Choose File</span>
                                        <span class="file-upload-name">No file chosen</span>
                                        <input type="file" name="ssc_certificate">
                                    </label>
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">SSC Mark-sheet</label>
                                    <label class="file-upload-box">
                                        <span class="file-upload-btn">Choose File</span>
                                        <span class="file-upload-name">No file chosen</span>
                                        <input type="file" name="ssc_marksheet">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">HSC Certificate</label>
                                    <label class="file-upload-box">
                                        <span class="file-upload-btn">Choose File</span>
                                        <span class="file-upload-name">No file chosen</span>
                                        <input type="file" name="hsc_certificate">
                                    </label>
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">HSC Mark-sheet</label>
                                    <label class="file-upload-box">
                                        <span class="file-upload-btn">Choose File</span>
                                        <span class="file-upload-name">No file chosen</span>
                                        <input type="file" name="hsc_marksheet">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Admission Test Admit Card</label>
                                    <label class="file-upload-box">
                                        <span class="file-upload-btn">Choose File</span>
                                        <span class="file-upload-name">No file chosen</span>
                                        <input type="file" name="admission_test_admit_card">
                                    </label>
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Diploma in Nursing Science and Midwifery Certificate</label>
                                    <label class="file-upload-box">
                                        <span class="file-upload-btn">Choose File</span>
                                        <span class="file-upload-name">No file chosen</span>
                                        <input type="file" name="diploma_certificate">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Diploma in Nursing Science and Midwifery Registration Card</label>
                                    <label class="file-upload-box">
                                        <span class="file-upload-btn">Choose File</span>
                                        <span class="file-upload-name">No file chosen</span>
                                        <input type="file" name="diploma_registration_card">
                                    </label>
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">NID or Birth Certificate</label>
                                    <label class="file-upload-box">
                                        <span class="file-upload-btn">Choose File</span>
                                        <span class="file-upload-name">No file chosen</span>
                                        <input type="file" name="nid_or_birth_certificate">
                                    </label>
                                </div>
                            </div>

                            <h6 class="mt-16 mb-16">Payment</h6>
                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">bKash Transaction ID</label>
                                    <input type="text" name="bkash_trx_id" value="{{ old('bkash_trx_id') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">bKash Transaction Ref</label>
                                    <input type="text" name="bkash_trx_ref" value="{{ old('bkash_trx_ref') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>

                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Note</label>
                                <textarea name="note" rows="3" class="common-input rounded-8 w-100">{{ old('note') }}</textarea>
                            </div>

                            <div class="p-24 bg-white rounded-12 border border-neutral-30 mb-24">
                                <strong>Declaration</strong>
                                <ol class="text-neutral-500 text-sm mt-8 mb-16" style="padding-left:18px;">
                                    <li>I declare that all information, mark-sheets and certificates provided are true and I will not apply for cancellation after admission is closed.</li>
                                    <li>I agree to follow all course fee rules. Fees paid during admission are non-refundable and cannot be transferred to another course.</li>
                                    <li>Bangladesh Nursing College authority reserves the right to cancel my registration fee if the admission is cancelled after confirmation.</li>
                                    <li>I will pay the yearly tuition fee within the fixed time as per notice.</li>
                                    <li>I confirm that I have no unresolved disciplinary issue with any previous institution and I will provide supporting documents if required.</li>
                                    <li>I will abide by the rules and regulations of the college/institution, Bangladesh Nursing and Midwifery Council and Bangladesh Government.</li>
                                    <li>I will remain free from ragging, drugs, smoking, gambling and any other disciplinary offence, failing which I shall be fully responsible.</li>
                                    <li>Institution authority's decision regarding admission and any other matter shall be final.</li>
                                </ol>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="declaration_accepted" id="declaration_accepted" value="1" required>
                                    <label class="form-check-label" for="declaration_accepted">
                                        I have read and agree to the above declaration <span class="text-danger-600">*</span>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Name of Applicant <span class="text-danger-600">*</span></label>
                                    <input type="text" name="applicant_name" value="{{ old('applicant_name') }}" class="common-input rounded-8 w-100" required>
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Address of Applicant <span class="text-danger-600">*</span></label>
                                    <input type="text" name="applicant_address" value="{{ old('applicant_address') }}" class="common-input rounded-8 w-100" required>
                                </div>
                            </div>

                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Date</label>
                                <input type="date" name="applicant_date" value="{{ old('applicant_date', date('Y-m-d')) }}" class="common-input rounded-8 w-100">
                            </div>

                            <div class="p-24 bg-white rounded-12 border border-neutral-30 mb-24">
                                <span class="text-neutral-500 text-sm">Registration fee: ৳{{ number_format($training->registration_fee ?? 0) }}</span>
                            </div>

                            <button type="submit" class="btn btn-main rounded-pill w-100 justify-content-center">
                                Apply
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.file-upload-box input[type="file"]').forEach(function(input) {
            input.addEventListener('change', function() {
                var box = this.closest('.file-upload-box');
                var nameSpan = box.querySelector('.file-upload-name');
                if (this.files && this.files.length > 0) {
                    nameSpan.textContent = this.files[0].name;
                    box.classList.add('has-file');
                } else {
                    nameSpan.textContent = 'No file chosen';
                    box.classList.remove('has-file');
                }
            });
        });
    </script>
@endsection
