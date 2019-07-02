@extends('frontend.layouts.skeleton')

{{-- Available Yield: meta, inside-header, after-site-footer, before-body-end --}}

@section('content')

<div class="faux-bg">

    <div class="container">

        {{-- Judul Kategori --}}
        <div class="row category-header">

            <div class="span-12">

                <div class="section-title section-title--plain section-title--page">
                    <span class="section-title__label section-title__label--category">Gallery</span>
                </div>

            </div>

            <div class="span-12 text-center">
                <ul class="list flex-justify-center">
                    <li class="list__item active"><a href="{{ url('gallery/video') }}" class="list__link">Video</a></li>
                    <li class="list__item"><a href="{{ url('gallery/photo') }}" class="list__link">Photo</a></li>
                </ul>
            </div>

        </div>

        <div class="row latest-video">

            <div class="section-title section-title--plain">
                <span class="section-title__label">Latest Videos</span>
            </div>

            <div class="latest-video__sticky">
                @include('frontend.partials.post-card-video-sticky', ['video' => $stickyVideo])
            </div>

            <div class="latest-video__list">
                @each('frontend.partials.post-card-video-horizontal', $latestVideos, 'video')
            </div>

        </div>

    </div>

</div>

{{-- Ads Placement --}}
<div class="container">

    <div class="row">

        <div class="span-12">

            <div class="placement">
                <img class="placement__img" src="{{ asset('static/images/mock/ads.jpg') }}" alt="">
            </div>

        </div>

    </div>

</div>

{{-- More Videos --}}
<div class="gallery-more container">

    <div class="row">

        <div class="span-12">

            <div class="section-title">
                <span class="section-title__label">See More Videos</span>
            </div>

        </div>

    </div>

    <div class="row jsArticleList"></div>

    <div class="row">
        <div class="span-12 text-center">
            <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button>
        </div>
    </div>

</div>

@endsection

@section('before-body-end')

<script>
    window.feedUrl = "{{ url('feed-video') }}"
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="span-12 span-md-4 span-lg-3">

        <a href="{{ url }}" class="post-card post-card--fourth">

            <div class="post-card__thumbnail post-card__thumbnail--fourth">
                <img class="post-card__img post-card__img--fourth" src="https://img.youtube.com/vi/{{ youtube_id }}/hqdefault.jpg" alt="">
            </div>

            <div class="post-card__meta post-meta">

                <div class="post-meta__category"><span>{{ category }}</span></div>

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

            </div>

            <div class="post-card__title">
                <span>{{ title }}</span>
            </div>
            <div class="post-card__additional stat-with-icon">
                <span class="stat-with-icon__icon">
                    @endverbatim
                    <img src="{{ asset('static/images/clock.png') }}" alt="">
                    @verbatim
                </span>
                <span class="stat-with-icon__text">{{ duration }}</span>
            </div>

        </a>

    </div>

</script>
@endverbatim

<script src="{{ asset('static/js/video.js') }}"></script>
@endsection