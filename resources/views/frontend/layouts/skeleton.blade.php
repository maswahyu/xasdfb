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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,800|Fira+Sans:700|Muli:400,700|Open+Sans:400,600,700|Poppins:700&display=swap" rel="stylesheet">
    <link rel="canonical" href="@yield('head_url', url('/'))" />
    @yield('meta')
    <link rel="stylesheet" href="{{ asset('static/css/main.css') }}?v={{ filemtime(public_path() . '/static/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/custom.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
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

    <script type="text/javascript">
    window.siteUrl = "{{ url('/') }}";
    </script>

    <script src="{{ asset('static/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('static/js/jquery.drilldown.min.js') }}"></script>
    <script src="{{ asset('static/js/slick.min.js') }}"></script>
    <script src="{{ asset('static/js/handlebars.min-latest.js') }}"></script>
    <script src="{{ asset('static/js/infinite-paginator-min.js') }}"></script>
    <script src="{{ asset('static/js/global-min.js') }}"></script>
    <script src="{{ asset('static/js/jquery.lazy.min.js') }}"></script>

    {!! $siteInfo['footercode'] !!}

    @yield('before-body-end')
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#post-content img').each(function () {
                $(this).removeAttr('style')
            });
        });

        $(function() {
            $('.post-card__img').Lazy({
                effect: 'fadeIn',
                visibleOnly: true
            });
        });
    </script>
</body>

</html>
