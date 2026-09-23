<section class="faculty py-120">
    <div class="container">
        <div class="section-heading text-center">
            <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-hand-heart"></i></span>
                <h5 class="text-main-600 mb-0">Our Services</h5>
            </div>
            <h2 class="mb-24 wow bounceIn">What We Offer</h2>
            <p class="wow bounceInUp">Explore the services we provide to support our students, patients and community</p>
        </div>

        @if ($services->count())
            <div class="row gy-4">
                @foreach ($services as $service)
                    @include('frontend.partials.service_card', ['service' => $service])
                @endforeach
            </div>

            <div class="text-center mt-48">
                <a href="{{ route('frontend.all.services.list') }}" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8">
                    View All Services
                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                </a>
            </div>
        @else
            <div class="text-center py-40">
                <p class="text-neutral-500 mb-0">Service listings coming soon.</p>
            </div>
        @endif
    </div>
</section>
