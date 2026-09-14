@extends('frontend.dashboard')
@section('title', $blog->title)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => $blog->title, 'parent' => 'Blog', 'parent_url' => route('frontend.blog.list')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5">

                <div class="col-lg-8">
                    <img src="{{ $blog->blogDetail && $blog->blogDetail->blog_image ? asset($blog->blogDetail->blog_image) : asset('frontend/assets/images/thumbs/blog-two-img1.png') }}" alt="{{ $blog->title }}" class="rounded-16 w-100 mb-32" style="max-height: 420px; object-fit: cover;">

                    <div class="flex-align gap-14 flex-wrap mb-20">
                        <div class="flex-align gap-8">
                            <span class="text-neutral-500 text-2xl d-flex"><i class="ph ph-user-circle"></i></span>
                            <span class="text-neutral-500 text-lg">By {{ $author }}</span>
                        </div>
                        <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                        <div class="flex-align gap-8">
                            <span class="text-neutral-500 text-2xl d-flex"><i class="ph-bold ph-calendar"></i></span>
                            <span class="text-neutral-500 text-lg">{{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</span>
                        </div>
                        @if($blog->blogDetail && $blog->blogDetail->category)
                            <span class="w-8 h-8 bg-neutral-100 rounded-circle"></span>
                            <span class="badge bg-main-focus text-main-600 px-16 py-6 rounded-pill">{{ $blog->blogDetail->category->name }}</span>
                        @endif
                    </div>

                    <h2 class="mb-24">{{ $blog->title }}</h2>

                    <div class="text-neutral-500 fs-5">
                        {!! $blog->blogDetail->long_description ?? '' !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="p-24 bg-main-25 rounded-16 border border-neutral-30">
                        <h6 class="mb-24">Recent Posts</h6>
                        @forelse($recent_blogs as $recent)
                            <a href="{{ route('frontend.blog.details', $recent->slug) }}" class="d-flex gap-12 mb-16 pb-16 border-bottom border-neutral-50 border-dashed border-0 text-decoration-none">
                                <img src="{{ $recent->blogDetail && $recent->blogDetail->blog_image ? asset($recent->blogDetail->blog_image) : asset('frontend/assets/images/thumbs/blog-two-img1.png') }}" alt="{{ $recent->title }}" class="w-64 h-64 rounded-8 object-fit-cover flex-shrink-0">
                                <div>
                                    <span class="d-block text-neutral-700 fw-medium text-line-2 mb-4">{{ $recent->title }}</span>
                                    <span class="d-block text-neutral-500 text-sm">{{ \Carbon\Carbon::parse($recent->date)->format('d M, Y') }}</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-neutral-500 mb-0">No other posts yet.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
