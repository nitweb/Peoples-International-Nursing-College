<section class="blog-two py-120 bg-main-25">
    <div class="container">
        <div class="section-heading text-center">
            <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                <h5 class="text-main-600 mb-0">Latest News</h5>
            </div>
            <h2 class="mb-24 wow bounceIn">Stay Informed, Stay Inspired</h2>
            <p class="wow bounceInUp">Insights, stories, and updates from Peoples International Nursing College</p>
        </div>

        @if ($blog->count())
            <div class="row gy-4">
                @foreach ($blog as $post)
                    @include('frontend.partials.blog_card', ['post' => $post])
                @endforeach
            </div>

            <div class="text-center mt-48">
                <a href="{{ route('frontend.blog.list') }}" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8">
                    View All Posts
                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                </a>
            </div>
        @else
            <div class="text-center py-40">
                <p class="text-neutral-500 mb-0">No blog posts published yet.</p>
            </div>
        @endif
    </div>
</section>
