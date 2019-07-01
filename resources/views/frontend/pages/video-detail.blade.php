@extends('frontend.layouts.skeleton')

@section('inside-head')
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="judul" />
<meta property="og:description" content="deskripsi" />
<meta property="og:image" content="thumbnail" />
@endsection

@section('content')

<div class="container">

    <div class="row">

        <div class="span-12 span-lg-10 off-lg-1">

            <div class="video-breadcrumb">

                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Video</a></li>
                    <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Detail Video</a></li>
                </ul>

            </div>

            <div class="video-container">
                <div class="plyr__video-embed" id="player">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $gallery->youtube_id }}?origin={{ url('/') }}&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                        allowfullscreen allowtransparency allow="autoplay"></iframe>
                </div>
            </div>

            <div class="photo-header">

                <div class="photo-header__info">

                    <div class="photo-header__meta photo-header__meta--video">

                        <div class="post-meta">

                            <div class="post-meta__category"><span>{{ $gallery->type }}</span></div>

                            <div class="post-meta__stat"><span>{{ $gallery->created_at->diffForHumans() }}</span></div>

                            <div class="post-meta__stat"><span>{{ $gallery->view_count }} views</span></div>

                        </div>

                    </div>

                </div>

                <div class="photo-header__share">
                    <ul class="list flex-align-center">
                        <li class="list__item">Share :</li>
                        <li class="list__item list__item--social">
                            <a class="list__link list__link--social jsFbShare"
                                href="{{ 'https://www.facebook.com/sharer/sharer.php?' . 'u=' . urlencode(url()->current()) }}">
                                <img src="{{ asset('static/images/fb-share.png') }}" alt="">
                            </a>
                        </li>
                        <li class="list__item list__item--social">
                            <a class="list__link list__link--social jsTwShare"
                                href="{{ 'https://twitter.com/intent/tweet/' . '?text='. urlencode('text buat di share disini') .'&url=' . urlencode(url()->current()) }}">
                                <img src="{{ asset('static/images/tw-share.png') }}" alt="">
                            </a>
                        </li>
                        <li class="list__item list__item--social">
                            <a data-clipboard-text="{{ url()->current() }}"
                                class="list__link list__link--social jsCopyLink" href="#">
                                <img src="{{ asset('static/images/copy-share.png') }}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="photo-header__title photo-header__title--video">
                <span>Waktunya unjuk gigi di LA Indie Movie : Your Movie Goes Digital!</span>
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

<script src="{{ asset('static/js/plyr.polyfilled.js') }}"></script>
<script src="{{ asset('static/js/video-detail.js') }}"></script>
@endsection
