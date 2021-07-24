<!DOCTYPE html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('meta_title', $siteInfo['site_meta_title']) | {{ $siteInfo['site_name'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="lazone">
    <meta name="description" content="@yield('meta_description', $siteInfo['site_meta_description'])">
    <meta name="keywords" content="@yield('meta_keyword', $siteInfo['site_meta_keyword'])">
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ $siteInfo['site_name'] }}" />
    <meta property="og:title" content="@yield('head_title', $siteInfo['site_meta_title'])" />
    <meta property="og:image" content="@yield('head_image', asset('static/images/img_point2.jpg'))" />
    <meta property="og:description" content="@yield('head_description', $siteInfo['site_meta_description'])" />
    <meta property="og:url" content="@yield('head_url', url('/'))" />
    <meta property="fb:app_id" content="{{ $siteInfo['fb_id'] }}"/>
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="650" />
    <meta property="og:image:height" content="366" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="canonical" href="@yield('head_url', url('/'))" />
    @yield('meta')
    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,800|Fira+Sans:700|Muli:400,700|Open+Sans:400,600,700|Poppins:700&display=swap" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('static/css/main.css') }}?v={{ filemtime(public_path() . '/static/css/main.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('static/css/custom.min.css') }}"> --}}
    {{-- *********** IMPROVE FCP *********** --}}
    {{-- load main css via js biar di load belakangan --}}
    <script>
    var head = document.getElementsByTagName('HEAD')[0];
    var mainCss = document.createElement('link');
    var customCss = document.createElement('link');
    var googleFont = document.createElement('link');
    mainCss.rel = 'stylesheet';
    mainCss.type = 'text/css';
    mainCss.href = '{{ asset('static/css/main.css') }}?v={{ filemtime(public_path() . '/static/css/main.css') }}';
    customCss.rel = 'stylesheet';
    customCss.type = 'text/css';
    customCss.href = '{{ asset('static/css/custom.min.css') }}';
    googleFont.rel = 'stylesheet';
    googleFont.type = 'text/css';
    googleFont.href = 'https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,800|Fira+Sans:700|Muli:400,700|Open+Sans:400,600,700|Poppins:700&display=swap';
    head.appendChild(mainCss);
    head.appendChild(customCss);
    head.appendChild(googleFont);
    </script>
    <style>
        .site-body {
            -js-display: flex;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            margin: 0;
            flex: 1;
        }
        @media (min-width: 1280px) {
            .site-header {
                display: block !important;
                width: 100%;
                height: 8rem;
                position: fixed;
                z-index: 999;
                background-color: #000;
                color: #fff;
            }
        }
        .site-header {
            display: none;
        }
        @media (min-width: 1280px) {
            .mobile-header {
                display: none !important;
            }
        }
        .mobile-header {
            position: fixed;
            -js-display: flex;
            display: flex;
            align-items: center;
            top: 0;
            left: 0;
            padding: 0 10px;
            height: 60px;
            width: 100%;
            background-color: #000;
            z-index: 500;
            transition: top .15s ease;
        }
    </style>
    {{-- end fcp improvement --}}
    @yield('page-style')
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <style>
        .sticky {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
        }
    </style>
    @if($siteInfo['analytics_id'])
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ $siteInfo['analytics_id'] }}');</script>
    <!-- End Google Tag Manager -->
    @endif
    {!! $siteInfo['headercode'] !!}
    <style>
        .stickyBanner-flex {
            display: flex;
            justify-content: center;
        }
        #stickyBannerContainer #stickyBanner > div {
            margin: 0 auto;
            position: relative;
        }
        #stickyBannerContainer #stickyBanner.placement img {
            width: 100%;
        }
        #stickyBanner {
            position: relative;
        }
        .btn-close {
            color: #ee3b3e;
            position: absolute;
            font-weight: bold;
            top: 0;
            right: 0px;
            padding: 5px;
            background: #fff;
            cursor: pointer;
        }
        .btn-close::after {
            font-size: 2.5rem;
            content: 'x';
            position: relative;
            line-height: 0;
        }
        @media (min-width: 1024px) {
            #stickyBanner .show-mobile {
                display: none !important;
            }
            #stickyBanner .hide-mobile {
                display: block !important;
            }
            .site-content.pt-0 {
                padding-top: 0px;
            }
            #stickyBannerContainer .sticky #stickyBanner.placement {
                margin: 10px 0;
            }
            .footer-sticky-banner #stickyBanner.placement {
                margin-top: 2rem;
                margin-bottom: 0;
            }

        }
        @media (max-width: 1024px) {
            #stickyBanner .show-mobile {
                display: block !important;
            }
            #stickyBanner .hide-mobile {
                display: none !important;
            }
            #stickyBanner.placement {
                margin-top: 0;
                margin-bottom: 2rem;
            }
            .footer-sticky-banner #stickyBanner.placement {
                margin-top: 2rem;
                margin-bottom: 0;
            }

            .btn-close {
                color: #ee3b3e;
                position: absolute;
                font-weight: bold;
                top: 2px;
                right: 2px;
                padding: 5px;
                background: #fff;
            }
            .btn-close::after {
                font-size: 1.5rem;
                content: 'x';
                position: relative;
            }
        }

        .nav-up {
            top: -100px;
        }
        .nav-up-mobile {
            top: -110px;
        }

        #shoutbox.is-affixed .nav-on {
            top: 120px !important;
        }
        #shoutbox.is-affixed .nav-off {
            top: 40px !important;
        }

        @media (max-width: 768px) {
            #stickyBannerContainer,.footer-sticky-banner {
                display: none
            }
        }
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: rgb(249,249,249);
        }
    </style>
    @yield('inside-head')
</head>


<body class="site-body {{ $bodyClass ?? '' }}">
    <div class="loader"></div>
    @if($siteInfo['analytics_id'])
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $siteInfo['analytics_id'] }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif
    {!! $siteInfo['bodycode'] !!}
    @include('frontend.layouts.after-body')

    <header class="site-header nav-down">
        @include('frontend.layouts.header')
    </header>
    @include('frontend.layouts.mobile-header')

    @yield('vue-app')

    <div class="site-content {{ isset($contentClass) ? $contentClass : ''  }}">
        @yield('content')
        @if(Route::currentRouteName() != 'index')
        @php
        $stickyBanner = App\StickyBanner::where([
            ['status', '=', 1],
            ['pub_day', '=', Carbon\Carbon::now()->dayOfWeekIso],
            ['page', '=', App\StickyBanner::PAGE_ARTICLE]
        ])->first();
        @endphp
            @if(isset($stickyBanner) && $stickyBanner)
                <div id="stickyBannerContainer">
                @if($stickyBanner->periode_start && (Carbon\Carbon::now()->between(Carbon\Carbon::createFromFormat('Y-m-d', $stickyBanner->periode_start), Carbon\Carbon::createFromFormat('Y-m-d', $stickyBanner->periode_end))) )
                    @include('frontend.partials.sticky-banner', ['fixed' => true])
                @elseif(!$stickyBanner->periode_start)
                    @include('frontend.partials.sticky-banner', ['fixed' => true])
                @endif
                </div>
            @endif
        @endif
        {{-- sticky Banner --}}
        @if(isset($stickyBanner) && $stickyBanner)
        <div class="footer-sticky-banner"></div>
        @endif
    </div>

    <footer class="site-footer pt-4">
        @include('frontend.layouts.footer')
    </footer>

    @yield('after-site-footer')

    <script type="text/javascript">
    window.siteUrl = "{{ url('/') }}";
    </script>

    <script src="{{ asset('static/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('static/js/jquery.drilldown.min.js') }}"></script>
    <script defer src="{{ asset('static/js/slick.min.js') }}"></script>
    <script src="{{ asset('static/js/handlebars.min-latest.js') }}"></script>
    <script src="{{ asset('static/js/infinite-paginator-min.js') }}?v=999"></script>
    <script src="{{ asset('static/js/global-min.js') }}"></script>
    <script src="{{ asset('static/js/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('static/js/btn-game.js') }}"></script>

    {!! $siteInfo['footercode'] !!}

    @yield('before-body-end')
    <script>
        const stickyBanner = document.getElementsByClassName("stickyBanner");
        if(typeof stickyBanner[0] !== typeof undefined) {
            $(".site-content").addClass('sticky-banner');

            window.onscroll = function() {myFunction()};

            const sticky = $(".stickyBanner").offset().top > 0 ? $(".stickyBanner").offset().top : $("#bannerWifi").offset().top;
            const webFooter = $(".site-footer").offset().top;
            const footerHeight = $(".site-footer").innerHeight();

            if( ! stickyBanner[0].classList.contains('fixed')) {
                $(".site-content").addClass('pt-0');
            }

            function myFunction() {
                var top_of_element = $(".footer-sticky-banner").offset().top;
                var bottom_of_element = $(".footer-sticky-banner").offset().top + $(".footer-sticky-banner").outerHeight();
                var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
                var top_of_screen = $(window).scrollTop();
                if((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
                    $(".stickyBanner").removeClass('sticky').appendTo(".footer-sticky-banner");
                    $(".stickyBanner").find('.btn-close').show();
                } else if( window.pageYOffset >= sticky) {
                    if($("#bannerWifi").length > 0) {
                        $(".stickyBanner").addClass("sticky").css({
                            'display': 'block'
                        });
                    } else {
                        if($(".footer-sticky-banner .stickyBanner").length == 0) {
                            $(".stickyBanner").addClass("sticky");
                        } else {
                            $(".stickyBanner").addClass("sticky").prependTo("#stickyBannerContainer");
                        }
                        $(".stickyBanner").find(".btn-close").show();
                    }
                } else {
                    if($(".footer-sticky-banner .stickyBanner").length == 0) {
                        if($("#bannerWifi").length > 0) {
                            $(".stickyBanner").removeClass("sticky").css({
                                'display':'none'
                            });
                        } else {
                            if(! stickyBanner[0].classList.contains('fixed')) {
                                $(".stickyBanner").removeClass("sticky");
                            }
                        }
                    } else {
                        if($("#bannerWifi").length > 0) {
                            $(".stickyBanner").removeClass("sticky").css({
                                'display': 'none'
                            }).prependTo(".site-content.sticky-banner");
                        } else {
                            $(".stickyBanner").removeClass("sticky").prependTo("#stickyBannerContainer");
                        }
                    }
                    if(! stickyBanner[0].classList.contains('fixed')) {
                        $(".stickyBanner").find(".btn-close").hide();
                    }

                }
            }

            $("#stickyBanner .btn-close").click(function(){
                $("#stickyBanner").parent().hide();
                $(".site-content").removeClass('pt-0');
            });
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#post-content img').each(function () {
                $(this).removeAttr('style')
            });
        });

        $(function() {

            $(".loader").fadeOut('slow');

            $('.post-card__img').Lazy({
                effect: 'fadeIn',
                visibleOnly: true
            });

            $('.home-trending').Lazy({
                effect: 'fadeIn',
                visibleOnly: true
            });
        });

        /* Sticky header */
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('header').outerHeight();
        var navbarMobileHeight = $('.mobile-header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();

            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight || st > lastScrollTop && st > navbarMobileHeight){
                // Scroll Down
                $('header').removeClass('nav-down').addClass('nav-up');
                $('.mobile-header').removeClass('nav-down-mobile').addClass('nav-up-mobile');
                $('.inner-wrapper-sticky__shoutbox').removeClass('nav-on');
                $('.inner-wrapper-sticky__shoutbox').addClass('nav-off');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('header').removeClass('nav-up').addClass('nav-down');
                    $('.mobile-header').removeClass('nav-up-mobile').addClass('nav-down-mobile');
                    $('.inner-wrapper-sticky__shoutbox').removeClass('nav-off');
                    $('.inner-wrapper-sticky__shoutbox').addClass('nav-on');
                }
            }

            lastScrollTop = st;
        }
    </script>
    <script type="text/javascript">
        var _c_url = '{{ config('cas.cas_hostname') }}', _c_email = '{{ auth()->check() ? auth()->user()->email : '' }}', _c_auth = '{{ auth()->check() }}', _c_sso_id = '{{ auth()->check() ? auth()->user()->sso_id : '' }}'
    </script>
    <script src="{{ asset('static/js/auth.js') }}?v={{ filemtime(public_path() . '/static/js/auth.js') }}"></script>
</body>

</html>
