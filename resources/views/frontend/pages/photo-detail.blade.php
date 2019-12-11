@extends('frontend.layouts.skeleton')

@section('meta_title', $album->name)
@section('meta_description', $album->name)

@section('head_title', $album->name)
@section('head_image', $album->thumbnail)
@section('head_url', $album->url)

@section('content')

<div class="container">

    <div class="row">

        <div class="span-12 span-lg-10 off-lg-1">

            <div class="photo-header">

                <div class="photo-header__info">

                    <div class="photo-header__breadcrumb">

                        <ul class="breadcrumb">
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ url('gallery/photo') }}">Photo</a></li>
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ url()->current() }}">Detail Photo</a></li>
                        </ul>

                    </div>

                    <div class="photo-header__meta">

                        <div class="post-meta">

                            <div class="post-meta__category">
                                <a href="{{ url('gallery/photo') }}" alt="{{ $album->category }}">
                                    <span>{{ $album->category }}</span>
                                </a>
                            </div>

                            <div class="post-meta__stat"><span>{{ optional($album->created_at)->diffForHumans() }}</span></div>

                            <div class="post-meta__stat"><span>{{ $album->view_count }} views</span></div>

                        </div>

                    </div>

                    <div class="photo-header__title">
                        <span>{{ $album->name }}</span>
                    </div>

                    <div class="photo-header__stat">

                        <div class=" stat-with-icon">

                            <span class="stat-with-icon__icon">
                                <img src="{{ asset('static/images/slides.png') }}" alt="">
                            </span>

                            <span class="stat-with-icon__text">{{ $album->photos->count() }} Photos</span>

                        </div>

                    </div>

                </div>

                <div class="photo-header__share">
                    <ul class="list flex-align-center">
                        <li class="list__item">Share :</li>
                        <li class="list__item list__item--social">
                            <a class="list__link list__link--social jsFbShare"
                                href="{{ 'https://www.facebook.com/sharer/sharer.php' . '?u=' . urlencode(url()->current()) }}">
                                <img src="{{ asset('static/images/fb-share.png') }}" alt="">
                            </a>
                        </li>
                        <li class="list__item list__item--social">
                            <a class="list__link list__link--social jsTwShare"
                                href="{{ 'https://twitter.com/intent/tweet/' . '?text='. urlencode($album->name) .'&url=' . urlencode(url()->current()) }}">
                                <img src="{{ asset('static/images/tw-share.png') }}" alt="">
                            </a>
                        </li>
                        {{-- <li class="list__item list__item--social">
                            <a data-clipboard-text="{{ url()->current() }}"
                                class="list__link list__link--social jsCopyLink" href="#">
                                <img src="{{ asset('static/images/copy-share.png') }}" alt="">
                            </a>
                        </li> --}}
                    </ul>
                </div>

            </div>

        </div>

    </div>

    @foreach($album->photos as $image)

    @push('main-slider')
    <div class="photo-slider__slide">
        <img src="{{ $image->thumbnail }}" alt="{{ $image->title }}" class="photo-slider__img">
    </div>
    @endpush

    @push('nav-slider')
    <div class="photo-nav__slide">
        <img src="{{ $image->thumbnail }}" alt="{{ $image->title }}" class="photo-nav__img" style="width: 247px;">
    </div>
    @endpush

    @endforeach

    <div class="row no-gutters">

        <div class="span-12 span-lg-10 off-lg-1">
            <div class="photo-slider jsPhotoSlider">
                @stack('main-slider')
            </div>
            <div class="photo-nav jsPhotoNav">
                @stack('nav-slider')
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

{{-- More Photos --}}
<div class="gallery-more container">

    <div class="row">

        <div class="span-12">

            <div class="section-title">
                <span class="section-title__label">See More Photos</span>
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
    window.feedUrl = "{{ url('feed-photo') }}"
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="span-12 span-md-4 span-lg-3">

        <div class="post-card post-card--fourth">

            <div class="post-card__thumbnail post-card__thumbnail--fourth">
                <a href="{{ url }}" alt="">
                    <img class="post-card__img post-card__img--fourth" src="{{ thumbnail }}" alt="">
                </a>
            </div>

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="/gallery/photo">
                        <span>{{ category }}</span>
                    </a>
                </div>

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

            </div>

            <a href="{{ url }}" alt="{{ title }}">
                <div class="post-card__title">
                    <span>{{ title }}</span>
                </div>
            </a>
            <div class="post-card__additional stat-with-icon">
                <span class="stat-with-icon__icon">
                    @endverbatim
                    <img src="{{ asset('static/images/slides.png') }}" alt="">
                    @verbatim
                </span>
                <span class="stat-with-icon__text">{{ photo_count }}</span>
            </div>

        </div>

    </div>

</script>
@endverbatim

<script src="{{ asset('static/js/photo-detail.js') }}"></script>
@endsection
