@extends('frontend.layouts.skeleton')

@section('meta_title', 'Search result for "'.request()->get('search').'"')
@section('head_title', 'Search result for "'.request()->get('search').'"')

{{-- Available Yield: meta, inside-header, after-site-footer, before-body-end --}}

@section('content')

@section('inside-head')
<style type="text/css">
    #is-value,
    #notfound {
        display: none;
    }

    #notfound .row { min-height: 50vh;}
    #notfound .row h3, #notfound .row p { text-align: center}
    #notfound .row h3 { font-family: Montserrat, sans-serif; font-weight: 700; font-size: 3rem; line-height: 36.57px; text-transform: uppercase;}
    #notfound .row p { font-family: Open Sans, sans-serif; font-weight: 400; font-size: 1.8rem; line-height: 24px;}
</style>
@endsection

<div class="container" id="is-value">

    {{-- Judul Kategori --}}
    <div class="row category-header">

        <div class="span-12">

            <div class="section-title section-title--plain section-title--page">
                <span class="section-title__label section-title__label--category">Search result for "{{ request()->get('search') }}"</span>
            </div>

        </div>

        <div class="span-12 text-center">
            <ul class="list flex-justify-center jsTab">
                <li class="list__item active"><a href="#post-list" class="list__link">News</a></li>
                <li class="list__item"><a href="#video-list" class="list__link">Video</a></li>
                <li class="list__item"><a href="#photo-list" class="list__link">Photo</a></li>
            </ul>
        </div>

    </div>
        
    <div class="spinner" id="spinner" style="display: none;">
        <div class="double-bounce2"></div>
    </div>
    
    <div id="searchResult">
    
        <div id="post-list" class="container search-result">
        
            <div class="row">
        
                <div class="span-12">
        
                    <div class="row horizontal-list horizontal-list--margin-top-0">
                        <div class="span-12 jsArticleList"></div>
                        <div class="span-12 text-center">
                            <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button>
                        </div>
                    </div>
        
                </div>
        
            </div>
        
        </div>
        
        <div id="video-list" class="gallery-more container search-result">
        
            <div class="row jsVideoList"></div>
        
            <div class="row">
                <div class="span-12 text-center">
                    <button class="btn btn-ghost btn-load-more jsMoreVideo">LOAD MORE</button>
                </div>
            </div>
        
        </div>
        
        <div id="photo-list" class="gallery-more container search-result">
        
            <div class="row jsPhotoList"></div>
        
            <div class="row">
                <div class="span-12 text-center">
                    <button class="btn btn-ghost btn-load-more jsMorePhoto">LOAD MORE</button>
                </div>
            </div>
        
        </div>
    </div>

</div>

<div class="container" id="notfound">
    <div class="row flex-justify-center flex-align-center">
        <div class="not-found-wrapper">
            <h3>Sorry, Search not found</h3>
            <p>Please try again with some different keywords.</p>
        </div>
    </div>
</div>

@endsection

@section('before-body-end')

<script>
    window.feedUrl = "{{ url('feed-search') }}?type=news&q={{ request()->get('search') }}";
    window.photoFeedUrl = "{{ url('feed-search') }}?type=photo&q={{ request()->get('search') }}";
    window.videoFeedUrl = "{{ url('feed-search') }}?type=video&q={{ request()->get('search') }}";
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">
    <div class="post-card post-card--wide post-card--full">

        <div class="post-card__thumbnail">
            <a href="{{ url }}" alt="{{ title }}">
                <img class="post-card__img" src="{{ thumbnail }}" alt="{{ title }}">
            </a>
        </div>

        <div class="post-card__info" style="margin: auto 0;">

            <a href="{{ url }}" alt="{{ title }}">
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

                <!-- <div class="post-meta__stat"><span>{{ view_count }} views</span></div> -->

            </div>

        </div>

    </div>
</script>
@endverbatim

@verbatim
<script id="x-photo-template" type="text/x-handlebars-template">

    <div class="span-12 span-md-4 span-lg-3">

        <div class="post-card post-card--fourth">

            <div class="post-card__thumbnail post-card__thumbnail--fourth">
                <a href="{{ url }}" alt="{{ title }}">
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

@verbatim
<script id="x-video-template" type="text/x-handlebars-template">

    <div class="span-12 span-md-4 span-lg-3">

            <div class="post-card post-card--fourth">

                <div class="post-card__thumbnail post-card__thumbnail--fourth">
                    <a href="{{ url }}" alt="{{ title }}">
                        <img class="post-card__img post-card__img--fourth" src="https://img.youtube.com/vi/{{ youtube_id }}/hqdefault.jpg" alt="">
                    </a>
                </div>

                <div class="post-card__meta post-meta">

                    <div class="post-meta__category">
                        <a href="/gallery/video" alt="{{ category }}">
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
                        <img src="{{ asset('static/images/clock.png') }}" alt="">
                        @verbatim
                    </span>
                    <span class="stat-with-icon__text">{{ duration }}</span>
                </div>

            </div>

        </div>

    </script>
@endverbatim

<script src="{{ asset('static/js/search.js') }}"></script>
@endsection
