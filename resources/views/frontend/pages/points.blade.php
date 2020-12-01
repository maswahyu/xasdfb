@extends('frontend.layouts.skeleton', ['contentClass' => 'no-padding'])

@section('meta_title', 'What is My Points?')
@section('head_title', 'What is My Points?')
@section('head_url', url()->current())

@section('content')

<div class="point-banner">
    {{-- <img src="{{ asset('static/images/img_point2.jpg') }}" alt="" class="point-banner__bg"> --}}
    <div class="container">
        <div class="row video-padding">
            <div class="span-12 span-lg-10 off-lg-1">
                <video id="player" playsinline loop muted autoplay>
                    <source src="https://www.lazone.id/static/video/mypoints_lazoneid360.mp4" type="video/mp4" size="360">
                    <source src="https://www.lazone.id/static/video/mypoints_lazoneid720.mp4" type="video/mp4" size="720">
                </video>
            </div>
        </div>
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
                <div class="subtitle subtitle--point">
                    <span>Redeem point-mu dengan hadiah menarik BULAN INI</span>
                </div>

            </div>

        </div>

        <div class="row">

            <div class="span-12">

                <div class="prize-slider jsPrizeSlider">

                    @foreach($points as $item)
                    <div class="prize-slider__slide">
                        <div class="prize">
                            <div class="prize__img"><img src="{{ imageview($item->image) }}" alt="{{ $item->name }}"></div>
                            <div class="prize__info">
                                <div class="prize__name"><span>{{ $item->name }}</span></div>
                                <div class="prize__requirement">
                                    <div class="prize__icon">
                                        <img src="{{ asset('static/images/cup.png') }}" alt="">
                                    </div>
                                    <div class="prize__point">
                                        <span>{{ seribu($item->poin) }} points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>

@include('frontend.partials.how-to')

@include('frontend.partials.faq')

@include ('frontend.partials.point-tnc')

@endsection

@section('before-body-end')
<script src="{{ asset('static/js/point.js') }}"></script>
<script src="{{ asset('static/js/plyr.polyfilled.js') }}"></script>
<script type="text/javascript">

    const player = new Plyr('video', {
        autoplay: true,
        muted: true,
        quality: {
            default: '720'
        },
        controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume']
     });

    window.player = player;

</script>
@endsection
