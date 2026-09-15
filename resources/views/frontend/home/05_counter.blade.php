<section class="counter-three py-120 bg-main-25">
    <div class="container">
        <div class="p-16 rounded-16 bg-white">
            <div class="row gy-4">
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-25 border border-neutral-30">
                        <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-circle box-shadow-md mb-24">
                            <i class="ph ph-chalkboard-teacher"></i>
                        </span>
                        <h2 class="display-four mb-16 text-neutral-700 counter">{{ $our_team->count() }}+</h2>
                        <span class="text-neutral-500 text-lg">Faculty &amp; Staff</span>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-two-25 border border-neutral-30">
                        <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-two-600 text-40 rounded-circle box-shadow-md mb-24">
                            <i class="ph ph-graduation-cap"></i>
                        </span>
                        <h2 class="display-four mb-16 text-neutral-700 counter">{{ $training_list->count() }}+</h2>
                        <span class="text-neutral-500 text-lg">Academy Programs</span>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-25 border border-neutral-30">
                        <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-600 text-40 rounded-circle box-shadow-md mb-24">
                            <i class="ph ph-buildings"></i>
                        </span>
                        <h2 class="display-four mb-16 text-neutral-700 counter">{{ $institutions->count() }}+</h2>
                        <span class="text-neutral-500 text-lg">Partner Institutions</span>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="counter-three-item animation-item h-100 text-center px-16 py-32 rounded-12 bg-main-two-25 border border-neutral-30">
                        <span class="w-80 h-80 flex-center d-inline-flex bg-white text-main-two-600 text-40 rounded-circle box-shadow-md mb-24">
                            <i class="ph ph-thumbs-up"></i>
                        </span>
                        <h2 class="display-four mb-16 text-neutral-700 counter">{{ $testimonials->count() }}+</h2>
                        <span class="text-neutral-500 text-lg">Happy Reviews</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
