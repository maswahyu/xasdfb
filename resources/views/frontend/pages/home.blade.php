@extends('frontend.layouts.skeleton')

@section('content')
{{-- banner wifi --}}
@if(isset($bannerWifi) && $bannerWifi)
@include('frontend.partials.wifi-banner')
@endif
{{-- end banner wifi --}}
{{-- sticky Banner --}}
@if(isset($stickyBanner) && $stickyBanner)
    <div id="stickyBannerContainer">
    @if($stickyBanner->periode_start && (Carbon\Carbon::now()->between(Carbon\Carbon::createFromFormat('Y-m-d', $stickyBanner->periode_start), Carbon\Carbon::createFromFormat('Y-m-d', $stickyBanner->periode_end))) )
        @include('frontend.partials.sticky-banner')
    @elseif(!$stickyBanner->periode_start)
    @include('frontend.partials.sticky-banner')
    @endif
    </div>
@endif
{{-- end of sticky banner --}}
{{-- Above the fold --}}
@section('inside-head')
<style type="text/css">
    @media screen and (max-width: 768px) {
        .post-card--highlight {
            padding-bottom: 2rem;
        }

        .jsArticleList {
            margin-top: -3rem;
        }

        .post-card--wide__with-padding:first-child {
            padding-top: 3rem;
        }
    }
    @media screen and (min-width: 768px) {
        .post-card--simple__no-padding {
            padding: 0 1.5rem;
            margin-bottom: 3rem;
        }

    }
</style>
@endsection
<div class="container container-home">

    <div class="home-grid">

        <div class="home-grid__must-reads">

            <div class="section-title" style="margin: 2rem 0 3rem;">
                <span class="section-title__label section-title__label--lg text-uppercase">Must Reads</span>
            </div>

            <div class="home-grid__must-reads-highlights jsHighlights">
            </div>

            <div class="home-grid__must-reads-list jsMustRead">
            </div>

        </div>

        {{-- <div class="home-grid__recommended">

            <div class="section-title section-title--mobile-ribbon">
                <span class="section-title__label">Recommended</span>
            </div>

            <div class="row jsRecomended">
            </div>
        </div> --}}

        {{-- <hr style="margin-top: 8rem; width: 100%;" class="hide-mobile"> --}}
    </div>

    {{-- <div class="home-below-fold">

        <div class="home-below-fold__slider hide-mobile">
            <div class="home-promo-slider jsHomeSlider">
            </div>
        </div>

        <div class="home-below-fold__slider show-mobile">
            <div class="home-promo-slider jsHomeMobileSlider">
            </div>
        </div>

        <div class="home-below-fold__preference">

            @include('frontend.partials.shoutbox')

        </div>

    </div> --}}

</div>

<div class="container">
    <div class="row">
        <div class="span-12 span-md-8 order-2 order-md-1">
            <div class="home-below-fold__slider show-mobile" style="margin: 2rem 0;">
                <div class="home-promo-slider jsHomeMobileSlider">
                </div>
            </div>
        </div>
    </div>
</div>

{{--  Trending Article --}}
<div class="home-trending">
    <div class="container">
        <div class="section-title">
            <span class="section-title__label text-uppercase">Most Viewed</span>
        </div>
        <div class="row">

            <div class="home-below-fold__slider show-mobile" style="margin-bottom: 3rem;">
                <div class="home-promo-slider jsMobileTrendingList">
                    {{-- @for($i=0; $i<=3; $i++)
                        <div class="post-card post-card--simple post-card--simple__max-height" style="max-width: 235px !important; margin: 0 1rem;">
                            <div class="post-card__thumbnail">
                                <a href="test?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="">
                                    <img class="post-card__img" src="img_placeholder_point.jpg" data-src="" alt="">
                                </a>
                            </div>

                            <div class="post-card__info">

                                <a href="test?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="">
                                    <div class="post-card__title">
                                        <span>Test</span>
                                    </div>
                                </a>

                                <div class="post-card__meta post-meta">

                                    <div class="post-meta__category">
                                        <a href="#" alt="Test">
                                            <span>Test</span>
                                        </a>
                                    </div>
                                    <div class="post-meta__stat"><span>21 Jan 2021</span></div>

                                </div>
                            </div>
                        </div>
                    @endfor --}}
                </div>
            </div>

            <div class="row hide-mobile jsTrendingList">
                {{-- @for($i=0; $i<=3; $i++)
                    <div class="span-12 span-md-6 span-lg-3">
                        <div class="post-card post-card--simple post-card--simple__max-height">
                            <div class="post-card__thumbnail">
                                <a href="test?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="">
                                    <img class="post-card__img" src="img_placeholder_point.jpg" data-src="" alt="">
                                </a>
                            </div>

                            <div class="post-card__info">

                                <a href="test?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="">
                                    <div class="post-card__title">
                                        <span>Test</span>
                                    </div>
                                </a>

                                <div class="post-card__meta post-meta">

                                    <div class="post-meta__category">
                                        <a href="#" alt="Test">
                                            <span>Test</span>
                                        </a>
                                    </div>
                                    <div class="post-meta__stat"><span>21 Jan 2021</span></div>

                                </div>

                            </div>

                        </div>

                    </div>
                @endfor --}}
            </div>
        </div>
        <div class="jsMoreTrending"></div>
    </div>
</div>

{{-- <div class="container">

    <div class="row">

        <div class="span-12">

            Ads Placement
            <div class="placement">
                <a href="{{ $ads['url'] }}?utm_source=AdsHome" alt="{{ $ads['url'] }}">
                    <img class="placement__img post-card__img" src="/img_placeholder_slider.jpg" data-src="{{ imageview($ads['image']) }}" alt="{{ $ads['url'] }}">
                </a>
            </div>

        </div>


    </div>

    <div class="row">

        <div class="span-12">

            Shoutbox lazone
            <div class="shoutbox shoutbox--wide shoutbox--has-bg">

                <img class="shoutbox__background hide-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12.jpg') }} />
                <img class="shoutbox__background show-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12-responsive.jpg') }} />

                <div class="shoutbox__content-wrapper">

                    <div class="shoutbox__title shoutbox__title--extra-bold">
                        <span class="f-none">Menangkan Hadiah Menarik Tiap Bulan!</span>
                    </div>

                    <div class="shoutbox__text shoutbox__text--extra-space">
                        <p class="f-none">Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!</p>
                    </div>

                    <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                        <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG POIN</strong></a>
                        @guest
                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                        @endguest
                    </div>

                </div>

            </div>

        </div>

        <div class="hide-mobile jsVideoList"></div>
        <div class="jsMoreVideo"></div>

    </div>

</div> --}}

{{-- List with side --}}
{{-- <div class="container">

    <div class="list-with-sidebar">

        <div class="list-with-sidebar__main">

            Shoutbox lazone
            <div class="shoutbox shoutbox--wide shoutbox--has-bg">

                <img class="shoutbox__background hide-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12.jpg') }} />
                <img class="shoutbox__background show-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12-responsive.jpg') }} />

                <div class="shoutbox__content-wrapper">

                    <div class="shoutbox__title shoutbox__title--extra-bold">
                        <span class="f-none">Menangkan Hadiah Menarik Tiap Bulan!</span>
                    </div>

                    <div class="shoutbox__text shoutbox__text--extra-space">
                        <p class="f-none">Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!</p>
                    </div>

                    <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                        <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG POIN</strong></a>
                        @guest
                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                        @endguest
                    </div>

                </div>

            </div>

            <div class="row horizontal-list">
                <div class="section-title">
                    <span class="section-title__label">Latest Articles</span>
                </div>

                <div class="span-12 jsArticleList"></div>
                <div class="span-12 text-center">
                    <button class="btn btn-ghost-crimson btn-load-more jsMoreArticle">LOAD MORE</button>
                </div>
            </div>

        </div>

        <div class="list-with-sidebar__aside">

            <div class="section-title section-title--plain section-title--has-more">
                <span class="section-title__label">Videos</span>
                <a href="{{ url('gallery/video') }}?utm_source=SeeMore&utm_medium=Video&utm_campaign=LazoneDetail" class="section-title__more" alt="See more"><span>SEE MORE</span><span class="arrow-left"></span></a>
            </div>

            <div class="row no-gutters">
                <div class="jsVideoList hide-mobile"></div>
                <div class="home-below-fold__slider show-mobile">
                    <div class="home-promo-slider jsVideoMobileSlider">
                    </div>
                </div>
                <div class="jsMoreVideo"></div>
            </div>

        </div>

    </div>

</div> --}}

<div class="container">
    <div class="row">
        <div class="span-12">
        </div>

    </div>
    <div class="row" style=" margin-top: 5rem;">

        <div class="span-12 span-md-8 order-2 order-md-1">
            <div class="home-below-fold__slider hide-mobile">
                <div class="home-promo-slider jsHomeSlider">
                </div>
            </div>

            {{-- <div class="home-below-fold__slider show-mobile">
                <div class="home-promo-slider jsHomeMobileSlider">
                </div>
            </div> --}}

            <div class="section-title">
                <span class="section-title__label text-uppercase">Latest Article</span>
            </div>

            <div class="span-12 jsArticleList" style="padding: 0;"></div>
            <div class="span-12 text-center">
                <button class="btn btn-ghost-crimson btn-load-more jsMoreArticle">LOAD MORE</button>
            </div>
        </div>

        {{-- Shoutbox lazone Desktop --}}
        <div class="span-12 span-md-4 order-1 order-md-2 hide-mobile" id="shoutbox">
            {{-- <div class="show-mobile" style="padding-left: 1rem;">
                <div class="section-title section-title--plain section-title--has-more">
                    <span class="section-title__label">Videos</span>
                    <a href="{{ url('gallery/video') }}?utm_source=SeeMore&utm_medium=Video&utm_campaign=LazoneDetail" class="section-title__more" alt="See more"><span>SEE MORE</span><span class="arrow-left"></span></a>
                </div>
            </div>

            <div class="section-title section-title--plain section-title--has-more hide-mobile">
                <span class="section-title__label">Videos</span>
                <a href="{{ url('gallery/video') }}?utm_source=SeeMore&utm_medium=Video&utm_campaign=LazoneDetail" class="section-title__more" alt="See more"><span>SEE MORE</span><span class="arrow-left"></span></a>
            </div>

            <div class="row no-gutters">
                <div class="jsVideoList hide-mobile"></div>
                <div class="home-below-fold__slider show-mobile" style="margin-bottom: 3rem;">
                    <div class="home-promo-slider jsVideoMobileSlider">
                    </div>
                </div>
                <div class="jsMoreVideo"></div>
            </div> --}}

            <div class="shoutbox shoutbox--wide shoutbox--has-bg inner-wrapper-sticky">

                <img class="shoutbox__background post-card__img" alt="lazone id" data-src={{ asset('static/images/new-lazone-prize-12-responsive.jpg') }} />

                <div class="shoutbox__content-wrapper">

                    <div class="shoutbox__title shoutbox__title--extra-bold">
                        <span>Menangkan Hadiah <br class="show-mobile"> Menarik Tiap Bulan!</span>
                    </div>

                    <div class="shoutbox__text shoutbox__text--extra-space">
                        <p>Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!</p>
                    </div>

                    <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                        <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG POIN</strong></a>
                        @guest
                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        {{-- Shoutbox lazone Mobile --}}
        <div class="span-12 span-md-4 order-1 order-md-2 show-mobile">
            <div class="shoutbox shoutbox--wide shoutbox--has-bg">

                <img class="shoutbox__background post-card__img" alt="lazone id" data-src={{ asset('static/images/new-lazone-prize-12-responsive.jpg') }} />

                <div class="shoutbox__content-wrapper">

                    <div class="shoutbox__title shoutbox__title--extra-bold">
                        <span>Menangkan Hadiah <br class="show-mobile"> Menarik Tiap Bulan!</span>
                    </div>

                    <div class="shoutbox__text shoutbox__text--extra-space">
                        <p>Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!</p>
                    </div>

                    <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                        <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG POIN</strong></a>
                        @guest
                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('before-body-end')

<script>
    window.feedUrl = "{{ url('feed') }}"
    window.feedVideoUrl = "{{ url('feed-new-video') }}"
    window.feedTrendingUrl = "{{ url('feed-trending') }}"
    window.feedSliderUrl = "{{ url('feed-slider') }}"
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="post-card post-card--wide post-card--wide__with-padding">

        <div class="post-card__thumbnail">
            <a href="{{ url }}">
                <img class="post-card__img" data-src="{{ thumbnail }}" alt="{{ title }}">
            </a>
        </div>

        <div class="post-card__info">
            <!-- <div class="post-card__meta post-meta">

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

                <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

            </div> -->

            <a href="{{ url }}" alt="{{ title }}">
                <div class="post-card__title post-card__title--large">
                    <span>{{ title }}</span>
                </div>
            </a>

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="{{ category_url }}">
                        <span>{{ category }}</span>
                    </a>
                </div>

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

            </div>

        </div>

    </div>
</script>

<script id="x-video-template" type="text/x-handlebars-template">
<div class="span-12 span-md-6 span-lg-11">
<div class="post-card post-card--video">

    <div class="post-card__thumbnail post-card__thumbnail--video">

        <img class="post-card__img post-card__img--video" src="/img_placeholder_point.jpg" data-src="https://img.youtube.com/vi/{{ youtube_id }}/hqdefault.jpg" alt="{{ title_limit }}">

        <a href="{{ url }}" alt="{{ title_limit }}">
            <div class="post-card__overlay"></div>

            <div class="post-card__vid-play">
                <svg class="svg-vid-play">
                    <use xlink:href="/static/images/sprites.svg#vid-play"></use>
                </svg>
            </div>

            <div class="post-card__frame">
                <svg class="svg-video-frame">
                    <use xlink:href="/static/images/sprites.svg#video-frame"></use>
                </svg>
            </div>

            <div class="post-card__time"><span>{{ duration }}</span></div>
        </a>
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category">
            <a href="/gallery/video" alt="{{ category }}">
                <span>{{ category }}</span>
            </a>
        </div>

    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__stat"><span>{{ published_date }}</span></div>
        <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

    </div>

    <a href="{{ url }}" alt="{{ title_limit }}">
        <div class="post-card__title">
            <span>{{ title_limit }}</span>
        </div>
    </a>
</div>
</div>
</script>

<script id="x-trending-template" type="text/x-handlebars-template">
<div class="span-12 span-md-6 span-lg-3">
    <div class="post-card post-card--simple post-card--simple__max-height">
        <div class="post-card__thumbnail">
            <a href="{{ url }}?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
                <img class="post-card__img" src="img_placeholder_point.jpg" data-src="{{ thumbnail }}" alt="{{ title }}">
            </a>
        </div>

        <div class="post-card__info">

            <!-- <div class="post-card__meta post-meta">

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

                <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

            </div> -->

            <a href="{{ url }}?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
                <div class="post-card__title">
                    <span>{{ title }}</span>
                </div>
            </a>

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="{{ category_url }}" alt="{{ category }}">
                        <span>{{ category }}</span>
                    </a>
                </div>
                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

            </div>

        </div>

    </div>

</div>
</script>

<script id="x-must-template" type="text/x-handlebars-template">
<div class="span-12 span-md-6" style="padding: 0;">
    <div class="post-card post-card--simple post-card--simple__no-padding">

        <div class="post-card__thumbnail">
            <a href="{{ url }}?utm_source=MustReads&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
                <img class="post-card__img" src="img_placeholder_point.jpg" data-src="{{ thumbnail }}" alt="{{ title }}">
            </a>
        </div>
        <!-- <div class="post-card__meta post-meta">

            <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

        </div> -->

        <div class="post-card__info">
            <a href="{{ url }}?utm_source=MustReads&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
                <div class="post-card__title">
                    <span>{{ title }}</span>
                </div>
            </a>

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="{{ category_url }}" alt="{{ category }}">
                        <span>{{ category }}</span>
                    </a>
                </div>
                <div class="post-meta__stat"><span>{{ view }}</span></div>

            </div>
        </div>
    </div>
</div>
</script>

<script id="x-recomended-template" type="text/x-handlebars-template">
<div class="span-12 span-md-6 span-lg-4 span-xl-12">
    <div class="post-card post-card--wide">

        <div class="post-card__thumbnail-square">
            <a href="{{ url }}">
                <img class="post-card__img" data-src="{{ thumbnail }}" alt="{{ title }}">
            </a>
        </div>

        <div class="post-card__info">

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="{{ category_url }}" alt="{{ category }}">
                        <span>{{ category }}</span>
                    </a>
                </div>

            </div>

            <div class="post-card__meta post-meta">

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>
                <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

            </div>

            <a href="{{ url }}{{ utm }}" alt="{{ title }}">
                <div class="post-card__title"><span>{{ title }}</span></div>
            </a>

        </div>

    </div>

</div>
</script>

<script id="x-highlight-template" type="text/x-handlebars-template">
<div class="post-card post-card--highlight">

    <div class="post-card__thumbnail post-card__thumbnail--large">
        <a href="{{ url }}?utm_source=Highlight&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
            <img class="post-card__img post-card__img--large" src="img_placeholder_point.jpg" data-src="{{ thumbnail }}" alt="{{ title }}">
        </a>
    </div>

    <!-- <div class="post-card__meta post-meta post-meta--centered">

        <div class="post-meta__stat"><span>{{ view_count }} views </span></div>

    </div> -->

    <a href="{{ url }}?utm_source=Highlight&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
        <div class="post-card__title post-card__title--xlarge">
            <span>{{ title }}</span>
        </div>
        <div class="post-card__excerpt">
            <p>{{  summary }}</p>
        </div>
    </a>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category">
            <a href="{{ category_url }}" alt="{{ category }}">
                <span>{{ category }}</span>
            </a>
        </div>
        <div class="post-meta__stat"><span>13 Jan 2021</span></div>
        <!-- <div class="post-meta__stat"><span>{{ published_date }}</span></div> -->

    </div>

</div>
</script>
@endverbatim
<script src="{{ asset('static/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('static/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('static/js/home.min.js') }}?v=1"></script>
<script type="text/javascript">
var _c_url = '{{ config('cas.cas_hostname') }}', _c_email = '{{ auth()->check() ? auth()->user()->email : '' }}', _c_auth = '{{ auth()->check() }}', _c_sso_id = '{{ auth()->check() ? auth()->user()->sso_id : '' }}'
</script>
<script src="{{ asset('static/js/auth.js') }}?v={{ filemtime(public_path() . '/static/js/auth.js') }}"></script>
@endsection
