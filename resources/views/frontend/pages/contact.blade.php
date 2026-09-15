@extends('frontend.dashboard')
@section('title', 'Contact Us')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Contact Us'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row gy-4 mb-64">
                <div class="col-lg-4 col-sm-6">
                    <div class="text-center p-32 bg-main-25 rounded-16 border border-neutral-30 h-100">
                        <span class="w-64 h-64 bg-main-600 text-white flex-center rounded-circle text-3xl mx-auto mb-16"><i class="ph-bold ph-map-pin"></i></span>
                        <h6 class="mb-8">Our Address</h6>
                        <p class="text-neutral-500 mb-0">{{ $site_setting->site_address ?? 'Dhaka, Bangladesh' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="text-center p-32 bg-main-25 rounded-16 border border-neutral-30 h-100">
                        <span class="w-64 h-64 bg-main-600 text-white flex-center rounded-circle text-3xl mx-auto mb-16"><i class="ph-bold ph-phone-call"></i></span>
                        <h6 class="mb-8">Call Us</h6>
                        <p class="text-neutral-500 mb-0">
                            <a href="tel:{{ $site_setting->site_phone ?? '' }}" class="text-neutral-500">{{ $site_setting->site_phone ?? '-' }}</a>
                            @if(!empty($site_setting->site_phone_alter))
                                <br><a href="tel:{{ $site_setting->site_phone_alter }}" class="text-neutral-500">{{ $site_setting->site_phone_alter }}</a>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="text-center p-32 bg-main-25 rounded-16 border border-neutral-30 h-100">
                        <span class="w-64 h-64 bg-main-600 text-white flex-center rounded-circle text-3xl mx-auto mb-16"><i class="ph-bold ph-envelope-simple"></i></span>
                        <h6 class="mb-8">Email Us</h6>
                        <p class="text-neutral-500 mb-0">
                            <a href="mailto:{{ $site_setting->site_email ?? '' }}" class="text-neutral-500">{{ $site_setting->site_email ?? '-' }}</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row gy-5">
                <div class="col-lg-7">
                    <div class="p-32 bg-main-25 rounded-16 border border-neutral-30">
                        <h4 class="mb-32">Send Us a Message</h4>

                        @include('widgets.errors')
                        @include('widgets.success')

                        <form action="{{ route('admin.contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Full Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="common-input rounded-8 w-100">
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Organization</label>
                                    <input type="text" name="organization" value="{{ old('organization') }}" class="common-input rounded-8 w-100">
                                </div>
                            </div>
                            @if($services->count())
                                <div class="mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Service of Interest</label>
                                    <select name="service" class="common-input rounded-8 w-100">
                                        <option value="">-- Select a service (optional) --</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->title }}" {{ old('service') == $service->title ? 'selected' : '' }}>{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Subject</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" class="common-input rounded-8 w-100">
                            </div>
                            <div class="mb-32">
                                <label class="text-neutral-700 fw-medium mb-8">Message</label>
                                <textarea name="message" rows="5" class="common-input rounded-8 w-100">{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-main rounded-pill">Send Message</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="rounded-16 overflow-hidden border border-neutral-30" style="height: 100%; min-height: 420px;">
                        <iframe
                            src="https://www.google.com/maps?q={{ urlencode($site_setting->site_address ?? 'Dhaka, Bangladesh') }}&output=embed"
                            width="100%" height="100%" style="border:0; min-height: 420px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
