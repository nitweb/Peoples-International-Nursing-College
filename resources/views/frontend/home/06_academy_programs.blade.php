<section class="faculty py-120">
    <div class="container">
        <div class="section-heading text-center">
            <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                <h5 class="text-main-600 mb-0">Academy</h5>
            </div>
            <h2 class="mb-24 wow bounceIn">Our Academic Programs</h2>
            <p class="wow bounceInUp">BNMC-affiliated diploma and degree programs designed to build career-ready, compassionate nursing professionals</p>
        </div>

        @if ($training_list->count())
            <div class="row gy-4">
                @foreach ($training_list as $training)
                    @if ($training->category === 'academic_program')
                        @include('frontend.partials.academic_program_card', ['training' => $training])
                    @else
                        @include('frontend.partials.training_card', ['training' => $training])
                    @endif
                @endforeach
            </div>

            <div class="text-center mt-48">
                <a href="{{ route('frontend.training.development') }}" class="btn btn-outline-main rounded-pill flex-align d-inline-flex gap-8">
                    View All Programs
                    <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                </a>
            </div>
        @else
            <div class="text-center py-40">
                <p class="text-neutral-500 mb-0">Program listings coming soon.</p>
            </div>
        @endif
    </div>
</section>
