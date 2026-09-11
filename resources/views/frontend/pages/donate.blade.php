@extends('frontend.dashboard')
@section('title', 'Donate Now')
@section('contents')

    {{-- Breadcrumb --}}
    <section class="page-title centred">
        <div class="bg-layer" style="background-image: url({{ asset('frontend/assets/images/background/page-title-4.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Donate Now</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.donation.list') }}">Donation</a></li>
                    <li>Donate</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="donate-form-section sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12" style="margin: 0 auto; float:none;">

                    <div style="background:#fff; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.08); padding:35px;">

                        <h3 style="margin-bottom:5px;">
                            {{ $category ? $category->title : 'General Donation' }}
                        </h3>
                        <p style="color:#888; margin-bottom:25px;">
                            {{ $category ? $category->short_description : 'Support People\'s International Foundation with a general donation.' }}
                        </p>

                        @include('widgets.errors')
                        @include('widgets.success')

                        <form method="post" action="{{ route('frontend.donation.donate.submit') }}">
                            @csrf

                            <input type="hidden" name="donation_category_id" value="{{ $category->id ?? '' }}">

                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="col-form-label">Full Name</label>
                                    <input type="text" name="donor_name" class="form-control" value="{{ old('donor_name') }}" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label class="col-form-label">Phone Number</label>
                                    <input type="text" name="donor_phone" class="form-control" value="{{ old('donor_phone') }}" required>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="col-form-label">Email (optional)</label>
                                    <input type="email" name="donor_email" class="form-control" value="{{ old('donor_email') }}">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="col-form-label">Amount (৳)</label>
                                    <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:10px;">
                                        @foreach ([100, 500, 1000, 5000] as $preset)
                                            <button type="button" class="btn btn-outline-success donation-amount-preset" data-amount="{{ $preset }}">৳{{ $preset }}</button>
                                        @endforeach
                                    </div>
                                    <input type="number" name="amount" id="donation-amount" class="form-control" min="10" step="1" value="{{ old('amount') }}" placeholder="Enter amount" required>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="col-form-label">Message (optional)</label>
                                    <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>
                                        <input type="checkbox" name="is_anonymous" value="1" {{ old('is_anonymous') ? 'checked' : '' }}>
                                        Donate anonymously
                                    </label>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="margin-top:15px;">
                                    <button type="submit" class="theme-btn-one" style="width:100%; text-align:center; border:none;">
                                        <span>Pay with bKash</span>
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.donation-amount-preset').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('donation-amount').value = this.getAttribute('data-amount');
            });
        });
    </script>

@endsection
