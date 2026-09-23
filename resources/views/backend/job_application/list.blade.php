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
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-dark"><i class="fas fa-arrow-left"></i> Back</a>
                                </h4>
                            </div>

                            <div class="card-body">

                                @include('widgets.errors')
                                @include('widgets.success')

                                <div class="table-responsive">
                                    <form id="deleteSelectedForm" action="{{ route('admin.job_apply.deleteSelected') }}" method="POST">
                                        @csrf
                                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" id="selectAll" />
                                                    </th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Position</th>
                                                    <th>District</th>
                                                    <th>Education</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($job_applications as $key => $item)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="selectItem" name="ids[]" value="{{ $item->id }}">
                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->interested_in }}</td>
                                                        <td>{{ $item->district }}</td>
                                                        <td>{{ $item->education }}</td>
                                                        <td>
                                                            <form action="{{ route('admin.job_apply.status.update', $item->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <select name="status" class="form-control form-control-sm" onchange="this.form.submit()" style="min-width:110px;">
                                                                    @foreach (['pending','shortlisted','rejected','hired'] as $statusOption)
                                                                        <option value="{{ $statusOption }}" {{ $item->status == $statusOption ? 'selected' : '' }}>
                                                                            {{ ucfirst($statusOption) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <div class="table_actions d-flex gap-2">
                                                                <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#jobApplicationModal"
                                                                    data-interest="{{ $item->interested_in }}"
                                                                    data-message="{{ $item->message }}"
                                                                    data-email="{{ $item->email }}"
                                                                    data-nid="{{ $item->nid_number }}"
                                                                    data-dob="{{ $item->date_of_birth ? \Carbon\Carbon::parse($item->date_of_birth)->format('d M, Y') : '' }}"
                                                                    data-gender="{{ ucfirst($item->gender) }}"
                                                                    data-address="{{ $item->address }}, {{ $item->thana }}, {{ $item->district }}"
                                                                    data-experience="{{ $item->has_field_experience ? 'Yes' : 'No' }}">
                                                                    <i class="fas fa-eye"></i> View Details
                                                                </a>

                                                                @if ($item->job_files)
                                                                    <a href="{{ asset($item->job_files) }}" download class="btn btn-outline-danger">
                                                                        <i class="fas fa-download"></i> Download CV
                                                                    </a>
                                                                @endif

                                                                <a href="{{ route('admin.job_apply.delete', $item->id) }}" class="btn btn-outline-danger">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <button type="submit" class="btn btn-outline-danger" id="deleteSelectedButton" disabled>Delete Selected</button>
                                    </form>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="jobApplicationModal" tabindex="-1" aria-labelledby="jobApplicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body mt-4">
                    <div>
                        <h6>Position Applied For:</h6>
                        <p id="modal-subject"></p>
                    </div>
                    <div>
                        <h6>Email:</h6>
                        <p id="modal-email"></p>
                    </div>
                    <div>
                        <h6>NID Number:</h6>
                        <p id="modal-nid"></p>
                    </div>
                    <div>
                        <h6>Date of Birth:</h6>
                        <p id="modal-dob"></p>
                    </div>
                    <div>
                        <h6>Gender:</h6>
                        <p id="modal-gender"></p>
                    </div>
                    <div>
                        <h6>Address:</h6>
                        <p id="modal-address"></p>
                    </div>
                    <div>
                        <h6>Field-level Experience:</h6>
                        <p id="modal-experience"></p>
                    </div>
                    <div>
                        <h6>Cover Message:</h6>
                        <p id="modal-message"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('footer_script')
    <script>
        var jobApplicationModal = document.getElementById('jobApplicationModal');
        jobApplicationModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;

            // Extract info from data-* attributes
            var subject = button.getAttribute('data-interest');
            var message = button.getAttribute('data-message');
            var email = button.getAttribute('data-email');
            var nid = button.getAttribute('data-nid');
            var dob = button.getAttribute('data-dob');
            var gender = button.getAttribute('data-gender');
            var address = button.getAttribute('data-address');
            var experience = button.getAttribute('data-experience');

            // Update the modal's content
            jobApplicationModal.querySelector('#modal-subject').textContent = subject;
            jobApplicationModal.querySelector('#modal-message').textContent = message;
            jobApplicationModal.querySelector('#modal-email').textContent = email;
            jobApplicationModal.querySelector('#modal-nid').textContent = nid;
            jobApplicationModal.querySelector('#modal-dob').textContent = dob;
            jobApplicationModal.querySelector('#modal-gender').textContent = gender;
            jobApplicationModal.querySelector('#modal-address').textContent = address;
            jobApplicationModal.querySelector('#modal-experience').textContent = experience;
        });
    </script>

    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('.selectItem');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = this.checked;
            });
            toggleDeleteButton();
        });

        document.querySelectorAll('.selectItem').forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                toggleDeleteButton();
            });
        });

        function toggleDeleteButton() {
            let selectedItems = document.querySelectorAll('.selectItem:checked').length;
            document.getElementById('deleteSelectedButton').disabled = selectedItems === 0;
        }
    </script>
@endsection
