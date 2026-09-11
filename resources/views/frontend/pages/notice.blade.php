@extends('frontend.dashboard')
@section('title', 'Notice')
@section('contents')

    <style>
        .notice-table th {
            background: #f15a29;
            color: #fff;
            font-weight: 600;
            vertical-align: middle;
        }

        .notice-table td {
            vertical-align: middle;
        }

        .notice-icon-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #fef1ec;
            color: #f15a29;
            margin: 0 3px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .notice-icon-btn:hover {
            background: #f15a29;
            color: #fff;
        }
    </style>

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Notice</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Notice</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="news-style-two sec-pad">

        <div class="auto-container">

            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 big-column">

                    <div class="content-side">

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover align-middle notice-table">

                                <thead>
                                    <tr>
                                        <th style="width: 60px;">SN</th>
                                        <th>Title</th>
                                        <th style="width: 160px;">Date</th>
                                        <th style="width: 130px;" class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($notice as $key => $item)
                                        <tr>
                                            <td>{{ $notice->count() - $key }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td class="text-center">
                                                <a href="{{ asset($item->files) }}" target="_blank" class="notice-icon-btn" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ asset($item->files) }}" download="{{ Str::slug($item->title) }}.{{ pathinfo($item->files, PATHINFO_EXTENSION) }}" class="notice-icon-btn notice-download-btn" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                            @if ($notice->isEmpty())
                                <div class="col-lg-12 text-center py-5">
                                    <h4>No notices found</h4>
                                    <p class="mb-0">There are no notices to show right now. Check back soon for updates.</p>
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <script>
        document.querySelectorAll('.notice-download-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var url = this.getAttribute('href');
                var filename = this.getAttribute('download');

                fetch(url)
                    .then(function(res) {
                        return res.blob();
                    })
                    .then(function(blob) {
                        var blobUrl = window.URL.createObjectURL(blob);
                        var link = document.createElement('a');
                        link.href = blobUrl;
                        link.download = filename;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        window.URL.revokeObjectURL(blobUrl);
                    })
                    .catch(function() {
                        // Fallback: normal navigation if fetch fails (e.g. CORS)
                        window.location.href = url;
                    });
            });
        });
    </script>

@endsection