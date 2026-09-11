<div class="col-lg-4 col-md-6 col-sm-12 team-block">
    <div class="team-block-two">
        <div class="inner-box">
            <figure class="image-box">
                <img src="{{ asset($item->team_image) }}" alt="{{ $item->name }}">
            </figure>
            <div class="lower-content">
                <h3><a href="{{ route('frontend.team.details', $item->slug) }}">{{ $item->name }}</a></h3>
                <span class="designation">{{ $item->designation }}</span>
                <ul class="social-links clearfix">
                    @if ($item->facebook_link)
                        <li><a href="{{ $item->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if ($item->twitter_link)
                        <li><a href="{{ $item->twitter_link }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    @endif
                    @if ($item->instagram_link)
                        <li><a href="{{ $item->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
