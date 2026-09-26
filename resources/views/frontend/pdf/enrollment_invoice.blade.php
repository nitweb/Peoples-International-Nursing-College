<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $enrollment->invoice }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #222; font-size: 13px; }
        .header { text-align: center; border-bottom: 2px solid #0a5c36; padding-bottom: 12px; margin-bottom: 24px; }
        .header h1 { font-size: 18px; margin: 0 0 4px; color: #0a5c36; }
        .header p { margin: 0; font-size: 11px; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table td, table th { padding: 8px 10px; border: 1px solid #ddd; }
        table th { background: #f5f5f5; text-align: left; width: 35%; }
        .status { display: inline-block; padding: 2px 10px; border-radius: 10px; font-size: 11px; text-transform: uppercase; }
        .status-pending { background: #fff3cd; color: #7a5b00; }
        .status-paid { background: #d4edda; color: #155724; }
        .status-failed, .status-cancelled { background: #f8d7da; color: #721c24; }
        .footer { margin-top: 40px; font-size: 11px; color: #777; text-align: center; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Peoples International Nursing College</h1>
        <p>Training &amp; Development Enrollment Invoice</p>
    </div>

    <table>
        <tr>
            <th>Invoice No.</th>
            <td>{{ $enrollment->invoice }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $enrollment->created_at->format('d M, Y h:i A') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td><span class="status status-{{ $enrollment->status }}">{{ $enrollment->status }}</span></td>
        </tr>
    </table>

    <table>
        <tr>
            <th>Enrollee Name</th>
            <td>{{ $enrollment->name }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $enrollment->phone }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $enrollment->email ?? '-' }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $enrollment->address ?? '-' }}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th>Course</th>
            <td>{{ $enrollment->training->title }}</td>
        </tr>
        <tr>
            <th>Amount Paid</th>
            <td>৳ {{ number_format($enrollment->amount) }}</td>
        </tr>
    </table>

    <div class="footer">
        This is a system-generated invoice. For queries, please contact Peoples International Nursing College with your invoice number.
    </div>

</body>
</html>
