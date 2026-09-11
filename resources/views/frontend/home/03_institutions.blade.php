@if ($institutions->count() > 0)

    <section class="institutions-section p_relative sec-pad bg-color-1">

        <div class="auto-container">

            <div class="sec-title centred mb_50">
                <span class="sub-title">Institutions</span>
                <h2>Our Institutions</h2>
            </div>

            <div class="row clearfix">

                @foreach ($institutions as $item)
                    <div class="col-lg-3 col-md-6 col-sm-12 institution-block">
                        <a href="{{ $item->link ?: 'javascript:void(0)' }}" class="institution-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1200ms">
                            <div class="inner-box">
                                <div class="logo-box">
                                    @if ($item->image)
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                                    @endif
                                </div>
                                <h3>{{ $item->title }}</h3>

                                @if ($item->description)
                                    <div class="hover-box">
                                        <p>{{ $item->description }}</p>
                                    </div>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>

    </section>

    <style>
        .institution-block {
            margin-bottom: 30px;
        }

        .institution-block-one {
            display: block;
            text-decoration: none;
        }

        .institution-block-one .inner-box {
            position: relative;
            display: block;
            text-align: center;
            background: #fff;
            box-shadow: 0px 2px 30px rgba(0, 0, 0, 0.08);
            border-radius: 15px;
            padding: 45px 25px 35px;
            overflow: hidden;
            height: 100%;
            transition: all 500ms ease;
        }

        .institution-block-one .inner-box:hover {
            transform: translateY(-10px);
            box-shadow: 0px 2px 40px rgba(0, 0, 0, 0.12);
        }

        .institution-block-one .logo-box {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 110px;
            height: 110px;
            margin: 0 auto 22px;
            border-radius: 50%;
            background: #F7F5F1;
            padding: 12px;
        }

        .institution-block-one .logo-box img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            border-radius: 50%;
            object-fit: contain;
        }

        .institution-block-one .inner-box h3 {
            position: relative;
            font-size: 17px;
            line-height: 26px;
            font-weight: 500;
            color: #333;
            margin: 0;
        }

        .institution-block-one .hover-box {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 22px;
            background: #E04237;
            opacity: 0;
            visibility: hidden;
            transform: translateY(15px);
            transition: all 400ms ease;
            border-radius: 15px;
        }

        .institution-block-one .hover-box p {
            margin: 0;
            font-size: 14px;
            line-height: 1.7;
            color: #fff;
            text-align: center;
        }

        .institution-block-one .inner-box:hover .hover-box {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>

@endif