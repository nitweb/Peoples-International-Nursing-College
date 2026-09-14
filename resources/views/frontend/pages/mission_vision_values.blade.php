@extends('frontend.dashboard')
@section('title', 'Mission, Vision & Values')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Mission, Vision & Values', 'parent' => 'About Us', 'parent_url' => route('frontend.about.us')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-5">

                {{-- Mission --}}
                <div class="col-12">
                    <div class="row gy-4 align-items-center flex-wrap-reverse">
                        <div class="col-lg-6">
                            <div class="flex-align gap-8 mb-16">
                                <span class="w-8 h-8 bg-main-600 rounded-circle"></span>
                                <h5 class="text-main-600 mb-0">Our Mission</h5>
                            </div>
                            <h2 class="mb-24">{{ $mission->title }}</h2>
                            <div class="text-neutral-500">{!! $mission->description !!}</div>
                        </div>
                        <div class="col-lg-6">
                            @if($mission->image)
                                <img src="{{ asset($mission->image) }}" alt="{{ $mission->title }}" class="rounded-16 w-100">
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Vision --}}
                <div class="col-12 pt-40 border-top border-neutral-50 border-dashed border-0">
                    <div class="row gy-4 align-items-center">
                        <div class="col-lg-6">
                            @if($vision->image)
                                <img src="{{ asset($vision->image) }}" alt="{{ $vision->title }}" class="rounded-16 w-100">
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="flex-align gap-8 mb-16">
                                <span class="w-8 h-8 bg-main-600 rounded-circle"></span>
                                <h5 class="text-main-600 mb-0">Our Vision</h5>
                            </div>
                            <h2 class="mb-24">{{ $vision->title }}</h2>
                            <div class="text-neutral-500">{!! $vision->description !!}</div>
                        </div>
                    </div>
                </div>

                {{-- Values --}}
                <div class="col-12 pt-40 border-top border-neutral-50 border-dashed border-0">
                    <div class="row gy-4 align-items-center flex-wrap-reverse">
                        <div class="col-lg-6">
                            <div class="flex-align gap-8 mb-16">
                                <span class="w-8 h-8 bg-main-600 rounded-circle"></span>
                                <h5 class="text-main-600 mb-0">Our Core Values</h5>
                            </div>
                            <h2 class="mb-24">{{ $values->title }}</h2>
                            <div class="text-neutral-500">{!! $values->description !!}</div>
                        </div>
                        <div class="col-lg-6">
                            @if($values->image)
                                <img src="{{ asset($values->image) }}" alt="{{ $values->title }}" class="rounded-16 w-100">
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
