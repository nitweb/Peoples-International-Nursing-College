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
                                    <a href="{{ route('admin.donation.list') }}" class="btn btn-outline-primary"><i class="fas fa-list"></i> Transaction List</a>
                                </h4>
                            </div>

                            <div class="card-body">

                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:220px;">Invoice No.</th>
                                        <td>{{ $donation->invoice_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>Donation Cause</th>
                                        <td>{{ $donation->category->title ?? 'General Donation' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Donor Name</th>
                                        <td>{{ $donation->donor_name }} {{ $donation->is_anonymous ? '(requested anonymous on site)' : '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $donation->donor_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $donation->donor_email ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Message</th>
                                        <td>{{ $donation->message ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td>৳{{ number_format($donation->amount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>{{ strtoupper($donation->payment_method) }}</td>
                                    </tr>
                                    <tr>
                                        <th>bKash Payment ID</th>
                                        <td>{{ $donation->bkash_payment_id ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <th>bKash Transaction ID</th>
                                        <td>{{ $donation->bkash_trx_id ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($donation->status == 'completed')
                                                <span class="badge badge-success">Completed</span>
                                            @elseif ($donation->status == 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif ($donation->status == 'cancelled')
                                                <span class="badge badge-secondary">Cancelled</span>
                                            @else
                                                <span class="badge badge-danger">Failed</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Paid At</th>
                                        <td>{{ $donation->paid_at?->format('d M Y, h:i A') ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Submitted At</th>
                                        <td>{{ $donation->created_at->format('d M Y, h:i A') }}</td>
                                    </tr>
                                    @if ($donation->payment_response)
                                        <tr>
                                            <th>Gateway Response (raw)</th>
                                            <td>
                                                <pre style="white-space:pre-wrap; margin:0;">{{ json_encode($donation->payment_response, JSON_PRETTY_PRINT) }}</pre>
                                            </td>
                                        </tr>
                                    @endif
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
