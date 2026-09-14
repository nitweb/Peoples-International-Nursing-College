{{-- Expects $members (collection of OurTeam) and $heading, $subheading --}}
<section class="instructor py-120 position-relative z-1">
    <img src="{{ asset('frontend/assets/images/shapes/shape2.png') }}" alt="" class="shape one animation-scalation">
    <img src="{{ asset('frontend/assets/images/shapes/shape6.png') }}" alt="" class="shape six animation-scalation">

    <div class="container">
        @isset($heading)
            <div class="section-heading text-center">
                <h2 class="mb-24">{{ $heading }}</h2>
                @isset($subheading)
                    <p>{{ $subheading }}</p>
                @endisset
            </div>
        @endisset

        @if($members->count())
            <div class="row gy-4">
                @foreach($members as $member)
                    @include('frontend.partials.team_card', ['member' => $member])
                @endforeach
            </div>
        @else
            <div class="text-center py-40">
                <p class="text-neutral-500 mb-0">No members found yet. Please check back soon.</p>
            </div>
        @endif
    </div>
</section>
