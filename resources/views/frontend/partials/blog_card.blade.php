{{-- Expects $post (Blog model with blogDetail loaded) --}}
<div class="col-lg-4 col-sm-6">
    <div class="scale-hover-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30">
        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
            <a href="{{ route('frontend.blog.details', $post->slug) }}" class="w-100 h-100">
                <img src="{{ $post->blogDetail && $post->blogDetail->blog_image ? asset($post->blogDetail->blog_image) : asset('frontend/assets/images/thumbs/blog-two-img1.png') }}" alt="{{ $post->title }}" class="scale-hover-item__img rounded-12 cover-img transition-2">
            </a>
            <div class="position-absolute inset-inline-end-0 inset-block-end-0 me-16 mb-16 py-12 px-24 rounded-8 bg-main-three-600 text-white fw-medium text-center">
                <h3 class="mb-0 text-white fw-medium">{{ \Carbon\Carbon::parse($post->date)->format('d') }}</h3>
                {{ \Carbon\Carbon::parse($post->date)->format('M') }}
            </div>
        </div>
        <div class="pt-32 pb-24 px-16 position-relative">
            @if($post->blogDetail && $post->blogDetail->category)
                <span class="badge bg-main-focus text-main-600 px-16 py-6 rounded-pill mb-16">{{ $post->blogDetail->category->name }}</span>
            @endif
            <h4 class="mb-16">
                <a href="{{ route('frontend.blog.details', $post->slug) }}" class="link text-line-2">{{ $post->title }}</a>
            </h4>
            @if($post->blogDetail && $post->blogDetail->short_description)
                <p class="text-neutral-500 text-line-2 mb-0">{{ $post->blogDetail->short_description }}</p>
            @endif
            <div class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                <a href="{{ route('frontend.blog.details', $post->slug) }}" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold" tabindex="0">
                    Read More
                    <i class="ph ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
