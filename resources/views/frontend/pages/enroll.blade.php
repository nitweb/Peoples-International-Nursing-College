@extends('frontend.dashboard')
@section('title', 'Enroll - ' . $training->title)
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Enroll Now', 'parent' => $training->title, 'parent_url' => route('frontend.training.development.details', $training->slug)])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5 justify-content-center">

                <div class="col-lg-7">
                    <div class="p-32 bg-main-25 rounded-16 border border-neutral-30">
                        <h4 class="mb-32">Enrollment Form</h4>

                        @include('widgets.errors')
                        @include('widgets.success')

                        <form action="{{ route('frontend.training.enroll.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="training_id" value="{{ $training->id }}">

                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Full Name <span class="text-danger-600">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="common-input rounded-8 w-100" placeholder="Your full name" required>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Phone <span class="text-danger-600">*</span></label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="common-input rounded-8 w-100" placeholder="01XXXXXXXXX" required>
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="common-input rounded-8 w-100" placeholder="your@email.com">
                                </div>
                            </div>

                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Address</label>
                                <input type="text" name="address" value="{{ old('address') }}" class="common-input rounded-8 w-100" placeholder="Present address">
                            </div>

                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Note</label>
                                <textarea name="note" rows="3" class="common-input rounded-8 w-100" placeholder="Anything you'd like us to know">{{ old('note') }}</textarea>
                            </div>

                            <div class="p-24 bg-white rounded-12 border border-neutral-30 mb-24">
                                <span class="text-neutral-500 text-sm">Registration fee: ৳{{ number_format($training->registration_fee ?? 0) }}</span>
                            </div>

                            <button type="submit" class="btn btn-main rounded-pill w-100 justify-content-center">
                                Submit Enrollment
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="p-24 bg-white rounded-16 border border-neutral-30">
                        <img src="{{ $training->training_image ? asset($training->training_image) : asset('frontend/assets/images/thumbs/course-img1.png') }}" alt="{{ $training->title }}" class="rounded-12 w-100 mb-16">
                        <h5 class="mb-8">{{ $training->title }}</h5>
                        @if($training->duration)
                            <span class="text-neutral-500 d-block mb-4"><i class="ph-bold ph-clock"></i> {{ $training->duration }}</span>
                        @endif
                        @if($training->course_start)
                            <span class="text-neutral-500 d-block"><i class="ph-bold ph-calendar"></i> Starts {{ \Carbon\Carbon::parse($training->course_start)->format('d M, Y') }}</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
