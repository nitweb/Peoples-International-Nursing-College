@extends('frontend.dashboard')
@section('title', 'FAQ')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Frequently Asked Questions'])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <div class="section-heading text-center mb-56">
                        <h2 class="mb-24">Got Questions? We've Got Answers</h2>
                        <p class="text-neutral-500">Common questions about admission, fees, academics, and careers at Peoples International Nursing College. Can't find what you're looking for? <a href="{{ route('frontend.contact.us') }}" class="text-main-600 hover-text-decoration-underline">Contact us</a>.</p>
                    </div>

                    @foreach($faqs as $group_index => $group)
                        <div class="mb-48">
                            <h4 class="mb-24 flex-align gap-12">
                                <span class="w-8 h-8 bg-main-600 rounded-circle"></span>
                                {{ $group['category'] }}
                            </h4>

                            <div class="accordion common-accordion" id="faqAccordion{{ $group_index }}">
                                @foreach($group['items'] as $item_index => $item)
                                    @php $id = 'faq-' . $group_index . '-' . $item_index; @endphp
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button {{ $group_index == 0 && $item_index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $id }}" aria-expanded="{{ $group_index == 0 && $item_index == 0 ? 'true' : 'false' }}" aria-controls="{{ $id }}">
                                                {{ $item['q'] }}
                                            </button>
                                        </h2>
                                        <div id="{{ $id }}" class="accordion-collapse collapse {{ $group_index == 0 && $item_index == 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion{{ $group_index }}">
                                            <div class="accordion-body">
                                                <p class="accordion-body__desc">{{ $item['a'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="text-center mt-40 p-32 bg-main-25 rounded-16 border border-neutral-30">
                        <h5 class="mb-12">Still have questions?</h5>
                        <p class="text-neutral-500 mb-24">Our team is happy to help with anything not covered here.</p>
                        <a href="{{ route('frontend.contact.us') }}" class="btn btn-main rounded-pill">Contact Us</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
