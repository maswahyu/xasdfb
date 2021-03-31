@extends('frontend.layouts.skeleton')

@section('meta_title', 'Events')
@section('head_title', 'Events')
@section('head_url', url()->current())

@section('inside-head')
<style>
    @media screen and (max-width: 768px) {
        #stickyBannerContainer {
            display: none !important;
        }
    }
</style>
@endsection

@section('content')

    <div class="container">

        <div class="row flex-justify-center">

            <div class="section-title section-title--plain section-title--page" style="margin-bottom: unset;">
                <span class="section-title__label section-title__label--category">Events</span>
            </div>
            
        </div>

        <div class="row jsEventList">
            {{--@foreach($stickyEvents as $event)--}}
            {{--<div class="span-12 span-lg-6">--}}
            {{--@include('frontend.partials.event-card', ['event' => $event])--}}
            {{--</div>--}}
            {{--@endforeach--}}
        </div>

        <div class="row">
            <div class="span-12 text-center">
                <button class="btn btn-ghost btn-load-more jsMoreEvent">LOAD MORE</button>
            </div>
        </div>

    </div>

    {{-- Ads Placement --}}
    <div class="container hide-mobile">

        <div class="row">

            <div class="span-12">

                <div class="placement">
                    <a href="{{ $ads['url'] }}?utm_source=AdsArticle" alt="{{ $ads['url'] }}">
                        <img class="placement__img" src="{{ $ads['image'] }}" alt="{{ $ads['url'] }}">
                    </a>
                </div>

            </div>


        </div>

    </div>

    {{-- Listing --}}
    <div class="container" style="margin-top: 1.6rem;">

        <div class="list-with-sidebar">

            <div class="list-with-sidebar__main">

                <div class="row horizontal-list horizontal-list--margin-top-0 jsArticleList"></div>

                <div class="row">
                    <div class="span-12 text-center">
                        <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button>
                    </div>
                </div>

            </div>

            <div class="list-with-sidebar__aside hide-mobile">

                <div class="section-title section-title--plain section-title--has-more">
                    <span class="section-title__label">Videos</span>
                    <a href="#" class="section-title__more"><span>SEE MORE</span><span class="arrow-left"></span></a>
                </div>

                <div class="row no-gutters">
                    @foreach($videos as $video)
                        <div class="span-12 span-md-6 span-lg-12">
                            @include('frontend.partials.post-card-video', ['video' => $video])
                        </div>
                    @endforeach
                </div>

                <div class="section-title section-title--plain section-title--has-more section-title--top-margin">
                    <span class="section-title__label">Photos</span>
                    <a href="#" class="section-title__more"><span>SEE MORE</span><span class="arrow-left"></span></a>
                </div>

                <div class="row no-gutters">
                    @foreach($photos as $photo)
                        <div class="span-12 span-md-6 span-lg-12">
                            @include('frontend.partials.post-card-photo', ['photo' => $photo])
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
@endsection

@section('before-body-end')

    <script>
        window.feedUrl = "{{ url('feed-event') }}";
        window.upcomingEventUrl = "{{ url('new-event') }}";
    </script>

    @verbatim
        <script id="x-post-template" type="text/x-handlebars-template">

            <div class="span-12 span-md-6 span-lg-12">
                <div class="event-card event-card--horizontal">

                    <div class="event-card__thumbnail event-card__thumbnail--horizontal">
                        <img class="event-card__img event-card__img--horizontal" src="{{ thumbnail }}" alt="">
                    </div>

                    <div class="event-card__meta event-card__meta--horizontal">

                        <div class="event-card__info">
                            <div class="event-card__name event-card__name--horizontal"><span>{{ title }}</span></div>
                            <div class="event-card__date event-card__date--horizontal"><span>{{ date }}</span></div>
                            <div class="event-card__location"><span>{{ summary }}</span></div>
                        </div>

                    </div>

                </div>
            </div>

        </script>
    @endverbatim

    @verbatim
        <script id="x-event-template" type="text/x-handlebars-template">

            <div class="span-12 span-lg-6">

                <div class="event-card event-card--elevate">

                    <div class="event-card__thumbnail">
                        <img class="event-card__img" src="{{ thumbnail }}" alt="">
                    </div>

                    <div class="event-card__meta">

                        <div class="event-card__date calendar">
                            <div class="calendar__date">{{ start_at_j }}</div>
                            <div class="calendar__month-year">{{ start_at_m }}</div>
                        </div>

                        <div class="event-card__info">
                            <div class="event-card__name"><span>{{ title }}</span></div>
                            <div class="event-card__location"><span>{{ summary }}</span></div>
                        </div>

                    </div>

                </div>

            </div>

        </script>
    @endverbatim

    <script src="{{ asset('static/js/event.js') }}"></script>
@endsection