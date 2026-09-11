@extends('frontend.dashboard')
@section('title', $blog->title)
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title-two">
        <div class="bg-layer" style="background-image: url({{ asset($blog->blogDetail->blog_image) }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $blog->title }}</h1>
                <ul class="post-info clearfix">
                    <li><i class="icon-15"></i>{{ $author ?? 'N/A' }}</li>
                    <li><i class="far fa-calendar"></i>{{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}</li>
                    <li><i class="icon-16"></i>{{ $blog->blogDetail->category->name }}</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Blog Details --}}
    <section class="sidebar-page-container">

        <div class="auto-container">

            <div class="row clearfix">

                <div class="col-lg-8 col-md-12 col-sm-12 content-side">

                    <div class="blog-details-content">

                        <div class="content-one">

                            <div class="text rich-content">
                                {!! $blog->blogDetail->long_description !!}
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">

                    <div class="default-sidebar blog-sidebar ml_20">

                        {{-- <div class="sidebar-widget search-widget">
                                <div class="widget-title">
                                    <h3>Search</h3>
                                </div>
                                <div class="form-inner">
                                    <form action="https://azim.commonsupport.com/Trusthand/blog-2.html" method="post">
                                        <div class="form-group">
                                            <input type="search" name="search-field" placeholder="Search..." required="">
                                            <button type="submit"><i class="icon-1"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}

                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h3>Related Posts</h3>
                            </div>
                            <div class="post-inner">
                                @foreach ($recent_blogs as $item)
                                    <div class="post">
                                        <figure class="post-thumb" style="width:80px; height:80px; overflow:hidden;">
                                            <a href="{{ route('frontend.blog.details', $item->slug) }}">
                                                <img src="{{ asset($item->blogDetail->blog_image) }}" alt="{{ $item->title }}" style="width:100%; height:100%; object-fit:cover;">
                                            </a>
                                        </figure>
                                        <h5><a href="{{ route('frontend.blog.details', $item->slug) }}" title="{{ $item->title }}">{{ Str::limit($item->title, 35) }}</a></h5>
                                        <span class="post-date"><i class="far fa-calendar mr-2"></i>{{ \Carbon\Carbon::parse($item->date)->format('F j, Y') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="donate-widget">
                            <div class="inner-box" style="background-image: url({{ asset('frontend/assets/images/resource/sidebar-image-1.jpg') }});">
                                <div class="icon-box"><img src="{{ asset('frontend/assets/images/favicon.png') }}" alt="" style="width: 80px; "></div>
                                <h3>Make Homeless People Happy</h3>
                                <a href="{{ route('frontend.donation.list') }}" class="donate-box-btn theme-btn-one"><span>Donate Now</span></a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection