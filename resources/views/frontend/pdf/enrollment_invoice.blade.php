<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admission Invoice {{ $enrollment->invoice }}</title>
    <style>
        @page {
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #2b2f38;
            font-size: 11.5px;
            margin: 0;
            padding: 0;
        }

        .page {
            padding: 0 36px 30px;
        }

        /* ===== Top color bar ===== */
        .top-bar {
            background: #163355;
            height: 8px;
            width: 100%;
        }

        /* ===== Header ===== */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 22px;
            margin-bottom: 4px;
        }

        .header-table td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }

        .brand-logo {
            width: 56px;
            height: 56px;
        }

        .brand-name {
            font-size: 18px;
            font-weight: bold;
            color: #163355;
            margin: 0;
        }

        .brand-tag {
            font-size: 10px;
            color: #8a93a3;
            letter-spacing: 0.4px;
            margin: 2px 0 0;
        }

        .invoice-badge-title {
            font-size: 20px;
            font-weight: bold;
            color: #b89867;
            text-align: right;
            letter-spacing: 1px;
            margin: 0;
        }

        .invoice-badge-no {
            font-size: 11px;
            color: #6b7280;
            text-align: right;
            margin: 4px 0 0;
        }

        .header-divider {
            border-bottom: 2px solid #eef1f5;
            margin: 14px 0 18px;
        }

        /* ===== Meta strip (Date / Status / Fee) ===== */
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 22px;
        }

        .meta-table td {
            border: 1px solid #eef1f5;
            background: #f8f9fc;
            padding: 10px 14px;
            width: 33.33%;
        }

        .meta-label {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #9aa3b2;
            margin: 0 0 4px;
        }

        .meta-value {
            font-size: 13px;
            font-weight: bold;
            color: #163355;
            margin: 0;
        }

        .status-pill {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .status-pending {
            background: #fff3cd;
            color: #8a6100;
        }

        .status-paid {
            background: #d7f2e1;
            color: #0f7a41;
        }

        .status-failed,
        .status-cancelled {
            background: #fbdada;
            color: #a3222b;
        }

        /* ===== Section ===== */
        .section-title {
            font-size: 11.5px;
            font-weight: bold;
            color: #ffffff;
            background: #163355;
            padding: 7px 12px;
            margin: 0 0 0;
            letter-spacing: 0.3px;
        }

        .section-title .accent {
            color: #d4b896;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        table.data-table td,
        table.data-table th {
            padding: 7px 12px;
            border: 1px solid #eef1f5;
            font-size: 11px;
        }

        table.data-table th {
            background: #f8f9fc;
            text-align: left;
            width: 30%;
            color: #6b7280;
            font-weight: normal;
        }

        table.data-table td {
            color: #2b2f38;
            font-weight: bold;
        }

        table.grid-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        table.grid-table th {
            background: #163355;
            color: #fff;
            padding: 7px 10px;
            font-size: 10px;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        table.grid-table td {
            padding: 7px 10px;
            border: 1px solid #eef1f5;
            font-size: 10.5px;
            color: #2b2f38;
        }

        table.grid-table tr:nth-child(even) td {
            background: #f8f9fc;
        }

        /* ===== Amount highlight ===== */
        .amount-box {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 22px;
            background: #163355;
            border-radius: 6px;
        }

        .amount-box td {
            background: #163355;
            color: #ffffff;
            padding: 14px 18px;
            border: none;
        }

        .amount-box .amt-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #cbd6e8;
            margin: 0 0 4px;
        }

        .amount-box .amt-value {
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            margin: 0;
        }

        .amount-box .amt-right {
            text-align: right;
            font-size: 10px;
            color: #d4b896;
        }

        /* ===== Signature ===== */
        .sign-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 26px;
        }

        .sign-table td {
            width: 50%;
            padding: 0 10px;
            vertical-align: top;
        }

        .sign-line {
            border-top: 1px solid #9aa3b2;
            margin-top: 34px;
            padding-top: 6px;
            font-size: 10px;
            color: #6b7280;
        }

        /* ===== Footer ===== */
        .footer-divider {
            border-top: 1px dashed #d7dbe3;
            margin-top: 24px;
            padding-top: 12px;
        }

        .footer-text {
            font-size: 9.5px;
            color: #9aa3b2;
            text-align: center;
            margin: 0;
        }

        .footer-brand {
            font-size: 9.5px;
            color: #163355;
            text-align: center;
            font-weight: bold;
            margin: 2px 0 0;
        }
    </style>
</head>

<body>

    <div class="top-bar"></div>

    <div class="page">

        {{-- Header --}}
        <table class="header-table">
            <tr>
                <td style="width:60px;">
                    <img src="{{ public_path('frontend/assets/images/logo/pinc_logo.png') }}" class="brand-logo">
                </td>
                <td>
                    <p class="brand-name">Peoples International Nursing College</p>
                    <p class="brand-tag">AFFILIATED WITH BANGLADESH NURSING AND MIDWIFERY COUNCIL</p>
                </td>
                <td>
                    <p class="invoice-badge-title">ADMISSION INVOICE</p>
                    <p class="invoice-badge-no">{{ $enrollment->invoice }}</p>
                </td>
            </tr>
        </table>
        <div class="header-divider"></div>

        {{-- Meta strip --}}
        @php
            $statusLabels = ['pending' => 'Pending', 'paid' => 'Approved', 'failed' => 'Rejected', 'cancelled' => 'Cancelled'];
        @endphp
        <table class="meta-table">
            <tr>
                <td>
                    <p class="meta-label">Issue Date</p>
                    <p class="meta-value">{{ $enrollment->created_at->format('d M, Y') }}</p>
                </td>
                <td>
                    <p class="meta-label">Course Applied For</p>
                    <p class="meta-value">{{ $enrollment->training->title }}</p>
                </td>
                <td>
                    <p class="meta-label">Application Status</p>
                    <span class="status-pill status-{{ $enrollment->status }}">{{ $statusLabels[$enrollment->status] ?? $enrollment->status }}</span>
                </td>
            </tr>
        </table>

        {{-- Registration Fee highlight --}}
        <table class="amount-box" cellpadding="0" cellspacing="0">
            <tr>
                <td style="width:60%;">
                    <p class="amt-label">Registration Fee</p>
                    <p class="amt-value"><span style="color:#d4b896; font-size:14px; margin-right:6px;">BDT</span>{{ number_format($enrollment->amount) }}</p>
                </td>
                <td class="amt-right" style="width:40%;">
                    Invoice No.<br>{{ $enrollment->invoice }}
                </td>
            </tr>
        </table>

        {{-- Personal Information --}}
        <div class="section-title">PERSONAL <span class="accent">INFORMATION</span></div>
        <table class="data-table">
            <tr>
                <th>Name of Candidate</th>
                <td>{{ $enrollment->name }}</td>
            </tr>
            <tr>
                <th>Father's Name</th>
                <td>{{ $enrollment->father_name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Mother's Name</th>
                <td>{{ $enrollment->mother_name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>{{ $enrollment->date_of_birth?->format('d M Y') ?? '-' }}</td>
            </tr>
            <tr>
                <th>Present Address</th>
                <td>{{ $enrollment->present_address ?? '-' }}</td>
            </tr>
            <tr>
                <th>Permanent Address</th>
                <td>{{ $enrollment->permanent_address ?? '-' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $enrollment->email ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tel/Mobile (Student)</th>
                <td>{{ $enrollment->phone }}</td>
            </tr>
            <tr>
                <th>Father/Mother Mobile</th>
                <td>{{ $enrollment->father_mother_mobile ?? '-' }}</td>
            </tr>
            <tr>
                <th>Blood Group</th>
                <td>{{ $enrollment->blood_group ?? '-' }}</td>
            </tr>
        </table>

        {{-- Academic Profile --}}
        <div class="section-title">ACADEMIC <span class="accent">PROFILE</span></div>
        <table class="grid-table">
            <tr>
                <th>Name of Exam</th>
                <th>Group</th>
                <th>GPA/Grade/Division</th>
                <th>Year</th>
                <th>Institute</th>
                <th>Board</th>
            </tr>
            <tr>
                <td>SSC / Equivalent</td>
                <td>{{ $enrollment->ssc_group ?? '-' }}</td>
                <td>{{ $enrollment->ssc_gpa ?? '-' }}</td>
                <td>{{ $enrollment->ssc_year ?? '-' }}</td>
                <td>{{ $enrollment->ssc_institute ?? '-' }}</td>
                <td>{{ $enrollment->ssc_board ?? '-' }}</td>
            </tr>
            <tr>
                <td>HSC / Equivalent</td>
                <td>{{ $enrollment->hsc_group ?? '-' }}</td>
                <td>{{ $enrollment->hsc_gpa ?? '-' }}</td>
                <td>{{ $enrollment->hsc_year ?? '-' }}</td>
                <td>{{ $enrollment->hsc_institute ?? '-' }}</td>
                <td>{{ $enrollment->hsc_board ?? '-' }}</td>
            </tr>
            <tr>
                <td>Diploma in Nursing Science &amp; Midwifery / Orthopaedics</td>
                <td>{{ $enrollment->diploma_group ?? '-' }}</td>
                <td>{{ $enrollment->diploma_gpa ?? '-' }}</td>
                <td>{{ $enrollment->diploma_year ?? '-' }}</td>
                <td>{{ $enrollment->diploma_institute ?? '-' }}</td>
                <td>{{ $enrollment->diploma_board ?? '-' }}</td>
            </tr>
        </table>

        {{-- Admission Test + Payment side by side --}}
        <table class="header-table" style="margin-bottom: 4px;">
            <tr>
                <td style="width:50%; vertical-align: top; padding-right: 8px;">
                    <div class="section-title">ADMISSION <span class="accent">TEST</span></div>
                    <table class="data-table">
                        <tr>
                            <th>Admit Roll</th>
                            <td>{{ $enrollment->admit_roll ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Test Score</th>
                            <td>{{ $enrollment->test_score ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Merit Position</th>
                            <td>{{ $enrollment->merit_position ?? '-' }}</td>
                        </tr>
                    </table>
                </td>
                <td style="width:50%; vertical-align: top; padding-left: 8px;">
                    <div class="section-title">PAYMENT <span class="accent">INFO</span></div>
                    <table class="data-table">
                        <tr>
                            <th>bKash Trx. ID</th>
                            <td>{{ $enrollment->bkash_trx_id ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>bKash Trx. Ref</th>
                            <td>{{ $enrollment->bkash_trx_ref ?? '-' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        {{-- Applicant Declaration --}}
        <div class="section-title" style="page-break-before: always; margin-top: 24px;">APPLICANT <span class="accent">DECLARATION</span></div>
        <table class="data-table">
            <tr>
                <th>Name of Applicant</th>
                <td>{{ $enrollment->applicant_name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Address of Applicant</th>
                <td>{{ $enrollment->applicant_address ?? '-' }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $enrollment->applicant_date?->format('d M Y') ?? '-' }}</td>
            </tr>
        </table>

        {{-- Signature block --}}
        <table class="sign-table">
            <tr>
                <td>
                    <div class="sign-line">Applicant's Signature</div>
                </td>
                <td>
                    <div class="sign-line">Authorized Signature — Peoples International Nursing College</div>
                </td>
            </tr>
        </table>

        {{-- Footer --}}
        <div class="footer-divider">
            <p class="footer-text">This is a system-generated invoice and does not require a physical signature to be valid.</p>
            <p class="footer-text">For any queries, please contact Peoples International Nursing College with your invoice number.</p>
            <p class="footer-brand">Peoples International Nursing College</p>
        </div>

    </div>

</body>

</html>
