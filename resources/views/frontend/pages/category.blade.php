@extends('frontend.layouts.skeleton')


@section('meta_title', $head->meta_title ? $head->meta_title : $head->name )
@section('meta_description', $head->meta_description ? strip_tags($head->meta_description) : strip_tags($head->description))
@section('meta_keyword', $head->meta_keyword ? strip_tags($head->meta_keyword) : '')

@section('head_title', $head->name)
@section('head_description', $head->description)
@section('head_image', $head->img)
@section('head_url', $head->url)

@section('content')

@section('inside-head')
<style type="text/css">
    #stickyBannerContainer {
        display: none !important;
    }
    @media screen and (min-width: 768px) {
        .section-title {
            margin-left: 1rem;
        }
    }
</style>
@endsection

<div class="faux-bg">
    <div class="container">

        {{-- Judul Kategori --}}
        <div class="row category-header">

            <div class="span-12">

                <div class="row flex-lg-justify-center">
                    <div class="section-title section-title--plain section-title--page" style="margin-left: 2rem;">
                        <span class="section-title__label section-title__label--category">{{ $category->name }}</span>
                    </div>
                </div>

            </div>

            <div class="span-12 text-center">
                <ul class="point-nav list list--subcategory flex-justify-center">
                    @foreach($category->menu as $key => $item)
                        <li class="point-nav__item list__item list__item--subcategory {{ classActiveSegment(2, $item->slug) }}">
                            <a href="{{ $item->sub_url }}" class="list__link">{{ $item->name }}</a>
                        </li>
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

</div>

{{-- Ads Placement --}}
<div class="container">

    <div class="span-12">

        <div class="placement">
            <a href="{{ $ads['url'] }}?utm_source=AdsArticle" alt="{{ $ads['url'] }}">
                <picture>
                    <source media="(min-width: 756px)" srcset="{{ $ads['image'] }}" alt="{{ $ads['url'] }}">
                    <img class="placement__img" src="{{ $ads['image_mobile'] }}" alt="{{ $ads['url'] }}">
                </picture>
            </a>
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

            {{-- <div class="section-title section-title--plain">
                <span class="section-title__label section-title__label--adjust">Recommended</span>
            </div> --}}

            <div class="row no-gutters-lg">

                {{-- @foreach($recommendedPosts as $post)
                <div class="span-12 span-md-6 span-lg-12">
                    @include('frontend.partials.post-card', ['post' => $post])
                </div>
                @endforeach --}}

                {{-- <div class="span-12 shoutbox-sidebar">
                    @include('frontend.partials.shoutbox')
                </div> --}}

            </div>

        </div>

    </div>

</div>

@endsection

@section('before-body-end')

<script>
    window.feedUrl = "{{ url('feed') }}?category={{ $type ? $category->slug : $subcategory->slug }}"
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="post-card post-card--wide post-card--wide__with-padding">

        <div class="post-card__thumbnail">
            <a href="{{ url }}">
                <img class="post-card__img" src="{{ thumbnail }}" alt="">
            </a>
        </div>

        <div class="post-card__info">

            <a href="{{ url }}" alt="{{ title }}">
                <div class="post-card__title">
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
            <!-- <div class="post-card__meta post-meta">

                <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

            </div> -->

        </div>

    </div>

</script>
@endverbatim

<script src="{{ asset('static/js/category.js') }}"></script>
@endsection
