@extends('frontend.layouts.skeleton')


@section('meta_title', $post->meta_title ? $post->meta_title : $post->title )
@section('meta_description', $post->meta_description ? strip_tags($post->meta_description) : strip_tags($post->summary))
@section('meta_keyword', $post->meta_keyword ? strip_tags($post->meta_keyword) : '')

@section('head_title', $post->title)
@section('head_description', strip_tags($post->summary))
@section('head_image', imageview(str_replace(' ', '%20', $post->image)))
@section('head_url', $post->url)

{{-- @since 11-02-2021 --}}
@if($post->slug === 'chandra-liow-siap-memberikan-ilmunya-di-lensa-academy-2021-Rrg9A')
    @section('inside-head')
        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2491952821022917');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=2491952821022917&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->
    @endsection
@endif

@section('inside-head')
<style>
    @media screen and (max-width: 768px) {
        .shoutbox {
            margin-top: 3rem;
        }

        .jsMobileMoreArticle {
            padding: 0
        }
        #stickyBannerContainer {
            display: none !important;
        }
    }

    @media screen and (min-width: 768px) {
        .container-title {
            max-width: 800px;
            margin-left: 19%;
        }
        .container-content {
            max-width: 780px;
        }
    }
</style>
@endsection

@section('content')

{{-- Ads Placement --}}
<div class="container">

    <div class="row hide-mobile">

        <div class="span-12">

            <div class="placement placement--top-margin-0">
                <a href="{{ $ads['url'] }}?utm_source=AdsArticle" alt="{{ $ads['url'] }}">
                    <picture>
                        <source media="(min-width: 756px)" srcset="{{ $ads['image'] }}" alt="{{ $ads['url'] }}">
                        <img class="placement__img" src="{{ $ads['image_mobile'] }}" alt="{{ $ads['url'] }}">
                    </picture>
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

    <div class="row" style="margin-top: 1.6rem;">

        <div class="span-12 span-lg-10 off-lg-1 span-xl-7 container-title">

            <ul class="breadcrumb">
                @if($post->category)
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ $post->category->parent_url }}">{{ $post->parent_name }}</a></li>
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
            <ul class="list list--vertical">
                <div>
                    <li class="list__label">Share:</li>
                </div>
                <div class="row flex-justify-center">
                    <li class="list__item list__item--social">
                        <a class="list__link list__link--social jsFbShare" data-share="{{ \App\ShareNewsChannel::SHARE_CHANNEL_FACEBOOK }}"
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
                        <a class="list__link list__link--social jsTwShare" data-share="{{ \App\ShareNewsChannel::SHARE_CHANNEL_TWITTER }}"
                            href="{{ 'https://twitter.com/intent/tweet/' . '?text='. urlencode($post->title) .'&url=' . urlencode(url()->current()) }}">
                            <img src="{{ asset('static/images/tw-so.png') }}" alt="">
                        </a>
                    </li>
                    <li class="list__item list__item--social">
                        <a class="list__link list__link--social" data-share="{{ \App\ShareNewsChannel::SHARE_CHANNEL_WHATSAPP }}"
                            href="{{ 'https://api.whatsapp.com/send?text=' . urlencode($post->title) . ' ' . urlencode(url()->current()) }}">
                            <img src="{{ asset('static/images/wa-share.png') }}" alt="">
                        </a>
                    </li>
                    <li class="list__item list__item--social">
                        <a class="list__link list__link--social" data-share="{{ \App\ShareNewsChannel::SHARE_CHANNEL_LINE }}"
                            href="{{ 'https://social-plugins.line.me/lineit/share?url='.urlencode(url()->current()).'&text=' . urlencode($post->title) }}">
                            <img src="{{ asset('static/images/line-share.png') }}" alt="">
                        </a>
                    </li>
                    <li class="list__item list__item--social">
                        <a data-clipboard-text="{{ url()->current() }}" data-share="{{ \App\ShareNewsChannel::SHARE_CHANNEL_CLIPBOARD }}" id="refCopyLink" class="list__link list__link--social jsCopyLink"
                            >
                            <img src="{{ asset('static/images/link-share.png') }}" alt="">
                        </a>
                    </li>
                </div>
            </ul>

        </div>

        {{-- CONTENT DUMMY --}}
        <div class="span-12 span-lg-10">

            <div class="row no-gutters flex-justify-center">
                {{-- <div class="span-12 span-lg-10">

                    <img class="post-card__img post-card__img-article" src="{{ imageview('') }}" data-src="{{ imageview($post->image) }}" alt="{{ $post->title }}">

                </div> --}}

                <div class="span-12 span-lg-8 container-content">

                    <img class="post-card__img post-card__img-article" src="{{ imageview('') }}" data-src="{{ imageview($post->image) }}" alt="{{ $post->title }}">

                    <p class="post-summary"><strong>LAZONE.ID</strong> - {!! $post->summary !!}</p>

                    <div id="post-content" class="post-content">

                        {!! $post->content !!}

                    </div>

                    <ul class="list post-tag">
                        @if($post->tags)
                        <div>
                            <li class="list__item">TAGS</li>
                        </div>
                        <div class="post-tag__lists">
                            @foreach($post->tags as $item)
                                <li class="list__item active"><a href="{{ url('tag/'.optional($item->tag)->slug) }}" class="list__link list__link--tag">{{ optional($item->tag)->name }}</a></li>
                            @endforeach
                        </div>
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
        </div>
    </div>
    <div class="home-below-fold__slider show-mobile" style="padding: 0;">
        <div class="home-promo-slider jsMobileRelatedList">
            @foreach($relatedPosts as $post_related)
                @include('frontend.partials.post-card-related-new-mobile', ['post' => $post_related])
            @endforeach
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
                    <div class="span-12 text-center jsMoreArticle hide-mobile">
                        {{-- <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button> --}}
                    </div>
                    <div class="span-12 text-center jsMobileMoreArticle show-mobile">
                        {{-- <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button> --}}
                    </div>
                </div>

            </div>

            <div class="span-12 span-md-4">
                {{-- Shoutbox lazone --}}

                    {{-- <img class="shoutbox__background hide-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12.jpg') }} /> --}}
                    @if(isset($ads['banner_type']))
                        {{-- banner Regular --}}
                        @if($ads['banner_type'] == 0)

                            <div class="shoutbox shoutbox--wide">
                                <a href="{{ $ads['banner_post_url'] }}" alt="banner" target="_blank">
                                    <img class="post-card__img" alt="lazone id" data-src="{{ imageview($ads['banner_post_dekstop']) }}" />
                                </a>
                            </div>

                        {{-- Banner Mypoint --}}
                        @else
                            <div class="shoutbox shoutbox--wide shoutbox--has-bg">
                                <img class="shoutbox__background post-card__img" alt="lazone id" data-src="{{ imageview($ads['banner_post_dekstop']) }}" />

                                <div class="shoutbox__content-wrapper">

                                    <div class="shoutbox__title shoutbox__title--extra-bold">
                                        <span>{!! $ads['banner_post_title'] !!}</span>
                                    </div>

                                    <div class="shoutbox__text shoutbox__text--extra-space">
                                        <span>{!! $ads['banner_post_summary'] !!}</span>
                                    </div>

                                    <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                                        <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG</strong></a>
                                        @guest
                                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                                        @endguest
                                    </div>
                                </div>
                            </div>

                        @endif


                    @else
                    {{-- Banner default --}}
                    <div class="shoutbox shoutbox--wide shoutbox--has-bg">
                        <img class="shoutbox__background post-card__img" alt="lazone id" data-src={{ asset('static/images/new-lazone-prize-12-responsive.jpg') }} />

                        <div class="shoutbox__content-wrapper">

                            <div class="shoutbox__title shoutbox__title--extra-bold">
                                <span>Menangkan Hadiah <br> Menarik Tiap Bulan!</span>
                            </div>

                            <div class="shoutbox__text shoutbox__text--extra-space">
                                Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!
                            </div>

                            <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                                <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG</strong></a>
                                @guest
                                <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                                @endguest
                            </div>
                        </div>
                    </div>
                    @endif
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
@if($post->slug === 'chandra-liow-siap-memberikan-ilmunya-di-lensa-academy-2021-Rrg9A')
<script>
    $(function() {
        if(document.getElementById('registLensaAcademy21')) {
            $("#registLensaAcademy21").on('click', function(e) => {
                ga('send', {
                    hitType: 'event',
                    eventCategory: 'Link',
                    eventAction: 'click',
                    eventLabel: 'Lensa Academy'
                });
            })
        }
    });
</script>
@endif
@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="span-12 span-lg-4 hide-mobile">
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
@if($post->slug === 'berhadiah-rp-50-juta-bold-battlegrounds-pubg-mobile-siap-di-SMJGZ')
{{-- POKKT LA BOLD PUBG TRACKING --}}
{{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> --}}
<script type="text/javascript">
  function get(name){
    if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
      return decodeURIComponent(name[1]);
  }

  function logIt(msg){
    if(typeof console !== 'undefined'){
      console.log(msg);
    }
  }

  function fireTracker(url) {
    $.ajax({
      url: url
    });
  }

  var pokktParam = get("pokkt_idfa");
  var appId = get("aid");
  var offerId = get("oid");
  var bundleName = get("bn");

  if(typeof pokktParam !== 'undefined' && pokktParam.trim() !== "")
  {
    var impTracker = "https://us-tracker.pokkt.com/api/VideoEventTracker?birthday=&country=philippines&app_version=&device_model=&categoryIab=&city=manila&app_bundle_name=[BUNDLE_NAME]&latitude=0.0&screen=0&skip=0&language=&device_type=&creative_id=-1&platform=android&device_name=android&eap=2.0&mac_address=&appId=[APP_ID]&exdi=&sdk_version=&adv_id=467&state=national+capital+region&deal_id=&carrier_name=Philippine+Long+Distance+Telephone&brand=Generic&campaign_id=6224&opt_userid=&timestamp=1524814992941&longitude=0.0&device_id=814dc408-3445-4d81-966a-463e5382e257&connection_type=&appName=Hay+Day+Android&ip=119.92.244.146&os_version=&sex=&advertisingID=[IDFA]&partner_param=&vc=0.0&offer_id=[OFFER_ID]&token=2ddca0f3f60656c28a41e0d88f1f9ed6&ad_id=8898&user_id=0&track_id=1af93010-16c2-4ba0-9080-71ff2f91adbc&marketing_name=&channel_id=2394&encodedPubParams=&event=71&r_type=img";

    $(document).ready(function() {
        logIt("adding imp tracker!! "+pokktParam);
        var impTr = impTracker.replace("[IDFA]",pokktParam).replace("[BUNDLE_NAME]",bundleName).replace("[APP_ID]",appId).replace("[OFFER_ID]",offerId);
        logIt("imp tracker!! "+impTr);
        $('body').append("<img height=\"1\" width=\"1\" src='"+impTr+"' style=\"display: none\" />");
    });
  }

  function firePEvent(event_id) {
	  if(typeof pokktParam !== 'undefined' && pokktParam.trim() !== "")
	  {
	    var clkTracker = "https://us-tracker.pokkt.com/api/VideoEventTracker?birthday=&country=philippines&app_version=&device_model=&categoryIab=&city=manila&app_bundle_name=[BUNDLE_NAME]&latitude=0.0&screen=0&skip=0&language=&device_type=&creative_id=-1&platform=android&device_name=android&eap=2.0&mac_address=&appId=[APP_ID]&exdi=&sdk_version=&adv_id=467&state=national+capital+region&deal_id=&carrier_name=Philippine+Long+Distance+Telephone&brand=Generic&campaign_id=6224&opt_userid=&timestamp=1524814992941&longitude=0.0&device_id=814dc408-3445-4d81-966a-463e5382e257&connection_type=&appName=Hay+Day+Android&ip=119.92.244.146&os_version=&sex=&advertisingID=[IDFA]&partner_param=&vc=0.0&offer_id=[OFFER_ID]&token=2ddca0f3f60656c28a41e0d88f1f9ed6&ad_id=8898&user_id=0&track_id=1af93010-16c2-4ba0-9080-71ff2f91adbc&marketing_name=&channel_id=2394&encodedPubParams=&event=[EVENT]";

	      logIt("click on button!! "+pokktParam+" event "+event_id);
	      var clkTr = clkTracker.replace("[IDFA]",pokktParam).replace("[BUNDLE_NAME]",bundleName).replace("[APP_ID]",appId).replace("[OFFER_ID]",offerId).replace("[EVENT]",event_id);
	      logIt("clkTracker!! "+clkTr);
	      fireTracker(clkTr);
	  }
  }
</script>
<script>
    $(function() {
        if(document.getElementById('regist')) {
            $("#regist").on('click', function(e) => {
                e.preventDefault();
                var href = $(e.currentTarget);
                firePEvent(72);
                window.open(href.attr('href'));
            })
        }
    });
</script>
{{-- END POKKT LA BOLD PUBG TRACKING --}}
@endif
<script src="{{ asset('static/js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('static/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('static/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('static/js/post.js') }}?v={{ filemtime(public_path() . '/static/js/post.js') }}"></script>
@endsection
