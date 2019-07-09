@extends('frontend.layouts.skeleton', ['contentClass' => 'no-padding'])

@section('content')

<div class="point-banner">
    <img src="{{ asset('static/images/point-bg.png') }}" alt="" class="point-banner__bg">
    <div class="container">
        <div class="point-banner__content">
            <div class="point-banner__title">
                <span>Daftar jadi member LAZONE.ID dan Terus Kumpulkan Point-mu!</span>
            </div>
            <div class="point-banner__text">
                <span>Ingin dapat hadiah menarik tiap bulannya? Yuk daftarkan dirimu jadi member LAZONE.ID sekarang dan kumpulkan terus poin-mu!</span>
            </div>
            <div class="point-banner__cta text-center">
                <a class="btn btn-crimson btn-point" href="{{ url('member/login') }}" alt="login">REGISTER SEKARANG</a>
            </div>
        </div>
    </div>
</div>

<div class="faux-bg">

    <div class="container">

        <div class="row point-heading">

            <div class="span-12">

                <div class="section-title section-title--plain section-title--page section-title--point">
                    <span class="section-title__label section-title__label--category">Hadiah Bulan Ini</span>
                </div>
                <div class="subtitle subtitle--point text-center">
                    <span>Redeem point-mu dengan hadiah menarik BULAN INI</span>
                </div>

            </div>

        </div>

        <div class="row">

            <div class="span-12">

                <div class="prize-slider jsPrizeSlider">

                    @for($i=0;$i<5;$i++)
                    <div class="prize-slider__slide">
                        <div class="prize">
                            <div class="prize__img"><img src="{{ asset('static/images/img_point.jpg') }}" alt=""></div>
                            <div class="prize__info">
                                <div class="prize__name"><span>Logitech Gaming Mouse Hyperion Fury</span></div>
                                <div class="prize__requirement">
                                    <div class="prize__icon">
                                        <img src="{{ asset('static/images/cup.png') }}" alt="">
                                    </div>
                                    <div class="prize__point">
                                        <span>40.000 points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor

                </div>

            </div>

        </div>

    </div>

</div>

@include('frontend.partials.how-to')

@include('frontend.partials.faq',['faqs' => $faqs])

@include ('frontend.partials.point-tnc')

@endsection

@section('before-body-end')
<script src="{{ asset('static/js/point.js') }}"></script>
@endsection
