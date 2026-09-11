 <section class="team-page-section centred">

     <div class="auto-container">

         <div class="auto-container">
             <div class="sec-title centred mb_55">
                 <span class="sub-title">Our Services</span>
                 <h2>High-trust, High-touch, High-tech</h2>
             </div>
         </div>

         <div class="row clearfix">

             @foreach ($services as $item)
                 <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                     <div class="team-block-two custom_service_card">
                         <div class="inner-box">
                             <figure class="image-box" style="height: 330px; overflow: hidden; margin: 0 auto;">
                                 <img src="{{ asset($item->serviceDetail->service_image) }}" alt="{{ $item->title }}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                             </figure>
                             <div class="lower-content">
                                 <h3><a href="{{ route('frontend.service.details', $item->slug) }}">{{ $item->title }}</a></h3>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach

         </div>

         <div class="btn-box text-center" style="margin-top: 20px;">
             <a href="{{ route('frontend.all.services.list') }}" class="theme-btn-one">View All Services</a>
         </div>

     </div>

 </section>
