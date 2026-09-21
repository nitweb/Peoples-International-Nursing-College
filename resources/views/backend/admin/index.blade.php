@extends('backend.admin.master')
@section('admin_title', 'Dashboard')

@section('admin_content')

    <style>
        .pd { --ink:#0F172A; --muted:#64748B; --line:#E8ECF2; --brand:#18477F; --brand-soft:#EAF1FA; --ok:#0E9F6E; --warn:#D97706; --bad:#DC2626; --info:#0284C7; }
        .pd * { box-sizing: border-box; }
        .pd .pd-card { background:#fff; border:1px solid var(--line); border-radius:14px; padding:20px; height:100%; }
        .pd .pd-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; gap:10px; }
        .pd .pd-title { font-size:15px; font-weight:600; color:var(--ink); margin:0; }
        .pd .pd-sub { font-size:12px; color:var(--muted); margin:2px 0 0; }
        .pd .pd-link { font-size:12px; font-weight:600; color:var(--brand); white-space:nowrap; }
        .pd .pd-link:hover { text-decoration:underline; }
        .pd .pd-row { display:grid; gap:16px; margin-bottom:16px; }
        .pd .g4 { grid-template-columns:repeat(4,1fr); }
        .pd .g-8-4 { grid-template-columns:2fr 1fr; }
        .pd .g-6-6 { grid-template-columns:1fr 1fr; }
        .pd .g-3 { grid-template-columns:repeat(3,1fr); }
        @media (max-width:1199px){ .pd .g4{grid-template-columns:repeat(2,1fr);} .pd .g-8-4,.pd .g-6-6,.pd .g-3{grid-template-columns:1fr;} }
        @media (max-width:575px){ .pd .g4{grid-template-columns:1fr;} }

        .pd .kpi { display:flex; align-items:flex-start; justify-content:space-between; gap:12px; text-decoration:none; transition:border-color .2s, transform .2s; }
        .pd a.kpi:hover { border-color:#C5D3E6; transform:translateY(-2px); }
        .pd .kpi-label { font-size:12px; color:var(--muted); font-weight:500; text-transform:uppercase; letter-spacing:.04em; }
        .pd .kpi-value { font-size:26px; font-weight:700; color:var(--ink); line-height:1.2; margin:6px 0 4px; }
        .pd .kpi-meta { font-size:12px; color:var(--muted); }
        .pd .kpi-meta b { color:var(--ink); font-weight:600; }
        .pd .kpi-ico { width:42px; height:42px; border-radius:11px; display:flex; align-items:center; justify-content:center; font-size:17px; flex-shrink:0; }
        .pd .ico-blue{background:#EAF1FA;color:#18477F;} .pd .ico-green{background:#E7F7F0;color:#0E9F6E;}
        .pd .ico-amber{background:#FEF3E2;color:#D97706;} .pd .ico-violet{background:#F0ECFD;color:#6D4AE0;}

        .pd .pd-top { display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; margin-bottom:18px; }
        .pd .pd-top h4 { font-size:20px; font-weight:700; color:var(--ink); margin:0; }
        .pd .pd-top p { font-size:13px; color:var(--muted); margin:2px 0 0; }
        .pd .pd-btn { display:inline-flex; align-items:center; gap:8px; padding:8px 16px; border-radius:9px; background:var(--brand); color:#fff !important; font-size:13px; font-weight:600; border:0; }
        .pd .pd-btn:hover { background:#123A66; text-decoration:none; }

        .pd table.pd-table { width:100%; border-collapse:collapse; margin:0; }
        .pd .pd-table th { font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:.05em; color:var(--muted); padding:8px 10px; border-bottom:1px solid var(--line); text-align:left; white-space:nowrap; }
        .pd .pd-table td { font-size:13px; color:var(--ink); padding:11px 10px; border-bottom:1px solid #F1F4F8; vertical-align:middle; }
        .pd .pd-table tr:last-child td { border-bottom:0; }
        .pd .pd-table tbody tr:hover { background:#FAFBFD; }
        .pd .pd-table .num { text-align:right; font-variant-numeric:tabular-nums; font-weight:600; }
        .pd .pd-table .sub { display:block; font-size:11px; color:var(--muted); font-weight:400; }
        .pd .table-wrap { overflow-x:auto; }
        .pd .empty { text-align:center; color:var(--muted); font-size:13px; padding:26px 0; }

        .pd .pill { display:inline-block; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600; text-transform:capitalize; }
        .pd .pill-ok{background:#E7F7F0;color:#0B7A55;} .pd .pill-warn{background:#FEF3E2;color:#B45309;}
        .pd .pill-bad{background:#FDECEC;color:#B91C1C;} .pd .pill-info{background:#E3F2FB;color:#0369A1;} .pd .pill-gray{background:#EEF1F5;color:#475569;}

        .pd .mini-stats { display:grid; grid-template-columns:repeat(4,1fr); gap:10px; margin-bottom:16px; }
        .pd .mini { background:#F7F9FC; border-radius:10px; padding:10px 12px; }
        .pd .mini span { display:block; font-size:11px; color:var(--muted); }
        .pd .mini b { font-size:18px; color:var(--ink); }
        @media (max-width:575px){ .pd .mini-stats{grid-template-columns:repeat(2,1fr);} }

        .pd .bar-item { margin-bottom:14px; }
        .pd .bar-item:last-child { margin-bottom:0; }
        .pd .bar-top { display:flex; justify-content:space-between; font-size:13px; margin-bottom:6px; gap:8px; }
        .pd .bar-top span:first-child { color:var(--ink); font-weight:500; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
        .pd .bar-top span:last-child { color:var(--muted); font-variant-numeric:tabular-nums; white-space:nowrap; }
        .pd .bar-track { height:7px; background:#EEF2F7; border-radius:10px; overflow:hidden; }
        .pd .bar-fill { height:100%; background:var(--brand); border-radius:10px; }

        .pd .list-item { display:flex; align-items:flex-start; gap:12px; padding:11px 0; border-bottom:1px solid #F1F4F8; }
        .pd .list-item:last-child { border-bottom:0; padding-bottom:0; }
        .pd .avatar { width:34px; height:34px; border-radius:50%; background:var(--brand-soft); color:var(--brand); font-weight:700; font-size:13px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .pd .li-main { flex:1; min-width:0; }
        .pd .li-main b { display:block; font-size:13px; color:var(--ink); font-weight:600; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
        .pd .li-main small { display:block; font-size:12px; color:var(--muted); overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
        .pd .li-time { font-size:11px; color:var(--muted); white-space:nowrap; }

        .pd .content-grid { display:grid; grid-template-columns:repeat(7,1fr); gap:12px; }
        @media (max-width:1399px){ .pd .content-grid{grid-template-columns:repeat(5,1fr);} }
        @media (max-width:991px){ .pd .content-grid{grid-template-columns:repeat(3,1fr);} }
        @media (max-width:575px){ .pd .content-grid{grid-template-columns:repeat(2,1fr);} }
        .pd .content-tile { display:block; text-decoration:none; background:#F7F9FC; border:1px solid transparent; border-radius:12px; padding:14px; transition:all .2s; }
        .pd .content-tile:hover { background:#fff; border-color:#C5D3E6; text-decoration:none; transform:translateY(-2px); }
        .pd .content-tile i { color:var(--brand); font-size:15px; }
        .pd .content-tile b { display:block; font-size:22px; color:var(--ink); margin-top:8px; line-height:1.1; }
        .pd .content-tile span { font-size:12px; color:var(--muted); }
        .pd a { color:inherit; }
        .pd a:hover { text-decoration:none; }
        .pd .stack { display:grid; gap:16px; }
    </style>

    @php
        $money = fn ($v) => '৳' . number_format((float) $v);
        $donPill = ['completed' => 'ok', 'pending' => 'warn', 'failed' => 'bad', 'cancelled' => 'gray'];
        $enrPill = ['paid' => 'ok', 'pending' => 'warn', 'failed' => 'bad', 'cancelled' => 'gray'];
        $jobPill = ['pending' => 'warn', 'shortlisted' => 'info', 'hired' => 'ok', 'rejected' => 'bad'];
    @endphp

    <div class="main-content">
        <section class="section">
            <div class="pd">

                {{-- Top bar --}}
                <div class="pd-top">
                    <div>
                        <h4>Dashboard</h4>
                        <p>{{ now()->format('l, d F Y') }} · Welcome back, {{ auth()->user()->name ?? 'Admin' }}</p>
                    </div>
                    <a href="{{ route('index') }}" target="_blank" class="pd-btn"><i class="fas fa-external-link-alt"></i> Visit Website</a>
                </div>

                {{-- KPI cards --}}
                <div class="pd-row g4">
                    <a href="{{ route('admin.donation.list') }}" class="pd-card kpi">
                        <div>
                            <div class="kpi-label">Total Donations</div>
                            <div class="kpi-value">{{ $money($donationStats['total_raised']) }}</div>
                            <div class="kpi-meta"><b>{{ $money($donationStats['this_month']) }}</b> this month</div>
                        </div>
                        <div class="kpi-ico ico-green"><i class="fas fa-hand-holding-heart"></i></div>
                    </a>
                    <a href="{{ route('admin.training.enrollment.list') }}" class="pd-card kpi">
                        <div>
                            <div class="kpi-label">Enrollments</div>
                            <div class="kpi-value">{{ number_format($enrollStats['total']) }}</div>
                            <div class="kpi-meta"><b>{{ $enrollStats['pending'] }}</b> pending · {{ $money($enrollStats['revenue']) }} paid</div>
                        </div>
                        <div class="kpi-ico ico-blue"><i class="fas fa-user-graduate"></i></div>
                    </a>
                    <a href="{{ route('admin.job_apply.list') }}" class="pd-card kpi">
                        <div>
                            <div class="kpi-label">Job Applications</div>
                            <div class="kpi-value">{{ number_format($jobStats['total']) }}</div>
                            <div class="kpi-meta"><b>{{ $jobStats['pending'] }}</b> pending · {{ $jobStats['open_jobs'] }} open jobs</div>
                        </div>
                        <div class="kpi-ico ico-violet"><i class="fas fa-briefcase"></i></div>
                    </a>
                    <a href="{{ route('admin.contact.list') }}" class="pd-card kpi">
                        <div>
                            <div class="kpi-label">Contact Messages</div>
                            <div class="kpi-value">{{ number_format($contactStats['total']) }}</div>
                            <div class="kpi-meta"><b>{{ $contactStats['today'] }}</b> today · {{ $contactStats['week'] }} this week</div>
                        </div>
                        <div class="kpi-ico ico-amber"><i class="fas fa-envelope"></i></div>
                    </a>
                </div>

                {{-- Trend charts --}}
                <div class="pd-row g-6-6">
                    <div class="pd-card">
                        <div class="pd-head">
                            <div>
                                <h5 class="pd-title">Donation Trend</h5>
                                <p class="pd-sub">Completed donations, last 6 months (BDT)</p>
                            </div>
                        </div>
                        <div id="pdDonationChart"></div>
                    </div>
                    <div class="pd-card">
                        <div class="pd-head">
                            <div>
                                <h5 class="pd-title">Enrollment Trend</h5>
                                <p class="pd-sub">New vs paid enrollments, last 6 months</p>
                            </div>
                        </div>
                        <div id="pdEnrollChart"></div>
                    </div>
                </div>

                {{-- Donations --}}
                <div class="pd-row g-8-4">
                    <div class="pd-card">
                        <div class="pd-head">
                            <div>
                                <h5 class="pd-title">Recent Donations</h5>
                                <p class="pd-sub">{{ $donationStats['completed'] }} completed · {{ $donationStats['pending'] }} pending · {{ $donationStats['failed'] }} failed/cancelled</p>
                            </div>
                            <a class="pd-link" href="{{ route('admin.donation.list') }}">View all →</a>
                        </div>
                        <div class="table-wrap">
                            <table class="pd-table">
                                <thead><tr><th>Donor</th><th>Category</th><th>Status</th><th class="num">Amount</th></tr></thead>
                                <tbody>
                                @forelse ($recentDonations as $d)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.donation.show', $d->id) }}"><b>{{ $d->is_anonymous ? 'Anonymous' : $d->donor_name }}</b></a>
                                            <span class="sub">{{ $d->invoice_no }} · {{ $d->created_at->diffForHumans() }}</span>
                                        </td>
                                        <td>{{ $d->category->title ?? 'General' }}</td>
                                        <td><span class="pill pill-{{ $donPill[$d->status] ?? 'gray' }}">{{ $d->status }}</span></td>
                                        <td class="num">{{ $money($d->amount) }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="empty">No donations yet.</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pd-card">
                        <div class="pd-head">
                            <div>
                                <h5 class="pd-title">Category-wise Donations</h5>
                                <p class="pd-sub">{{ number_format($donationStats['donors']) }} unique donors</p>
                            </div>
                            <a class="pd-link" href="{{ route('admin.donation-category.list') }}">Manage →</a>
                        </div>
                        @php $maxRaised = max(1, (float) ($categoryBreakdown->max('raised') ?? 1)); @endphp
                        @forelse ($categoryBreakdown as $c)
                            @php $pct = $c->target ? min(100, round(($c->raised / $c->target) * 100)) : round(($c->raised / $maxRaised) * 100); @endphp
                            <div class="bar-item">
                                <div class="bar-top">
                                    <span>{{ $c->title }}</span>
                                    <span>{{ $money($c->raised) }}{{ $c->target ? ' / ' . $money($c->target) : '' }}</span>
                                </div>
                                <div class="bar-track"><div class="bar-fill" style="width: {{ $pct }}%"></div></div>
                            </div>
                        @empty
                            <div class="empty">No completed donations yet.</div>
                        @endforelse
                    </div>
                </div>

                {{-- Enrollments --}}
                <div class="pd-row g-8-4">
                    <div class="pd-card">
                        <div class="pd-head">
                            <div>
                                <h5 class="pd-title">Recent Enrollments</h5>
                                <p class="pd-sub">Latest program &amp; course applications</p>
                            </div>
                            <a class="pd-link" href="{{ route('admin.training.enrollment.list') }}">View all →</a>
                        </div>
                        <div class="table-wrap">
                            <table class="pd-table">
                                <thead><tr><th>Student</th><th>Program</th><th>Status</th><th class="num">Amount</th></tr></thead>
                                <tbody>
                                @forelse ($recentEnrollments as $e)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.training.enrollment.show', $e->id) }}"><b>{{ $e->name }}</b></a>
                                            <span class="sub">{{ $e->phone }} · {{ $e->created_at->diffForHumans() }}</span>
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($e->training->title ?? '—', 34) }}</td>
                                        <td><span class="pill pill-{{ $enrPill[$e->status] ?? 'gray' }}">{{ $e->status }}</span></td>
                                        <td class="num">{{ $money($e->amount) }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="empty">No enrollments yet.</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pd-card">
                        <div class="pd-head">
                            <div>
                                <h5 class="pd-title">Enrollment Status</h5>
                                <p class="pd-sub">Overall breakdown</p>
                            </div>
                        </div>
                        <div id="pdEnrollStatus"></div>
                    </div>
                </div>

                {{-- Careers + Contacts --}}
                <div class="pd-row g-6-6">
                    <div class="pd-card">
                        <div class="pd-head">
                            <div>
                                <h5 class="pd-title">Job Applications</h5>
                                <p class="pd-sub">{{ $jobStats['open_jobs'] }} active job openings</p>
                            </div>
                            <a class="pd-link" href="{{ route('admin.job_apply.list') }}">View all →</a>
                        </div>
                        <div class="mini-stats">
                            <div class="mini"><span>Pending</span><b>{{ $jobStats['pending'] }}</b></div>
                            <div class="mini"><span>Shortlisted</span><b>{{ $jobStats['shortlisted'] }}</b></div>
                            <div class="mini"><span>Hired</span><b>{{ $jobStats['hired'] }}</b></div>
                            <div class="mini"><span>Rejected</span><b>{{ $jobStats['rejected'] }}</b></div>
                        </div>
                        <div class="table-wrap">
                            <table class="pd-table">
                                <thead><tr><th>Applicant</th><th>Position</th><th>Status</th></tr></thead>
                                <tbody>
                                @forelse ($recentApplications as $a)
                                    <tr>
                                        <td><b>{{ $a->name }}</b><span class="sub">{{ $a->phone }} · {{ $a->created_at->diffForHumans() }}</span></td>
                                        <td>{{ \Illuminate\Support\Str::limit($a->career->title ?? $a->interested_in, 30) }}</td>
                                        <td><span class="pill pill-{{ $jobPill[$a->status ?? 'pending'] ?? 'gray' }}">{{ $a->status ?? 'pending' }}</span></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="3" class="empty">No applications yet.</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if ($closingCareers->count())
                            <div style="margin-top:16px;padding-top:14px;border-top:1px solid #F1F4F8;">
                                <div class="pd-sub" style="margin-bottom:8px;font-weight:600;">Closing soon</div>
                                @foreach ($closingCareers as $cr)
                                    <div class="bar-top" style="margin-bottom:6px;">
                                        <span>{{ $cr->title }}</span>
                                        <span>{{ $cr->deadline->format('d M Y') }} · {{ $cr->deadline->diffForHumans() }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="pd-card">
                        <div class="pd-head">
                            <div>
                                <h5 class="pd-title">Latest Messages</h5>
                                <p class="pd-sub">{{ $contactStats['week'] }} received in the last 7 days</p>
                            </div>
                            <a class="pd-link" href="{{ route('admin.contact.list') }}">View all →</a>
                        </div>
                        @forelse ($recentContacts as $m)
                            <div class="list-item">
                                <div class="avatar">{{ strtoupper(mb_substr($m->name ?: 'U', 0, 1)) }}</div>
                                <div class="li-main">
                                    <b>{{ $m->name ?: 'Unknown' }}{{ $m->subject ? ' — ' . $m->subject : '' }}</b>
                                    <small>{{ \Illuminate\Support\Str::limit(strip_tags($m->message), 80) ?: ($m->email ?: $m->phone) }}</small>
                                </div>
                                <div class="li-time">{{ $m->created_at->diffForHumans(null, true, true) }}</div>
                            </div>
                        @empty
                            <div class="empty">No messages yet.</div>
                        @endforelse
                    </div>
                </div>

                {{-- Content overview --}}
                <div class="pd-card">
                    <div class="pd-head">
                        <div>
                            <h5 class="pd-title">Content Overview</h5>
                            <p class="pd-sub">Quick access to everything you manage</p>
                        </div>
                        <a class="pd-link" href="{{ route('admin.setting.edit', siteSetting()->id) }}"><i class="fas fa-cog"></i> Site Settings</a>
                    </div>
                    <div class="content-grid">
                        @foreach ($content as [$label, $count, $routeName, $icon])
                            <a class="content-tile" href="{{ route($routeName) }}">
                                <i class="fas {{ $icon }}"></i>
                                <b>{{ number_format($count) }}</b>
                                <span>{{ $label }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection

@section('footer_script')
    <script>
        (function () {
            if (typeof ApexCharts === 'undefined') return;

            var months = @json($chartMonths);
            var font = 'inherit';
            var grid = { borderColor: '#EEF2F7', strokeDashArray: 4 };

            new ApexCharts(document.querySelector('#pdDonationChart'), {
                chart: { type: 'area', height: 260, toolbar: { show: false }, fontFamily: font },
                series: [{ name: 'Donations', data: @json($donationTrend) }],
                xaxis: { categories: months, axisBorder: { show: false }, axisTicks: { show: false } },
                yaxis: { labels: { formatter: function (v) { return '৳' + Math.round(v).toLocaleString(); } } },
                stroke: { curve: 'smooth', width: 3 },
                fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: .25, opacityTo: 0.02 } },
                colors: ['#18477F'],
                dataLabels: { enabled: false },
                grid: grid,
                markers: { size: 4, strokeWidth: 0 },
                tooltip: { y: { formatter: function (v) { return '৳' + Math.round(v).toLocaleString(); } } }
            }).render();

            new ApexCharts(document.querySelector('#pdEnrollChart'), {
                chart: { type: 'bar', height: 260, toolbar: { show: false }, fontFamily: font },
                series: [
                    { name: 'New', data: @json($enrollTrend) },
                    { name: 'Paid', data: @json($enrollPaidTrend) }
                ],
                xaxis: { categories: months, axisBorder: { show: false }, axisTicks: { show: false } },
                yaxis: { labels: { formatter: function (v) { return Math.round(v); } } },
                plotOptions: { bar: { borderRadius: 4, columnWidth: '48%' } },
                colors: ['#93B4DA', '#0E9F6E'],
                dataLabels: { enabled: false },
                legend: { position: 'top', horizontalAlign: 'right', markers: { radius: 12 } },
                grid: grid
            }).render();

            new ApexCharts(document.querySelector('#pdEnrollStatus'), {
                chart: { type: 'donut', height: 270, fontFamily: font },
                series: [{{ $enrollStats['paid'] }}, {{ $enrollStats['pending'] }}, {{ $enrollStats['failed'] }}],
                labels: ['Paid', 'Pending', 'Failed / Cancelled'],
                colors: ['#0E9F6E', '#D97706', '#DC2626'],
                legend: { position: 'bottom' },
                dataLabels: { enabled: false },
                stroke: { width: 2 },
                plotOptions: { pie: { donut: { size: '72%', labels: { show: true, total: { show: true, label: 'Total', formatter: function () { return {{ $enrollStats['total'] }}; } } } } } }
            }).render();
        })();
    </script>
@endsection