@extends('frontend.layouts.skeleton')


@section('meta_title', $post->meta_title ? $post->meta_title : $post->title )
@section('meta_description', $post->meta_description ? strip_tags($post->meta_description) : strip_tags($post->summary))
@section('meta_keyword', $post->meta_keyword ? strip_tags($post->meta_keyword) : '')

@section('head_title', $post->title)
@section('head_description', strip_tags($post->summary))
@section('head_image', imageview(str_replace(' ', '%20', $post->image)))
@section('head_url', $post->url)

@section('inside-head')
<style>
    @media screen and (max-width: 768px) {
        .shoutbox {
            margin-top: 3rem;
        }
    }
</style>
@endsection

@section('content')

{{-- Ads Placement --}}
<div class="container">

    <div class="row">

        <div class="span-12">

            <div class="placement placement--top-margin-0">
                <a href="{{ $ads['url'] }}?utm_source=AdsArticle" alt="{{ $ads['url'] }}">
                    <img class="placement__img" src="{{ $ads['image'] }}" alt="{{ $ads['url'] }}">
                </a>
            </div>

        </div>

    </div>

    {{-- <div class="row flex-justify-center post-breadcrumb">

        <ul class="breadcrumb">
            @if($post->category)
            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ $post->category->parent->url }}">{{ $post->parent_name }}</a></li>
            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ $post->category->url }}">{{ $post->category_name }}</a></li>
            @endif
        </ul>

    </div> --}}

    <div class="row">

        <div class="span-12 span-lg-10 off-lg-1 span-xl-7 off-xl-3">

            <ul class="breadcrumb">
                @if($post->category)
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ $post->category->parent->url }}">{{ $post->parent_name }}</a></li>
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ $post->category->url }}">{{ $post->category_name }}</a></li>
                @endif
            </ul>

            <div class="post-header">

                <h1 class="post-header__title">{{ $post->title }}</h1>

                <div class="post-header__meta">

                    {{-- <div class="post-meta post-meta--centered post-meta--centered-article">

                        <div class="post-meta__category">
                            @if($post->category)
                            <a href="{{ $post->category->url }}" alt="{{ $post->category_name }}">
                                <span>{{ $post->category_name }}</span>
                            </a>
                            @endif
                        </div>

                    </div> --}}

                    <div class="post-meta">

                        <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

                        <div class="post-meta__stat"><span>{{ isset($post->popularityStats->all_time_stats) ? seribu($post->popularityStats->all_time_stats + $post->view) : seribu($post->view) }} views</span></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div id="sidebar" class="span-12 span-lg-1 sidebar">
            <ul class="list list--vertical flex-align-center">
                <li class="list__label">Share:</li>
                <li class="list__item list__item--social">
                    <a class="list__link list__link--social jsFbShare"
                        href="{{ 'https://www.facebook.com/sharer/sharer.php?' . 'u=' . urlencode(url()->current()) }}">
                        <img src="{{ asset('static/images/fb-so-blue.png') }}" alt="">
                    </a>
                </li>
                <li class="list__item list__item--social">
                    <a class="list__link list__link--social"
                        href="#">
                        <img src="{{ asset('static/images/messenger-share.png') }}" alt="">
                    </a>
                </li>
                <li class="list__item list__item--social">
                    <a class="list__link list__link--social jsTwShare"
                        href="{{ 'https://twitter.com/intent/tweet/' . '?text='. urlencode($post->title) .'&url=' . urlencode(url()->current()) }}">
                        <img src="{{ asset('static/images/tw-so.png') }}" alt="">
                    </a>
                </li>
                <li class="list__item list__item--social">
                    <a class="list__link list__link--social"
                        href="{{ 'https://api.whatsapp.com/send?text=' . urlencode($post->title) . ' ' . urlencode(url()->current()) }}">
                        <img src="{{ asset('static/images/wa-share.png') }}" alt="">
                    </a>
                </li>
                <li class="list__item list__item--social">
                    <a class="list__link list__link--social"
                        href="{{ 'https://social-plugins.line.me/lineit/share?url='.urlencode(url()->current()).'&text=' . urlencode($post->title) }}">
                        <img src="{{ asset('static/images/line-share.png') }}" alt="">
                    </a>
                </li>
                <li class="list__item list__item--social">
                    <a data-clipboard-text="{{ url()->current() }}"  id="refCopyLink" class="list__link list__link--social jsCopyLink"
                        >
                        <img src="{{ asset('static/images/link-share.png') }}" alt="">
                    </a>
                </li>
            </ul>

        </div>

        {{-- CONTENT DUMMY --}}
        <div class="span-12 span-lg-10">

            <div class="row no-gutters flex-justify-center">
                <div class="span-12 span-lg-10">

                    <img class="post-card__img post-card__img-article" src="{{ imageview('') }}" data-src="{{ imageview($post->image) }}" alt="{{ $post->title }}">

                </div>

                <div class="span-12 span-lg-10 span-xl-7">

                    <p><strong>LAZONE.ID</strong> - {!! $post->summary !!}</p>
        
                    <div id="post-content" class="post-content">
        
                        {!! $post->content !!}
                        
                        <div class="post-content__recommend">Test</div>

                    </div>
                    
                    <ul class="list post-tag">
                        @if($post->tags)
                        <li class="list__item">TAGS</li>
                        @foreach($post->tags as $item)
                            <li class="list__item active"><a href="{{ url('tag/'.optional($item->tag)->slug) }}" class="list__link list__link--tag">{{ optional($item->tag)->name }}</a></li>
                        @endforeach
                        @endif
                    </ul>

                </div>
            </div>
        </div>

    </div>

</div>

<div class="related-post">
    <div class="container">
        <div class="row">
            <div class="span-12">
                <div class="section-title section-title--plain">
                    <span class="section-title__label text-uppercase">Related Articles</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedPosts as $post_related)
                <div class="span-12 span-lg-3 hide-mobile">
                    @include('frontend.partials.post-card-related-new', ['post' => $post_related])
                </div>
            @endforeach
            
            <div class="home-below-fold__slider show-mobile">
                <div class="home-promo-slider jsMobileRelatedList">
                    @foreach($relatedPosts as $post_related)
                        @include('frontend.partials.post-card-related-new-mobile', ['post' => $post_related])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="latest-post">

    <div class="container">

        <div class="row">
            <div class="span-12">
                <div class="section-title">
                    <span class="section-title__label section-title__label--lg text-uppercase">Latest</span>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="span-12 span-lg-8">

                <div class="row jsArticleList"></div>

                <div class="row">
                    <div class="span-12 text-center jsMoreArticle">
                        {{-- <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button> --}}
                    </div>
                </div>

            </div>

            <div class="span-12 span-md-4">
                {{-- Shoutbox lazone --}}
                <div class="shoutbox shoutbox--wide shoutbox--has-bg">
    
                    {{-- <img class="shoutbox__background hide-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12.jpg') }} /> --}}
                    <img class="shoutbox__background post-card__img" alt="lazone id" data-src={{ asset('static/images/new-lazone-prize-12-responsive.jpg') }} />
    
                    <div class="shoutbox__content-wrapper">
    
                        <div class="shoutbox__title shoutbox__title--extra-bold">
                            <span>Menangkan Hadiah <br> Menarik Tiap Bulan!</span>
                        </div>
    
                        <div class="shoutbox__text shoutbox__text--extra-space">
                            <p>Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!</p>
                        </div>
    
                        <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                            <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG</strong></a>
                            @guest
                            <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('before-body-end')
<script src="{{ asset('static/js/clipboard.min.js') }}"></script>
<script>
    window.feedUrl = "{{ url('feed') }}"
    var p_id = '{{ $post->id }}';

    var clipboard = new ClipboardJS('#refCopyLink');
    clipboard.on('success', function(e) {
        alert('Copied');
        e.clearSelection();
    })
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="span-12 span-lg-4">
        <div class="post-card post-card--simple post-card--simple__no-padding">
            <div class="post-card__thumbnail">
                <a href="{{ url }}" alt="{{ title }}">
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
        
            </div>    
        </div>
    </div>
</script>
@endverbatim
<script src="{{ asset('static/js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('static/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('static/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('static/js/post.js') }}?v={{ filemtime(public_path() . '/static/js/post.js') }}"></script>
@endsection
