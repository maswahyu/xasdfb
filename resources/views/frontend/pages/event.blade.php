@extends('frontend.layouts.skeleton')

@section('content')

<div class="container">

    <div class="row ">

        <div class="span-12">

            <div class="section-title section-title--plain section-title--page">
                <span class="section-title__label section-title__label--category">Events</span>
            </div>

        </div>
    </div>

    <div class="row">
        @foreach($stickyEvents as $event)
        <div class="span-12 span-lg-6">
            @include('frontend.partials.event-card', ['event' => $event])
        </div>
        @endforeach
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

{{-- Listing --}}
<div class="container">

    <div class="list-with-sidebar">

        <div class="list-with-sidebar__main">

            <div class="row horizontal-list jsArticleList"></div>

            <div class="row">
                <div class="span-12 text-center">
                    <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button>
                </div>
            </div>

        </div>

        <div class="list-with-sidebar__aside">

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

            <div class="row no-gutters-lg">
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
    window.feedUrl = "{{ url('feed-event') }}"
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="span-12 span-md-6 span-lg-12">
    <a href="{{ url }}" class="event-card event-card--horizontal">

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

        </a>
    </div>

</script>
@endverbatim

<script src="{{ asset('static/js/event.js') }}"></script>
@endsection
