<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,800|Fira+Sans:700|Muli:400,700|Open+Sans:400,600,700|Poppins:700&display=swap"
        rel="stylesheet">

    @yield('meta')

    <script src="{{ asset('static/js/modernizr.js') }}"></script>

    <link rel="stylesheet" href="{{ mix('static/css/main.css') }}">

    @yield('inside-head')
</head>


<body class="site-body {{ $bodyClass ?? '' }}">

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
    <script src="{{ asset('static/js/global.js') }}"></script>

    @yield('before-body-end')

</body>

</html>
