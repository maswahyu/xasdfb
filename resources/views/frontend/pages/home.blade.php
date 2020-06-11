@extends('frontend.layouts.skeleton')

@section('content')

{{-- Above the fold --}}
<div class="container">

    <div class="home-grid">

        <div class="home-grid__must-reads">

            <div class="section-title">
                <span class="section-title__label">Must Reads</span>
            </div>

            <div class="home-grid__must-reads-list">
                @foreach($mustReads as $post)
                <div class="span-12 span-md-6 span-lg-12">
                    @include('frontend.partials.post-card', ['post' => $post, 'utm' => '?utm_source=MustReads&utm_medium=Content&utm_campaign=LazoneDetail'])
                </div>
                @endforeach
            </div>

            <div class="home-grid__must-reads-highlights">
                @include('frontend.partials.post-card-highlight', ['post' => $highlight, 'utm' => '?utm_source=Highlight&utm_medium=Content&utm_campaign=LazoneDetail'])
            </div>

        </div>

        <div class="home-grid__recommended">

            <div class="section-title section-title--mobile-ribbon">
                <span class="section-title__label">Recommended</span>
            </div>

            <div class="row">
                @foreach($recommended as $post)
                <div class="span-12 span-md-6 span-lg-4 span-xl-12">
                    @include('frontend.partials.post-card-mini', ['post' => $post, 'utm' => auth()->check() ? '?utm_source=Recommended&utm_medium=Login&utm_campaign=LazoneDetail' : '?utm_source=Recommended&utm_medium=NotLogin&utm_campaign=LazoneDetail'])
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="home-below-fold">

        <div class="home-below-fold__slider hide-mobile">
            <div class="home-promo-slider jsHomeSlider">
                @foreach($slides as $post)
                <div class="home-promo-slider__slide">
                    <a href="{{ $post->url }}?utm_source=Banner&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ $post->title }}">
                        <img src="/img_placeholder_slider.jpg" data-lazy="{{ $post->img }}" alt="{{ $post->title }}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="home-below-fold__slider show-mobile">
            <div class="home-promo-slider jsHomeSlider">
                @foreach($slides as $post)
                <div class="home-promo-slider__slide">
                    <a href="{{ $post->url }}?utm_source=Banner&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ $post->title }}">
                        <img src="/img_placeholder_slider.jpg" data-lazy="{{ $post->mobile_img }}" alt="{{ $post->title }}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="home-below-fold__preference">

            @include('frontend.partials.shoutbox')

        </div>

    </div>

</div>

{{--  Trending Article --}}
<div class="home-trending">

    <div class="container">

        <div class="section-title">
            <span class="section-title__label text-white">Trending Articles</span>
        </div>

        <div class="row">
            @if($trending)
            @foreach($trending as $post)
            <div class="span-12 span-md-6 span-lg-3">
                @include('frontend.partials.post-card-simple', ['post' => $post, 'utm' => '?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail'])
            </div>
            @endforeach
            @endif

        </div>

    </div>

</div>

{{-- Ads Placement --}}
<div class="container">

    <div class="row">

        <div class="span-12">

            <div class="placement">
                <a href="{{ env('URL_ADS') }}?utm_source=AdsHome" alt="Lazone.id">
                    <img class="placement__img" src="{{ asset('static/images/mock/ads.jpg') }}" alt="Lazone.id">
                </a>
            </div>

        </div>


    </div>

</div>

{{-- List with side --}}
<div class="container">

    <div class="list-with-sidebar">

        <div class="list-with-sidebar__main">

            {{-- Shoutbox lazone --}}
            <div class="shoutbox shoutbox--wide shoutbox--has-bg">

                <img class="shoutbox__background hide-mobile" src={{ asset('static/images/lazone-prize-12.jpg') }} />
                <img class="shoutbox__background show-mobile" src={{ asset('static/images/lazone-prize-12-responsive.jpg') }} />

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
                @foreach($videos as $video)
                <div class="span-12 span-md-6 span-lg-12">
                    @include('frontend.partials.post-card-video', ['video' => $video])
                </div>
                @endforeach
            </div>

        </div>

    </div>

</div>

@endsection

@section('before-body-end')

<script>
    window.feedUrl = "{{ url('feed') }}"
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="post-card post-card--wide">

        <div class="post-card__thumbnail">
            <a href="{{ url }}?utm_source=Latest&utm_medium=Content&utm_campaign=LazoneDetail">
                <img class="post-card__img" src="{{ thumbnail }}" alt="">
            </a>
        </div>

        <div class="post-card__info">

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="{{ category_url }}">
                        <span>{{ category }}</span>
                    </a>
                </div>

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

                <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

            </div>

            <a href="{{ url }}?utm_source=Latest&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
                <div class="post-card__title">
                    <span>{{ title }}</span>
                </div>
            </a>

        </div>

    </div>
</script>
@endverbatim

<script src="{{ asset('static/js/home.js') }}?v={{ filemtime(public_path() . '/static/js/home.js') }}"></script>
@endsection
