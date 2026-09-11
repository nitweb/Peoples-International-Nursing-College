@extends('frontend.dashboard')
@section('title', 'Services')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Services</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Service List</li>
                </ul>
            </div>
        </div>
    </section>

     <section class="team-page-section centred bg-color-1">

     <div class="auto-container">

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

     </div>
     
 </section>


@endsection
