<!DOCTYPE html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('head_title', $siteInfo['site_meta_title']) | {{ $siteInfo['site_name'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="lazone">
    <meta name="description" content="@yield('head_description', $siteInfo['site_meta_description'])">
    <meta name="keywords" content="{{ $siteInfo['site_meta_keyword'] }}">
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ $siteInfo['site_name'] }}" />
    <meta property="og:title" content="@yield('head_title', $siteInfo['site_meta_title']) " />
    <meta property="og:image" content="@yield('head_image', asset('static/images/img_point2.jpg'))" />
    <meta property="og:description" content="@yield('head_description', $siteInfo['site_meta_description'])" />
    <meta property="og:url" content="@yield('head_url', url('/'))" />
    <meta property="fb:app_id" content="{{ $siteInfo['fb_id'] }}"/>
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="650" />
    <meta property="og:image:height" content="366" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,800|Fira+Sans:700|Muli:400,700|Open+Sans:400,600,700|Poppins:700&display=swap" rel="stylesheet">

    @yield('meta')

    <link rel="stylesheet" href="{{ mix('static/css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <script src="{{ asset('static/js/modernizr.js') }}"></script>
    @if($siteInfo['analytics_id'])
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $siteInfo['analytics_id'] }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '{{ $siteInfo['analytics_id'] }}');
    </script>
    @endif

    {!! $siteInfo['headercode'] !!}
    @yield('inside-head')
</head>


<body class="site-body {{ $bodyClass ?? '' }}">
    {!! $siteInfo['bodycode'] !!}
    @include('frontend.layouts.after-body')

    <header class="site-header">
        @include('frontend.layouts.header')
    </header>
    @include('frontend.layouts.mobile-header')

    <div class="site-content {{ isset($contentClass) ? $contentClass : ''  }}">
        @yield('content')
    </div>

    <footer class="site-footer">
        @include('frontend.layouts.footer')
    </footer>

    @yield('after-site-footer')

    <!-- Old browser notifications -->
    <script>
        var $buoop = {required: {e: -4, f: -3, o: -3, s: -1, c: -3}, insecure: true, api: 2018.05};

    function $buo_f() {
        var e = document.createElement("script");
        e.src = "//browser-update.org/update.min.js";
        document.body.appendChild(e);
    };
    try {
        document.addEventListener("DOMContentLoaded", $buo_f, false)
    }
    catch (e) {
        window.attachEvent("onload", $buo_f)
    }
    </script>

    {{--Polyfill--}}
    <script src="{{ asset('static/js/polyfill.min.js') }}"></script>


    <script type="text/javascript">
        objectFitImages();
    svg4everybody({
        validate: function(src){
            return src.replace('sprites.svg#','/') + '.png';
        }
    });

    if (Modernizr.flexbox && Modernizr.flexwrap) {
    } else {
        flexibility(document.documentElement);
    }
    window.siteUrl = "{{ url('/') }}";
    </script>

<script src="{{ asset('static/js/holder.min.js') }}"></script>

    <script src="{{ asset('static/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('static/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('static/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('static/js/jquery.drilldown.min.js') }}"></script>
    <script src="{{ asset('static/js/slick.min.js') }}"></script>
    <script src="{{ asset('static/js/handlebars.min-latest.js') }}"></script>
    <script src="{{ asset('static/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('static/js/jquery.fitvids.js') }}"></script>
    <script src="{{ asset('static/js/infinite-paginator.js') }}"></script>
    <script src="{{ asset('static/js/global.js') }}?v={{ filemtime(public_path() . '/static/js/global.js') }}"></script>

    {!! $siteInfo['footercode'] !!}

    @yield('before-body-end')
    <script type="text/javascript">
        var _c_url = '{{ config('cas.cas_hostname') }}', _c_email = '{{ auth()->check() ? auth()->user()->email : '' }}', _c_auth = '{{ auth()->check() }}'
    </script>
    <script src="{{ asset('static/js/auth.js') }}?v={{ filemtime(public_path() . '/static/js/auth.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#post-content img').each(function () {
                $(this).removeAttr('style')
            });
        });
    </script>
</body>

</html>
