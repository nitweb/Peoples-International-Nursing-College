 <section class="testimonials-three py-120 bg-main-25 position-relative z-1 overflow-hidden">
     <img src="{{ asset('frontend/assets/images/shapes/shape2.png') }}" alt="" class="shape two animation-scalation">
     <img src="{{ asset('frontend/assets/images/shapes/shape6.png') }}" alt="" class="shape four animation-scalation">
     <img src="{{ asset('frontend/assets/images/shapes/shape4.png') }}" alt="" class="shape one animation-scalation">

     <div class="container">
         <div class="row gy-4 align-items-center flex-wrap-reverse">
             <div class="col-xl-7">
                 @if ($testimonials->count())
                     <div class="testimonials-three-slider">
                         @foreach ($testimonials as $testimonial)
                             <div class="testimonials-three-item bg-white p-24 rounded-12 box-shadow-md">
                                 <div class="w-90 h-90 rounded-circle position-relative mb-4">
                                     <img src="{{ $testimonial->client_image ? asset($testimonial->client_image) : asset('frontend/assets/images/thumbs/testimonials-three-img1.png') }}" alt="{{ $testimonial->client_name }}" class="cover-img rounded-circle">
                                     <span class="w-40 h-40 bg-main-two-600 flex-center border border-white border-2 rounded-circle position-absolute inset-block-end-0 inset-inline-end-0 mt--5 me--5">
                                         <img src="{{ asset('frontend/assets/images/icons/quote-two-icon.png') }}" alt="">
                                     </span>
                                 </div>
                                 <p class="text-neutral-500 my-24">{{ Str::limit($testimonial->review_text, 140) }}</p>
                                 <ul class="flex-align gap-8 mb-16">
                                     @for ($i = 1; $i <= 5; $i++)
                                         <li class="text-warning-600 text-xl d-flex">
                                             <i class="ph-fill ph-star"></i>
                                         </li>
                                     @endfor
                                 </ul>
                                 <h4 class="mb-16 text-lg">{{ $testimonial->client_name }}</h4>
                                 <span class="text-neutral-500">{{ $testimonial->client_designation }}</span>
                             </div>
                         @endforeach
                     </div>
                 @else
                     <div class="bg-white p-40 rounded-12 box-shadow-md text-center">
                         <p class="text-neutral-500 mb-0">Testimonials coming soon.</p>
                     </div>
                 @endif
             </div>

             <div class="col-xl-5 ps-xl-5">
                 <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                     <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                     <h5 class="text-main-600 mb-0">Testimonials</h5>
                 </div>
                 <h2 class="mb-24 wow bounceInRight">What Our Community Says</h2>
                 <p class="text-neutral-500 text-line-4 wow bounceInUp">Hear from students, alumni, and faculty about their experience at Peoples International Nursing College.</p>
                 @if ($testimonials->count() > 1)
                     <div class="flex-align gap-16 mt-40">
                         <button type="button" id="testimonials-three-prev" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48">
                             <i class="ph ph-caret-left"></i>
                         </button>
                         <button type="button" id="testimonials-three-next" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48">
                             <i class="ph ph-caret-right"></i>
                         </button>
                     </div>
                 @endif
             </div>
         </div>
     </div>
 </section>
