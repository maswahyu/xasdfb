@extends('frontend.layouts.skeleton')

@php
$title = "Berita Seputar ".ucwords(str_replace('-', ' ', request()->segment(2)))." Terbaru Hari Ini";
$desc = "Temukan berita terbaru seputar ".request()->segment(2)." disini. Dapatkan hadiah menarik setiap bulannya dengan mengumpulkan My Points. GRATIS Hanya di LAzone";
@endphp

@section('meta_title', $title)
@section('meta_description', $desc)

@section('head_title', $title)
@section('head_description', $desc)
@section('head_url', url()->current())

@section('content')

<div class="container">

    {{-- Judul Kategori --}}
    <div class="row category-header">

        <div class="span-12">

            <div class="section-title section-title--plain section-title--page">
                <span class="section-title__label section-title__label--category">Tagged In #{{ request()->segment(2) }}</span>
            </div>

        </div>

    </div>

</div>

<div id="post-list" class="container">

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

@endsection

@section('before-body-end')

<script>
    window.feedUrl = "{{ url('feed-tags') }}?hashtag={{ request()->segment(2) }}";
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">
    <a href="{{ url }}" class="post-card post-card--wide post-card--full">

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

<script src="{{ asset('static/js/tags.js') }}"></script>
@endsection
