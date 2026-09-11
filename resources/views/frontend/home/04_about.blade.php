<section class="about-style-two sec-pad">
    <div class="auto-container">
        <div class="row align-items-center clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image-box mr_40">
                    <div class="image-shape" style="background-image: url({{ ('frontend/assets/images/shape/shape-1.png') }});"></div>
                    <figure class="image"><img src="{{ asset($about_us->about_us_image) }}" alt="About Us Image"></figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_two">
                    <div class="content-box ml_40">
                        <div class="sec-title">
                            <span class="sub-title">About People's International Foundation</span>
                        </div>
                        <div class="text mb_40 text-justify">
                             {!! Str::limit($about_us->description, 1000) !!}
                        </div>
                        <div class="btn-box">
                            <a href="{{ route('frontend.about.us') }}" class="theme-btn-one">More About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
