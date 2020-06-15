@extends('frontend.layouts.skeleton')


@section('meta_title', $post->meta_title ? $post->meta_title : $post->title )
@section('meta_description', $post->meta_description ? strip_tags($post->meta_description) : strip_tags($post->summary))
@section('meta_keyword', $post->meta_keyword ? strip_tags($post->meta_keyword) : '')

@section('head_title', $post->title)
@section('head_description', strip_tags($post->summary))
@section('head_image', imageview(str_replace(' ', '%20', $post->image)))
@section('head_url', $post->url)

@section('content')

{{-- Ads Placement --}}
<div class="container">

    <div class="row">

        <div class="span-12">

            <div class="placement placement--top-margin-0">
                <a href="{{ env('URL_ADS') }}?utm_source=AdsArticle" alt="My Point">
                    <img class="placement__img" src="{{ asset('static/images/mock/ads_new.jpg') }}" alt="My Point">
                </a>
            </div>

        </div>

    </div>

    <div class="row flex-justify-center post-breadcrumb">

        <ul class="breadcrumb">
            @if($post->category)
            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ $post->category->parent->url }}">{{ $post->parent_name }}</a></li>
            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ $post->category->url }}">{{ $post->category_name }}</a></li>
            @endif
        </ul>

    </div>

    <div class="row">

        <div class="span-12 span-lg-10 off-lg-1 span-xl-8 off-xl-2">

            <div class="post-header text-center">

                <h1 class="post-header__title">{{ $post->title }}</h1>

                <div class="post-header__meta">

                    <div class="post-meta post-meta--centered">

                        <div class="post-meta__category">
                            @if($post->category)
                            <a href="{{ $post->category->url }}" alt="{{ $post->category_name }}">
                                <span>{{ $post->category_name }}</span>
                            </a>
                            @endif
                        </div>

                        <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

                        <div class="post-meta__stat"><span>{{ isset($post->popularityStats->all_time_stats) ? seribu($post->popularityStats->all_time_stats + $post->view) : seribu($post->view) }} views</span></div>

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
                {{-- <li class="list__item list__item--social">
                    <a data-clipboard-text="{{ url()->current() }}" class="list__link list__link--social jsCopyLink"
                        href="#">
                        <img src="{{ asset('static/images/link-so.png') }}" alt="">
                    </a>
                </li> --}}
            </ul>

        </div>

        {{-- CONTENT DUMMY --}}
        <div class="span-12 span-lg-10 span-xl-8 post-content">

            <img class="post-card__img" src="{{ imageview('') }}" data-src="{{ imageview($post->image) }}" alt="{{ $post->title }}">

            <p><strong>LAZONE.ID</strong> - {!! $post->summary !!}</p>

            <div id="post-content">

            {!! $post->content !!}

            </div>
        </div>

    </div>

    <div class="row post-tag">
        <div class="span-12 span-lg-10 off-lg-1">
            <ul class="list">
                @if($post->tags)
                <li>TAGS</li>
                @foreach($post->tags as $item)
                    <li class="list__item active"><a href="{{ url('tag/'.optional($item->tag)->slug) }}" class="list__link list__link--tag">{{ optional($item->tag)->name }}</a></li>
                @endforeach
                @endif
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
            @foreach($relatedPosts as $post_related)
            <div class="span-12 span-lg-4">
                @include('frontend.partials.post-card-related', ['post' => $post_related])
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
    var p_id = '{{ $post->id }}';
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="post-card post-card--wide">

        <div class="post-card__thumbnail">
            <a href="{{ url }}" alt="{{ title }}">
                <img class="post-card__img" src="{{ thumbnail }}" alt="">
            </a>
        </div>

        <div class="post-card__info">

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="{{ category_url }}">
                        <span>{{ category }}</span>
                    </a>
                </div>

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

                <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

            </div>

            <a href="{{ url }}" alt="{{ title }}">
                <div class="post-card__title">
                    <span>{{ title }}</span>
                </div>
            </a>

        </div>

    </div>
</script>
@endverbatim
<script src="{{ asset('static/js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('static/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('static/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('static/js/post.js') }}?v={{ filemtime(public_path() . '/static/js/post.js') }}"></script>
@endsection
