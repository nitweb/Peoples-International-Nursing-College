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
                                    <a href="{{ route('admin.donation-category.add') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add Category</a>
                                    <a href="{{ route('admin.donation.list') }}" class="btn btn-outline-dark"><i class="fas fa-hand-holding-usd"></i> Transactions</a>
                                </h4>
                            </div>

                            <div class="card-body">

                                @include('widgets.errors')
                                @include('widgets.success')

                                <div class="table-responsive">

                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">

                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Target</th>
                                                <th>Raised</th>
                                                <th>Donors</th>
                                                <th>Featured</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($categories as $item)
                                                <tr>
                                                    <td>
                                                        @if ($item->image)
                                                            <div class="table_slider_list_image" style="background-image: url({{ asset($item->image) }});"></div>
                                                        @else
                                                            <span>No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->target_amount ? number_format($item->target_amount) : '—' }}</td>
                                                    <td>{{ number_format($item->raised_amount) }}</td>
                                                    <td>{{ $item->donor_count }}</td>
                                                    <td>
                                                        @if ($item->is_featured)
                                                            <span class="badge badge-primary">Featured</span>
                                                        @else
                                                            <span class="badge badge-secondary">No</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="badges">
                                                            @if ($item->status == 'active')
                                                                <span class="badge badge-success">Active</span>
                                                            @else
                                                                <span class="badge badge-danger">Inactive</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table_actions">
                                                            <a href="{{ route('frontend.donation.details', $item->slug) }}" target="_blank" class="btn btn-outline-secondary" title="View on Site"><i class="far fa-eye"></i></a>
                                                            <a href="{{ route('admin.donation-category.edit', $item->id) }}" class="btn btn-outline-primary" title="Edit"><i class="far fa-edit"></i></a>
                                                            <a href="#!" class="btn btn-outline-danger" data-del="{{ route('admin.donation-category.delete', $item->id) }}" data-bs-toggle="modal" data-bs-target="#donation_category_delete_modal" data-name="{{ $item->title }}" title="Delete"><i class="far fa-trash-alt"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="donation_category_delete_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5"></h3>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this donation category?</h5>
                </div>
                <div class="modal-footer" style="justify-content: space-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" id="final_delete" class="btn btn-outline-danger">Confirm Delete</a>
                </div>
            </div>
        </div>
    </div>
    {{-- End: Delete Modal --}}

@endsection

@section('footer_script')
    <script>
        $('#donation_category_delete_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-title').html('Delete <span class="text-danger">' + name + '</span>');
            $('#final_delete').attr('href', button.attr('data-del'))
        })
    </script>
@endsection
