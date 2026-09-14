@extends('frontend.dashboard')
@section('title', 'Donate Now')
@section('contents')

    @include('frontend.partials.breadcrumb', ['title' => 'Donate Now', 'parent' => 'Donation', 'parent_url' => route('frontend.donation.list')])

    <section class="py-120 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="p-32 bg-main-25 rounded-16 border border-neutral-30">
                        <h4 class="mb-8">{{ $category ? 'Donate to ' . $category->title : 'Make a General Donation' }}</h4>
                        <p class="text-neutral-500 mb-32">You will be redirected to bKash to complete your payment securely.</p>

                        @include('widgets.errors')
                        @include('widgets.success')

                        <form action="{{ route('frontend.donation.donate.submit') }}" method="POST">
                            @csrf
                            @if($category)
                                <input type="hidden" name="donation_category_id" value="{{ $category->id }}">
                            @endif

                            <div class="row">
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Your Name <span class="text-danger-600">*</span></label>
                                    <input type="text" name="donor_name" value="{{ old('donor_name') }}" class="common-input rounded-8 w-100" required>
                                </div>
                                <div class="col-sm-6 mb-24">
                                    <label class="text-neutral-700 fw-medium mb-8">Phone <span class="text-danger-600">*</span></label>
                                    <input type="text" name="donor_phone" value="{{ old('donor_phone') }}" class="common-input rounded-8 w-100" required>
                                </div>
                            </div>

                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Email</label>
                                <input type="email" name="donor_email" value="{{ old('donor_email') }}" class="common-input rounded-8 w-100">
                            </div>

                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Amount (৳) <span class="text-danger-600">*</span></label>
                                <input type="number" name="amount" min="10" step="1" value="{{ old('amount') }}" class="common-input rounded-8 w-100" required>
                                <div class="flex-align gap-8 flex-wrap mt-12">
                                    @foreach([100, 500, 1000, 5000] as $amt)
                                        <button type="button" class="btn btn-outline-main rounded-pill py-8 px-20 quick-amount-btn" data-amount="{{ $amt }}">৳{{ $amt }}</button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-24">
                                <label class="text-neutral-700 fw-medium mb-8">Message (optional)</label>
                                <textarea name="message" rows="3" class="common-input rounded-8 w-100">{{ old('message') }}</textarea>
                            </div>

                            <div class="mb-32">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_anonymous" value="1" id="is_anonymous" {{ old('is_anonymous') ? 'checked' : '' }}>
                                    <label class="form-check-label text-neutral-700" for="is_anonymous">Donate anonymously</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-main rounded-pill w-100 justify-content-center">
                                <i class="ph-bold ph-device-mobile me-8"></i> Proceed to bKash
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.quick-amount-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.querySelector('input[name="amount"]').value = btn.dataset.amount;
            });
        });
    </script>

@endsection
