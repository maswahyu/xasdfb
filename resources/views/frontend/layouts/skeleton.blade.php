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
    <link rel='dns-prefetch' href='https://www.googletagmanager.com'>
    <link href='https://www.google-analytics.com' rel='preconnect' crossorigin>

    @yield('preload-images')

    <link rel="preload" as="image" href="{{ asset('static/images/logo.webp') }}" type="image/webp">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preload" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=optional" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=optional">
    </noscript>

    @yield('critical-css')

    {{-- *********** IMPROVE FCP *********** --}}
    <link rel="preload" href="{{ asset('static/css/main.css') }}?v={{ filemtime(public_path() . '/static/css/main.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
    <link rel="stylesheet" href="{{ asset('static/css/main.css') }}?v={{ filemtime(public_path() . '/static/css/main.css') }}">
    </noscript>
    <link rel="preload" href="{{ asset('static/css/custom.min.css') }}?v={{ filemtime(public_path() . '/static/css/custom.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
    <link rel="stylesheet" href="{{ asset('static/css/custom.min.css') }}?v={{ filemtime(public_path() . '/static/css/custom.min.css') }}">
    </noscript>

    <link rel="preload" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,800|Poppins:700&display=optional" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,800|Poppins:700&display=optional">
    </noscript>

    {{-- load main css via js biar di load belakangan --}}
    {{-- <script>
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
    </script> --}}
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
    @if (request('no_tracking') != 1)
    @if($siteInfo['analytics_id'])
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ $siteInfo['analytics_id'] }}');</script>
    <!-- End Google Tag Manager -->
    @endif
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
    </style>

    @section('loader')
        <style>
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
    @show

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

    <script src="{{ asset('static/js/jquery-3.6.0.min.js') }}"></script>
    {{-- remove Pagespeed warning about passive listener --}}
    <script>
        jQuery.event.special.touchstart = {
            setup: function( _, ns, handle ) {
                this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
            }
        };
        jQuery.event.special.touchmove = {
            setup: function( _, ns, handle ) {
                this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
            }
        };
        jQuery.event.special.wheel = {
            setup: function( _, ns, handle ){
                this.addEventListener("wheel", handle, { passive: true });
            }
        };
        jQuery.event.special.mousewheel = {
            setup: function( _, ns, handle ){
                this.addEventListener("mousewheel", handle, { passive: true });
            }
        };
    </script>
    <script src="{{ asset('static/js/jquery.drilldown.min.js') }}"></script>
    <script src="{{ asset('static/js/jquery.lazy.min.js') }}"></script>
    <script defer src="{{ asset('static/js/slick.min.js') }}"></script>
    <script defer src="{{ asset('static/js/handlebars.min-latest.js') }}"></script>
    <script defer src="{{ asset('static/js/infinite-paginator-min.js') }}?v=1000"></script>
    <script defer src="{{ asset('static/js/global-min.js') }}"></script>
    <script defer src="{{ asset('static/js/btn-game.js') }}"></script>

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
        $(function() {
            $('#post-content img').each(function () {
                $(this).removeAttr('style')
            });

            $(".loader").fadeOut('slow');

            $('.lazy').Lazy();

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

    <div id="modalPolling" class="modal">
        <div class="modal-content">
            <div class="modal-content-header">
                <span><strong>//</strong>&nbsp;&nbsp;LAZONE POLLING</span>
                <span id="polling-title"></span>
                <a href="javascript:void(0);" class="btn-close">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="white"/>
                    </svg>
                </a>
            </div>
            <div class="modal-content-inner">
                <ol id="polling-options">
                </ol>
                <span class="message-success">Terima kasih telah memilih!</span>
            </div>
        </div>
        <div class="backdrop"></div>
    </div>
    <script type="text/javascript">
        var currentPolling = {!! json_encode($current_polling) !!};
        const IS_AUTH = {!! Auth::check() ? 'true' : 'false' !!};
        $ (function() {
            if (currentPolling && (localStorage.getItem("polling_"+currentPolling.id) === null || (IS_AUTH === true && localStorage.getItem("auth_polling_"+currentPolling.id) == null)) ){
                $('#polling-bar').css('display','block');
                $('#polling-bar-mobile').css('display','flex');
                $('.site-content').addClass('poll-active');

                $("#polling-bar .btn, #polling-bar-mobile").on('click', function() {
                    $("#modalPolling").show();
                })

                $("#modalPolling .btn-close, #modalPolling .backdrop").on('click', function() {
                    $("#modalPolling").hide();
                })

                $('#polling-title').text(currentPolling.question);
                $.each(currentPolling.options,function(key,item){
                    $('#polling-options').append('<li data-id="'+item.id+'">'+item.option+'</li>');
                })
                $('#polling-bar').show();
                var send = false;
                $("#modalPolling").on('click','li',function(){
                    $("#modalPolling").off('click','li');
                    var id = $(this).data('id');
                    $(this).addClass('selected');
                    $('#polling-bar, #polling-bar-mobile').hide();
                    $('.site-content').removeClass('poll-active');
                    if(send === false) {

                        $.ajax({
                            url: 'polling',
                            type: 'post',
                            data: {id: id},
                            dataType: 'json',
                            beforeSend: () => {
                                send = true;
                            },
                            success: (res, content, xhr) => {
                                if(xhr.status === 200) {
                                    if(IS_AUTH) {
                                        localStorage.setItem("auth_polling_"+currentPolling.id,'1');
                                    } else {
                                        localStorage.setItem("polling_"+currentPolling.id,'1');
                                    }

                                    $("#modalPolling").off('click', 'li');
                                    $('#modalPolling .message-success').show();
                                }
                                send = false;
                                setTimeout(() => {
                                    $("#modalPolling").hide();
                                }, 3000)
                            }
                        })

                    }
                });
            }
        });
    </script>

    @section('footercode')
        {!! $siteInfo['footercode'] !!}
    @show
</body>

</html>
