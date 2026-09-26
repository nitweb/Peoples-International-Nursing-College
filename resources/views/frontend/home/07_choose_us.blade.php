<section class="choose-us-two pt-120 bg-main-25">

    <div class="container">

        <div class="row align-items-end">

            <div class="col-lg-7 pe-xl-5">
                <div class="pb-80 mb-lg-5 me-lg-5">
                    <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                        <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                        <h5 class="text-main-600 mb-0">Why Choose Us</h5>
                    </div>
                    <h2 class="mb-24 wow bounceIn">Quality Nursing Education Rooted in Care</h2>
                    <p class="text-neutral-500 text-line-2 wow bounceInUp">We combine strong theoretical foundations with hands-on clinical training, guided by experienced faculty, to produce skilled and compassionate nursing professionals.</p>
                    <p class="text-neutral-500 text-line-2 mt-24 wow bounceInUp">Our graduates go on to serve in hospitals, clinics, and community health settings across Bangladesh and beyond.</p>

                    <a href="{{ route('frontend.about.us') }}" class="btn btn-main rounded-pill flex-align d-inline-flex gap-8 mt-40">
                        Read More
                        <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="pb-50 bg-neutral-900 rounded-top-4 overflow-hidden" data-aos="fade-up-left">
                    <div class="px-60 pt-40 pb-28" style="background-color:#c8102e;">
                        <div class="flex-align d-inline-flex gap-12">
                            <span class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-circle bg-white" style="width:44px;height:44px;">
                                <i class="ph-bold ph-megaphone text-xl" style="color:#c8102e;"></i>
                            </span>
                            <div>
                                <span class="d-inline-block text-white text-uppercase fw-semibold text-opacity-75" style="font-size:12px;letter-spacing:1px;">Stay Updated</span>
                                <h4 class="mb-0 text-white fw-bold">Notice Board</h4>
                            </div>
                        </div>
                    </div>
                    <div class="px-60 pt-28">
                    @if ($notices->count())
                        <ul>
                            @foreach ($notices as $notice)
                                <li class="mb-24">
                                    <a href="{{ asset($notice->files) }}" target="_blank" class="flex-align gap-12 text-white hover-text-decoration-underline">
                                        {{ Str::limit($notice->title, 40) }}
                                        <i class="text-main-two-600 ph-bold ph-arrow-right d-flex text-xl flex-shrink-0"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-white text-opacity-75 mb-0">No notices published yet.</p>
                    @endif
                    <a href="{{ route('frontend.notice.list') }}" class="text-main-two-600 fw-medium hover-text-decoration-underline">View All Notices</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>
