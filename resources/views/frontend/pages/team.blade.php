@extends('frontend.dashboard')
@section('title', 'Our Team')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Our Team'])

    <section class="instructor py-120 position-relative z-1">
        <img src="{{ asset('frontend/assets/images/shapes/shape2.png') }}" alt="" class="shape one animation-scalation">
        <img src="{{ asset('frontend/assets/images/shapes/shape6.png') }}" alt="" class="shape six animation-scalation">

        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24">Our Team</h2>
                <p>Get to know the people behind Peoples International Nursing College</p>
            </div>

            <ul class="nav flex-center flex-wrap gap-3 mb-48" id="teamTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="btn btn-main rounded-pill active" data-bs-toggle="tab" data-bs-target="#tab-committee" type="button" role="tab">Executive Committee</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-main rounded-pill" data-bs-toggle="tab" data-bs-target="#tab-leadership" type="button" role="tab">Leadership</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-main rounded-pill" data-bs-toggle="tab" data-bs-target="#tab-partners" type="button" role="tab">Partners</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-main rounded-pill" data-bs-toggle="tab" data-bs-target="#tab-faculty" type="button" role="tab">Faculty &amp; Staff</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-committee" role="tabpanel">
                    <div class="row gy-4">
                        @forelse($executive_committee as $member)
                            @include('frontend.partials.team_card', ['member' => $member])
                        @empty
                            <div class="text-center py-40"><p class="text-neutral-500 mb-0">No members found yet.</p></div>
                        @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-leadership" role="tabpanel">
                    <div class="row gy-4">
                        @forelse($leadership as $member)
                            @include('frontend.partials.team_card', ['member' => $member])
                        @empty
                            <div class="text-center py-40"><p class="text-neutral-500 mb-0">No members found yet.</p></div>
                        @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-partners" role="tabpanel">
                    <div class="row gy-4">
                        @forelse($partners as $member)
                            @include('frontend.partials.team_card', ['member' => $member])
                        @empty
                            <div class="text-center py-40"><p class="text-neutral-500 mb-0">No members found yet.</p></div>
                        @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-faculty" role="tabpanel">
                    <div class="row gy-4">
                        @forelse($team as $member)
                            @include('frontend.partials.team_card', ['member' => $member])
                        @empty
                            <div class="text-center py-40"><p class="text-neutral-500 mb-0">No members found yet.</p></div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Reset active button style when a tab is shown (bootstrap tab buttons use btn-main / btn-outline-main)
        document.querySelectorAll('#teamTab button').forEach(function (btn) {
            btn.addEventListener('shown.bs.tab', function (e) {
                document.querySelectorAll('#teamTab button').forEach(function (b) {
                    b.classList.remove('btn-main');
                    b.classList.add('btn-outline-main');
                });
                e.target.classList.remove('btn-outline-main');
                e.target.classList.add('btn-main');
            });
        });
    </script>

@endsection
