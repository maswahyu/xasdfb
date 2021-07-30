@extends('frontend.layouts.skeleton', ['contentClass' => 'fit-padding'])

@section('meta_title', 'My Points')
@section('head_title', 'My Points')
@section('head_url', url()->current())

@section('content')

<div class="point-banner">
    <img src="{{ asset('static/images/new_mypoints_banner.jpg') }}" alt="" class="hero-header">

    <div class="container">
        <div class="point-banner__content">
            <div class="row">
                <div class="span-12 span-lg-10 off-lg-1">
                    @php ($hasVideo = false)

                    @if ($hasVideo)
                        <div class="point-banner-header with-video">
                            <div class="row">
                                <div class="span-12 span-md-6 order-md-2 point-banner__title-wrapper">
                                    <div class="point-banner__title">
                                        <span>Daftar Jadi Member LAZONE.ID dan Dapatkan Hadiah Eksklusif!</span>
                                    </div>
                                </div>

                                <div class="span-12 span-md-6 order-md-1 point-banner__video-wrapper">
                                    <div class="video-outer">
                                        <video id="player" playsinline loop muted autoplay>
                                            <source src="https://www.lazone.id/static/video/mypoints_lazoneid360.mp4" type="video/mp4" size="360">
                                            <source src="https://www.lazone.id/static/video/mypoints_lazoneid720.mp4" type="video/mp4" size="720">
                                        </video>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @else
                        <div class="point-banner-header without-video">
                            <div class="row">
                                <div class="span-12 point-banner__title-wrapper">
                                    <div class="point-banner__title">
                                        <span>Daftar Jadi Member LAZONE.ID dan Dapatkan Hadiah Eksklusif!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="row">
                        <div class="span-12">
                            <div class="point-banner__text">
                                <span>Segera kumpulkan dan tukar poin kamu dengan #TukarLAngsung <strong>Kamera &amp; Jaket BOLD Riders X Bulls Syndicate</strong>. Eksklusif di bulan ini, hadiah terbatas.</span>
                            </div>
                            {{-- <div class="point-banner__cta text-center">
                                <a class="btn btn-crimson btn-point" href="{{ url('member/login') }}" alt="login">REGISTER SEKARANG</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="span-12">
                    <div class="rewards-list {{  (count($points) > 1) ? 'rewards-list__multiple jsRewardsSlider' : 'rewards-list__single jsRewardSingleSlider' }}  {{  ($hasVideo) ? '' : 'rewards-list__alternate-bg' }}">
                        @foreach($points as $item)
                            <div class="rewards-wrapper rewards-wrapper__card">
                                <a href="" class="card-inner rewards-link">
                                    <div class="rewards-img-wrapper">
                                        <div class="rewards-img" style="background-image: url('{!! imageview($item->image) !!}');"></div>
                                    </div>
                                    <div class="rewards-desc d-flex flex-column">
                                        <p class="rewards-desc__category">{{ $item->category }}</p>
                                        <p class="rewards-desc__title">{{ $item->name }}</p>
                                        <p class="rewards-desc__point"><strong><i class="ico-star"></i>{{ seribu($item->poin) }} Points</strong></p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="faux-bg">
    <div class="container">
        <div class="row point-heading">
            <div class="span-12">
                <div class="row flex-justify-center">
                    <div class="section-title section-title--plain section-title--page section-title--point">
                        <span class="section-title__label section-title__label--category">Hadiah Bulan Ini</span>
                    </div>
                </div>
                <div class="subtitle subtitle--point text-center">
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
</div> -->

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
