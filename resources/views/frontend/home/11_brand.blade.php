@if ($institutions->count() || $client->count())
    <div class="brand wow fadeInUpBig bg-main-25" data-wow-duration="1s" data-wow-delay=".5s">
        <div class="container container--lg">
            <div class="brand-box py-80 px-16 ">
                <h5 class="mb-40 text-center text-neutral-500">OUR PARTNER INSTITUTIONS</h5>
                <div class="container">
                    <div class="brand-slider">
                        @foreach ($institutions as $institution)
                            <div class="brand-slider__item px-24">
                                @if ($institution->link)
                                    <a href="{{ $institution->link }}" target="_blank">
                                        <img src="{{ asset($institution->image) }}" alt="{{ $institution->title }}">
                                    </a>
                                @else
                                    <img src="{{ asset($institution->image) }}" alt="{{ $institution->title }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
