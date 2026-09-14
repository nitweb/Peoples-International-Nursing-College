@extends('frontend.dashboard')
@section('title', 'Blog')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Blog'])

    <div class="blog-page-section py-120">
        <div class="container">

            <div class="flex-between gap-16 flex-wrap mb-40">
                <span class="text-neutral-500">Showing {{ $blog->count() }} of {{ $blog->total() }} Results</span>
                <div class="position-relative" style="min-width: 280px;">
                    <input type="text" id="blogSearchInput" class="common-input rounded-pill bg-main-25 pe-48 border-neutral-30 w-100" placeholder="Search articles...">
                    <span class="position-absolute top-50 translate-middle-y inset-inline-end-0 me-16 text-neutral-500"><i class="ph-bold ph-magnifying-glass"></i></span>
                    <div id="blogSearchResults" class="position-absolute w-100 bg-white rounded-12 border border-neutral-30 shadow-sm mt-8 z-3 d-none" style="max-height: 360px; overflow-y: auto;"></div>
                </div>
            </div>

            @if($blog->count())
                <div class="row gy-4">
                    @foreach($blog as $post)
                        @include('frontend.partials.blog_card', ['post' => $post])
                    @endforeach
                </div>

                <div class="mt-48">
                    {{ $blog->links() }}
                </div>
            @else
                <div class="text-center py-40">
                    <p class="text-neutral-500 mb-0">No blog posts published yet. Please check back soon.</p>
                </div>
            @endif

        </div>
    </div>

    <script>
        (function () {
            var input = document.getElementById('blogSearchInput');
            var resultsBox = document.getElementById('blogSearchResults');
            var timer = null;

            input.addEventListener('input', function () {
                clearTimeout(timer);
                var query = input.value.trim();

                if (query.length < 2) {
                    resultsBox.classList.add('d-none');
                    resultsBox.innerHTML = '';
                    return;
                }

                timer = setTimeout(function () {
                    fetch("{{ route('frontend.blog.search') }}?q=" + encodeURIComponent(query))
                        .then(function (res) { return res.json(); })
                        .then(function (items) {
                            if (!items.length) {
                                resultsBox.innerHTML = '<div class="p-16 text-neutral-500">No results found</div>';
                            } else {
                                resultsBox.innerHTML = items.map(function (item) {
                                    return '<a href="' + item.url + '" class="d-flex gap-12 p-12 border-bottom border-neutral-30 text-decoration-none hover-bg-main-25">' +
                                        '<img src="' + item.image + '" class="w-52 h-52 rounded-8 object-fit-cover flex-shrink-0">' +
                                        '<span><span class="d-block text-neutral-700 fw-medium text-line-1">' + item.title + '</span>' +
                                        '<span class="d-block text-neutral-500 text-sm">' + item.category + '</span></span>' +
                                        '</a>';
                                }).join('');
                            }
                            resultsBox.classList.remove('d-none');
                        })
                        .catch(function () { resultsBox.classList.add('d-none'); });
                }, 300);
            });

            document.addEventListener('click', function (e) {
                if (!resultsBox.contains(e.target) && e.target !== input) {
                    resultsBox.classList.add('d-none');
                }
            });
        })();
    </script>

@endsection
