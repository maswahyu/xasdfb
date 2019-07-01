@extends('frontend.layouts.skeleton')

@section('inside-head')
@section('head_title', $post->title)
@section('head_description', $post->summary)
@section('head_image', imageview($post->image))
@section('head_url', $post->url)
@endsection

@section('content')

{{-- Ads Placement --}}
<div class="container">

    <div class="row">

        <div class="span-12">

            <div class="placement placement--top-margin-0">
                <img class="placement__img" src="{{ asset('static/images/mock/ads.jpg') }}" alt="">
            </div>

        </div>

    </div>

    <div class="row flex-justify-center post-breadcrumb">

        <ul class="breadcrumb">
            <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">{{ optional($post->category->parent)->name }}</a></li>
            <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">{{ $post->category_name }}</a></li>
        </ul>

    </div>

    <div class="row">

        <div class="span-12 span-lg-10 off-lg-1 span-xl-8 off-xl-2">

            <div class="post-header text-center">
 
                <h1 class="post-header__title">{{ $post->title }}</h1>

                <div class="post-header__meta">

                    <div class="post-meta post-meta--centered">

                        <div class="post-meta__category"><span>{{ $post->category_name }}</span></div>

                        <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

                        <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div id="sidebar" class="span-12 span-lg-1 span-xl-2 sidebar">
            <ul class="list list--vertical flex-align-center">
                <li class="list__label">Share :</li>
                <li class="list__item list__item--social">
                    <a class="list__link list__link--social jsFbShare"
                        href="{{ 'https://www.facebook.com/sharer/sharer.php?' . 'u=' . urlencode(url()->current()) }}">
                        <img src="{{ asset('static/images/fb-so.png') }}" alt="">
                    </a>
                </li>
                <li class="list__item list__item--social">
                    <a class="list__link list__link--social jsTwShare"
                        href="{{ 'https://twitter.com/intent/tweet/' . '?text='. urlencode($post->title) .'&url=' . urlencode(url()->current()) }}">
                        <img src="{{ asset('static/images/tw-so.png') }}" alt="">
                    </a>
                </li>
                <li class="list__item list__item--social">
                    <a data-clipboard-text="{{ url()->current() }}" class="list__link list__link--social jsCopyLink"
                        href="#">
                        <img src="{{ asset('static/images/link-so.png') }}" alt="">
                    </a>
                </li>
            </ul>

        </div>

        {{-- CONTENT DUMMY --}}
        <div class="span-12 span-lg-10 span-xl-8 post-content">

            <img src="{{ imageview($post->image) }}" alt="{{ $post->title }}">

            <p><strong>LAZONE.ID</strong> - {!! $post->summary !!}</p>

            {!! $post->content !!}

        </div>

    </div>

    <div class="row post-tag">
        <div class="span-12 span-lg-10 off-lg-1">
            <ul class="list">
                <li>TAGS</li>
                @foreach($post->tags as $item)
                    <li class="list__item active"><a href="{{ url('tags/'.optional($item->tag)->slug) }}" class="list__link list__link--tag">{{ optional($item->tag)->name }}</a></li>
                @endforeach
            </ul>

        </div>
    </div>

</div>

<div class="related-post">
    <div class="container">
        <div class="row">
            <div class="span-12">
                <div class="section-title section-title--plain">
                    <span class="section-title__label">Related Articles</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedPosts as $post)
            <div class="span-12 span-lg-4">
                @include('frontend.partials.post-card-related', ['post' => $post])
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="latest-post">

    <div class="container">

        <div class="row">

            <div class="span-12 span-lg-8 off-lg-2">

                <div class="row">
                    <div class="span-12">
                        <div class="section-title">
                            <span class="section-title__label">Latest Articles</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="span-12 jsArticleList"></div>
                </div>

                <div class="row">
                    <div class="span-12 text-center">
                        <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button>
                    </div>
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

<script src="{{ asset('static/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('static/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('static/js/post.js') }}"></script>
@endsection
