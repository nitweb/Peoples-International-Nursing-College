@extends('frontend.dashboard')
@section('title', 'Blog')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Blog</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="news-style-two sec-pad">

        <div class="auto-container">

            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 big-column">

                    <div class="content-side">

                        <div class="row clearfix">

                            @foreach ($blog as $item)
                                <div class="col-lg-4 col-md-4 col-sm-12 news-block mb-5">

                                    <div class="news-block-two">

                                        <div class="inner-box">

                                            <figure class="image-box" style="width: 430px; height: 285px; overflow: hidden; margin: 0 auto;">
                                                <a href="{{ route('frontend.blog.details', $item->slug) }}">
                                                    <img src="{{ asset($item->blogDetail->blog_image) }}" alt="{{ $item->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                </a>
                                            </figure>

                                            <div class="lower-content">

                                                <span class="post-date" style="background: #f15a29;">{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</span>

                                                <h3><a href="{{ route('frontend.blog.details', $item->slug) }}" title="{{ $item->title }}">{{ Str::limit($item->title, 50) }}</a></h3>

                                                <p style="text-align: justify;">
                                                    {{ Str::limit($item->blogDetail->short_description, 110) }}
                                                </p>

                                                <div class="btn-box">
                                                    <a href="{{ route('frontend.blog.details', $item->slug) }}" class="theme-btn-two">Read more</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            @endforeach

                            @if ($blog->isEmpty())
                                <div class="col-lg-12 text-center py-5">
                                    <h4>No blogs found</h4>
                                    <p class="mb-0">There are no blog posts to show right now. Check back soon for new content.</p>
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
