{{-- Expects $member (OurTeam model instance) --}}
<div class="col-lg-4 col-sm-6">
    <div class="instructor-item scale-hover-item bg-white rounded-16 p-12 h-100 border border-neutral-30">
        <div class="rounded-12 overflow-hidden position-relative bg-main-25" style="aspect-ratio: 1/1;">
            <a href="{{ route('frontend.team.details', $member->slug) }}" class="w-100 h-100 d-flex align-items-end">
                <img src="{{ asset($member->team_image) }}" alt="{{ $member->name }}" class="scale-hover-item__img rounded-12 cover-img transition-2 w-100 h-100 object-fit-cover">
            </a>
        </div>
        <div class="p-24 position-relative">
            <div class="">
                <h5 class="mb-8 pb-16 border-bottom border-neutral-50 mb-16 border-dashed border-0">
                    <a href="{{ route('frontend.team.details', $member->slug) }}" class="link text-line-2">{{ $member->name }}</a>
                </h5>
                <div class="flex-align gap-8 mb-0">
                    <span class="text-main-600 text-xl d-flex"><i class="ph-bold ph-identification-badge"></i></span>
                    <span class="text-neutral-700 text-md fw-medium">{{ $member->designation }}</span>
                </div>
                @if ($member->qualification)
                    <p class="text-neutral-500 text-sm mt-8 mb-0">{{ $member->qualification }}</p>
                @endif
                @if ($member->subject)
                    <p class="text-neutral-500 text-sm mb-0">{{ $member->subject }}</p>
                @endif
            </div>
            <div class="pt-16 border-top border-neutral-50 mt-20 border-dashed border-0">
                <a href="{{ route('frontend.team.details', $member->slug) }}" class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold">
                    View Profile
                    <i class="ph ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
