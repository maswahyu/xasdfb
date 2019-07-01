@extends('frontend.layouts.skeleton')

{{-- Available Yield: meta, inside-header, after-site-footer, before-body-end --}}

@section('content')

<div class="container">

    {{-- Judul Kategori --}}
    <div class="row category-header">

        <div class="span-12">

            <div class="section-title section-title--plain section-title--page">
                <span class="section-title__label section-title__label--category">{{ $category->name }}</span>
            </div>

        </div>

        <div class="span-12 text-center">
            <ul class="list flex-justify-center">
                @foreach($category->children as $key => $item)
                    <li class="list__item {{ classActiveSegment(2, $item->slug) }} {{ ($key == 0 && !Request::segment(2)) ? 'active' : '' }}"><a href="{{ $item->sub_url }}" class="list__link">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </div>

    </div>


    {{--  Sticky Post --}}
    <div class="row category-sticky">
        @foreach($stickyPosts as $post)
        <div class="span-12 span-lg-6">
            @include('frontend.partials.post-card-category-sticky',['post' => $post ])
        </div>
        @endforeach
    </div>

    {{-- Latest Post --}}
    <div class="row category-latest">
        @foreach($latestPosts as $post)
        <div class="span-12 span-md-6 span-lg-4">
            @include('frontend.partials.post-card-third',['post' => $post ])
        </div>
        @endforeach
    </div>

</div>

{{-- Ads Placement --}}
<div class="container">

    <div class="span-12">

        <div class="placement">
            <img class="placement__img" src="{{ asset('static/images/mock/ads.jpg') }}" alt="">
        </div>

    </div>

</div>

{{-- List with side --}}
<div class="container">

    <div class="list-with-sidebar">

        <div class="list-with-sidebar__main">

            <div class="row horizontal-list horizontal-list--margin-top-0">
                <div class="section-title">
                    <span class="section-title__label">Latest Articles</span>
                </div>

                <div class="span-12 jsArticleList"></div>
                <div class="span-12 text-center">
                    <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button>
                </div>
            </div>

        </div>

        <div class="list-with-sidebar__aside">

            <div class="section-title section-title--plain">
                <span class="section-title__label section-title__label--adjust">Recommended Articles</span>
            </div>

            <div class="row no-gutters-lg">

                @foreach($recommendedPosts as $post)
                <div class="span-12 span-md-6 span-lg-12">
                    @include('frontend.partials.post-card', ['post' => $post])
                </div>
                @endforeach

                <div class="span-12 shoutbox-sidebar">
                    @include('frontend.partials.shoutbox')
                </div>

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

    <a href="{{ url }}" class="post-card post-card--wide">

        <div class="post-card__thumbnail">
            <img class="post-card__img" src="{{ thumbnail }}" alt="">
        </div>

        <div class="post-card__info">

            <div class="post-card__meta post-meta">

                <div class="post-meta__category"><span>{{ category }}</span></div>

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

                <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

            </div>

            <div class="post-card__title">
                <span>{{ title }}</span>
            </div>

        </div>

    </a>
</script>
@endverbatim

<script src="{{ asset('static/js/category.js') }}"></script>
@endsection
