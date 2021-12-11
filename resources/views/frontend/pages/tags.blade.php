@extends('frontend.layouts.skeleton')

@php
$title = "Berita Seputar ".ucwords(str_replace('-', ' ', request()->segment(2)))." Terbaru Hari Ini";
$desc = "Temukan berita terbaru seputar ".ucwords(str_replace('-', ' ', request()->segment(2)))." disini. Dapatkan hadiah menarik setiap bulannya dengan mengumpulkan My Points. GRATIS Hanya di LAzone";
@endphp

@section('meta_title', $title)
@section('meta_description', $desc)

@section('head_title', $title)
@section('head_description', $desc)
@section('head_url', url()->current())

@section('critical-css')
    {{-- <link rel="stylesheet" href="{{ asset('static/css/tag_critical.min.css') }}?v={{ filemtime(public_path() . '/static/css/tag_critical.min.css') }}"> --}}
    <style>
        .post-card--wide:last-child{margin-bottom:3.2rem!important;border-bottom:1px solid #d8d8d8!important}@media (max-width:1023.98px){.post-card--wide:last-child{border-bottom:none!important}}.post-card:last-child{border-bottom:0}.btn{-js-display:inline-flex;display:inline-flex;align-items:center;justify-content:center;padding:.6rem 1.2rem;border-radius:0;text-align:center;text-decoration:none;font-size:1.3rem;font-family:Montserrat,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol}@media (min-width:1024px){.btn{padding:.8rem 1.6rem;font-size:1.6rem}}.btn-crimson{background-color:#ec2427;border:2px solid #ec2427;color:#000}html{font-family:Open Sans,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:62.5%;color:#4a4a4a}.site-content,body{font-size:1.6rem}h1,h2{font-weight:700}h1{font-size:6.7rem}@media (max-width:1024px){.site-content{font-size:calc(.52rem + 1.05469vw)}h1{font-size:calc(1.795rem + 4.79004vw)}}h2{font-size:5rem}a{color:#000}.form{font-size:16px;font-family:Open Sans,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;color:#000}.form ::-webkit-input-placeholder{color:#9b9b9b;font-weight:400}.form :-moz-placeholder,.form ::-moz-placeholder{color:#9b9b9b;font-weight:400}.form :-ms-input-placeholder{color:#9b9b9b;font-weight:400}.form .form-control{font-family:Open Sans,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;padding:6px 0;width:100%;background-color:#fff;border-radius:0;font-size:1.6rem;font-weight:400;outline:0;border:none;border-bottom:2px solid #d8d8d8}.position-relative{position:relative}.position-absolute{position:absolute}html{box-sizing:border-box}body{background-color:#fff}*,:after,:before{box-sizing:inherit}.site-body{-js-display:flex;display:flex;min-height:100vh;flex-direction:column;margin:0;flex:1}.site-content{position:relative;flex:1;width:100%;overflow:hidden;z-index:1}.container{padding-left:2rem;padding-right:2rem;margin:0 auto;max-width:520px;width:100%}@media (min-width:768px){.container{max-width:720px;padding-right:0;padding-left:0}}@media (min-width:1024px){.container{max-width:960px}}@media (min-width:1280px){.container{max-width:1280px}.container-header{max-width:1180px}}.row{-js-display:flex;display:flex;flex-wrap:wrap;margin-right:-1rem;margin-left:-1rem}.off-3{margin-left:25%}.span-6{flex:1 0 50%;max-width:50%;padding:0 1rem;width:100%}.span-12{flex:1 0 100%;max-width:100%;padding:0 1rem;width:100%}.hamburger{padding:15px;display:inline-block;font:inherit;color:inherit;text-transform:none;background-color:transparent;border:0;margin:0;overflow:visible}.hamburger-box{width:30px;height:24px;display:inline-block;position:relative}.hamburger-inner{display:block;top:50%;margin-top:-2px}.hamburger-inner,.hamburger-inner:after,.hamburger-inner:before{width:30px;height:4px;background-color:#fff;border-radius:0;position:absolute}.hamburger-inner:after,.hamburger-inner:before{content:"";display:block}.hamburger-inner:before{top:-10px}.hamburger-inner:after{bottom:-10px}.hamburger--slider .hamburger-inner{top:2px}.hamburger--slider .hamburger-inner:before{top:10px}.hamburger--slider .hamburger-inner:after{top:20px}.hamburger--slider.is-active .hamburger-inner{transform:translate3d(0,10px,0) rotate(45deg)}.hamburger--slider.is-active .hamburger-inner:before{transform:rotate(-45deg) translate3d(-4.2857142857px,-6px,0);opacity:0}.hamburger--slider.is-active .hamburger-inner:after{transform:translate3d(0,-20px,0) rotate(-90deg)}.site-content{padding:11rem 0 4rem!important;font-family:Roboto,sans-serif}@media (min-width:1024px){.site-content{padding:14rem 0 6rem!important}}.horizontal-list{margin-top:4rem}.horizontal-list--margin-top-0{margin-top:0}.category-header{margin-bottom:4rem}a{text-decoration:none;color:#2525bb}.search-input{padding-left:1rem!important;padding-right:3rem!important}@media (max-width:1279.98px){.search-input{border:1px solid #d8d8d8!important}}.search-btn-icon{position:absolute;top:.8rem;right:1.5rem;height:2.4rem;width:2.4rem;padding:0;background-color:transparent;border:0}.search-btn-icon img{max-width:100%;height:auto;width:100%}.floating-game-btn{position:fixed;z-index:9;opacity:0;transform:scale(.6);transform-origin:bottom right;right:10px;bottom:80px}@media (min-width:768px){.floating-game-btn{transform:scale(.8);right:20px;bottom:200px}}@media (min-width:1024px){.floating-game-btn{transform:scale(.9)}}.floating-game-btn .btn-link{display:block;width:145px;position:relative;z-index:2;background:0 0}.floating-game-btn .link-image{display:block;width:100%}.floating-game-btn .btn-close{border:none;background:0 0;position:absolute;top:0;right:0;z-index:3}.floating-game-btn .btn-close:after{display:none}.floating-game-btn .close-btn-image{width:22px;display:block}.site-header{display:none}@media (min-width:1280px){.floating-game-btn{transform:scale(1)}.site-header{display:block;width:100%;height:8rem;position:fixed;z-index:999;background-color:#000;color:#fff}}.site-logo{z-index:3}.site-logo,.site-logo img{height:10rem;width:12.5rem}@media (max-width:767px){.site-logo,.site-logo img{height:60px;width:auto;margin-top:-11px}}.mobile-header{position:fixed;width:100%;z-index:500;background-color:#000}.mobile-header-inner{position:relative;-js-display:flex;display:flex;align-items:center;top:0;left:0;padding:0 10px;height:60px}.mobile-header-inner .btn-login{padding:.8rem .5rem;margin-right:10px}.mobile-header-inner .close-user-menu{right:10px;top:5px}.mobile-header-inner .close-user-menu .hamburger-box{width:20px}.mobile-header-inner .close-user-menu .hamburger-inner,.mobile-header-inner .close-user-menu .hamburger-inner:after,.mobile-header-inner .close-user-menu .hamburger-inner:before{width:18px;height:2px}.mobile-header-inner .close-user-menu.hamburger--slider.is-active .hamburger-box{top:0}.mobile-header-inner .close-user-menu.hamburger--slider.is-active .hamburger-inner:after{transform:translate3d(0,-6px,0) rotate(-90deg)}.mobile-header-inner .close-user-menu .hamburger-inner:after{top:6px}.mobile-header-inner .close-user-menu .hamburger-inner:before{top:12px}.mobile-header-inner .mobile-menu-trigger{position:absolute;top:50%;margin-top:-3rem;right:0;outline:0;padding:20px}.mobile-header-inner .mobile-menu-trigger__left{left:0;right:unset}.mobile-header-inner .mobile-menu-trigger .hamburger-inner,.mobile-header-inner .mobile-menu-trigger .hamburger-inner:after,.mobile-header-inner .mobile-menu-trigger .hamburger-inner:before{width:18px;height:2px}.mobile-header-inner .mobile-menu-trigger .hamburger-inner:after{top:6px}.mobile-header-inner .mobile-menu-trigger .hamburger-inner:before{top:12px}.mobile-header-inner .site-logo{margin-left:5rem;margin-top:2rem}.search-form{display:none;position:fixed;top:80px;left:0;height:4rem;width:100%;z-index:2;background-color:#000}.mobile-nav{position:fixed;top:60px;right:0;height:100vh;max-width:100%!important;width:100%;transform:translateX(100%);z-index:500;overflow:scroll;padding-bottom:3rem;background-color:#000}.mobile-nav__left{left:0;transform:translateX(-100%);top:110px}@media (min-width:1280px){.mobile-header-inner{display:none}.mobile-nav{display:none}}.mobile-nav ul{padding:2rem;margin:0;list-style:none}.mobile-nav li{margin-bottom:2.5rem;padding:0 1.5rem}.mobile-nav li{position:relative}.mobile-nav a{font-family:Roboto,sans-serif;color:#fff}.mobile-nav .menu a{display:block;width:100%}.mobile-nav a{font-size:1.6rem!important;font-weight:400!important;text-transform:unset!important}.mobile-nav .drilldown{overflow:hidden}.hamburger-box{top:3px}.hamburger--slider{position:absolute;right:16px;top:0;z-index:10}.hidden{display:none!important}.user-info{-js-display:flex;display:flex;margin-left:auto;padding:0 10px}.mobile-scrollable-menu{list-style:none;-js-display:flex;display:flex;left:0;top:44px;width:100%;background-color:#000;overflow-x:scroll;z-index:500;border-bottom:1px solid #353535;position:absolute;top:60px;padding:0;margin:0}@media (min-width:768px){.mobile-scrollable-menu{display:none}}.mobile-scrollable-menu li{white-space:nowrap;height:50px;line-height:50px;padding:0 10px}.mobile-scrollable-menu li:first-child{padding-left:20px}.mobile-scrollable-menu li:last-child{padding-right:20px}.mobile-scrollable-menu li a{color:#fff}.search-btn-trigger{-js-display:flex;display:flex;position:absolute;right:11rem}.search-wrapper{width:100%;position:absolute;top:-130%;left:0;padding:20px;background-color:#000;z-index:999}.search-wrapper .search-input{background-color:#000;border:none!important;margin-left:30px;color:#fff}.search-wrapper .search-btn-icon{top:50%;transform:translateY(-50%)}.search-wrapper .close-button,.search-wrapper .close-button:before{width:18px;height:2px;background-color:#fff;border-radius:0;position:absolute;top:50%;transform:translateY(-50%)}.search-wrapper .close-button:before{content:"";top:6px}.accordion{color:#fff;width:100%;border:none;text-align:left;outline:0;font-size:15px}.accordion,.accordion-text{position:relative}.accordion span.chevron:before{content:"";display:inline-block;height:1rem;position:absolute;vertical-align:top;width:1rem;transform:rotate(45deg);margin-top:-.6rem;top:75%;right:-3.5rem;transform:translateY(-50%) rotate(135deg);border-color:#fff;border-style:solid;border-width:2px 2px 0 0}.panel{max-height:0;overflow:hidden}.panel,.panel li{padding:0!important}.panel li{margin-bottom:16px}.panel li:last-child{margin-bottom:0!important}.dropdown-menu{font-family:Roboto,sans-serif;width:89%}.dropdown-menu__link{font-size:16px;color:#fff;text-transform:uppercase;line-height:4}.dropdown-menu__blanket{position:fixed;left:0;top:0;width:100%;height:100%;background:#000;opacity:0;z-index:-1}.dropdown-menu__list{padding:0;margin:0;-js-display:flex;display:flex;justify-content:center;flex-flow:row nowrap;width:90%;position:relative}.dropdown-menu__separator{display:block;border-top:1px solid #353535;padding:0;margin:20px 0;height:1px}.dropdown-menu__item{display:block;position:relative;margin:.75rem 1.2rem;height:6.5rem}.dropdown-menu__item--search{padding-top:.6rem}.dropdown-menu__item--login{right:0;top:1.5rem}@media (min-width:768px){.dropdown-menu__item--login{position:absolute;right:-12rem}}.dropdown-menu__item--has-submenu{position:relative;padding-right:2rem}.dropdown-menu__item--has-submenu:before{border-color:#fff;border-style:solid;border-width:2px 2px 0 0;content:"";display:inline-block;height:10px;position:absolute;vertical-align:top;width:10px;transform:rotate(135deg);right:0;top:50%;margin-top:-8px}.dropdown-menu__dropdown{position:absolute;list-style:none;left:0;right:auto;top:100%;display:none;visibility:hidden;opacity:0;padding:15px 0;width:20rem;z-index:999;box-shadow:0 2px 4px -1px rgba(0,0,0,.3);background-color:#fff;border-top:5px solid #ec2427}.dropdown-menu__dropdown-item{clear:both;width:100%;padding:10px 25px}.dropdown-menu__dropdown-item:last-child{margin-bottom:0}.dropdown-menu__dropdown-link{position:relative;display:inline-block;width:auto;color:#000}.dropdown-menu__dropdown-link span{position:relative;z-index:2}.section-title{-js-display:flex;display:flex;position:relative;flex-flow:row nowrap;align-items:center;padding:0 1rem;margin:2.5rem 0 2rem;width:100%}.section-title:after,.section-title:before{content:"";display:block;width:.4rem;height:2rem;background-color:#ec2427;transform:skew(-35deg);position:absolute;flex:0 0 .4rem}@media (min-width:1024px){.section-title{margin-bottom:3.2rem;margin-top:0}.section-title:after,.section-title:before{height:2.6rem}}.section-title:after{left:1.65rem}.section-title__label{padding:.5rem 2.5rem 0;color:#000;font-family:Roboto,sans-serif;font-weight:700;font-size:24px!important}@media (max-width:1023.98px){.section-title__label{font-size:20px!important;line-height:30px}.post-card--wide .post-card__info .post-card__title{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}}.section-title__label--category{font-size:24px!important}.section-title--plain{padding:0;justify-content:flex-start!important;width:auto}.section-title--plain:after{left:.7rem}.section-title--plain .section-title__label{padding:.5rem 2.5rem 0;font-size:20px!important;line-height:30px}.section-title--page{margin-left:4rem;justify-content:center}.post-card{display:block;margin:0 auto;width:100%;max-width:100%;border-bottom:1px solid #d8d8d8}@media (min-width:1024px){.post-card{max-width:28rem}}.post-card__info{padding:0 1.2rem}@media (min-width:768px){.section-title__label--category{font-size:32px!important}.section-title--plain .section-title__label{font-size:28px!important}.post-card__info{padding:0 1.5rem}.post-card--wide{flex-flow:row nowrap}}.post-card--wide{-js-display:flex;display:flex;max-width:100%}.post-card--wide{padding:1.6rem 0}.post-card--wide .post-card__info,.post-card--wide .post-card__thumbnail{padding:0;width:100%}.post-card--wide .post-card__img{height:auto;width:100%;max-width:90%}.post-card{text-decoration:none}.post-card__meta{font-size:1.4rem}@media (max-width:1024px){h2{font-size:calc(1.37rem + 3.54492vw)}.post-card__meta{font-size:calc(.47rem + .9082vw)}}.post-card__thumbnail{position:relative;margin-bottom:1.4rem}.post-card__img{display:block;-o-object-fit:cover;font-family:"object-fit:cover;object-position:50% 50%";object-fit:cover;-o-object-position:50% 50%;object-position:50% 50%;height:auto}.post-card__img,.post-card__thumbnail{height:auto;width:100%;max-width:100%}@media (min-width:1024px){.post-card__img,.post-card__thumbnail{height:17.1rem}}.post-card__title{font-size:16px;font-family:Roboto,sans-serif;color:#000;line-height:20px;font-weight:700;margin-bottom:.8rem}@media (min-width:768px){.post-card--wide .post-card__img{max-width:100%;height:100%}.post-card--wide .post-card__thumbnail{flex:0 0 16.6rem;margin-right:2rem;margin-bottom:0;height:10rem;width:16.6rem}.post-card__title{margin-bottom:1rem;line-height:24px}}.post-meta{-js-display:flex;display:flex;flex-flow:row nowrap;align-items:center;width:100%}.post-meta__category,.post-meta__stat{font-size:1.2rem;line-height:14px;font-weight:700}@media (min-width:768px){.post-meta__category,.post-meta__stat{font-size:1.4rem;line-height:16px}}.post-meta__category{flex:0 0 auto;position:relative}.post-meta__category span{position:relative;display:inline-block;z-index:2;color:#ec2427;text-transform:uppercase}.post-meta__category:after{content:"\2022";padding:0 8px;color:#9b9b9b;font-size:16px}.post-meta__stat{color:#9b9b9b;flex:0 0 auto;padding:5px 0}.post-meta__stat:after{content:"\2022";padding:0 10px;font-size:16px}.post-meta__stat:last-child:after{content:"";padding:0}.btn-login{color:#fff;font-size:1.6rem;font-weight:700;font-family:Roboto,sans-serif;text-transform:uppercase;letter-spacing:1px}@media (max-width:1023.98px){.btn{font-size:14px;line-height:24px;height:40px;padding:.8rem 4rem}}.btn-link{background-image:url({{ asset("static/images/bg-btn-link.png") }});background-size:1em;background-repeat:no-repeat;background-position:calc(100% - 1.3em) 50%}.d-none{display:none!important}.modal{display:none;position:fixed;top:0;left:0;width:100%;height:100%;z-index:99999}.modal-content{position:absolute;z-index:1;width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;top:50%;left:50%;transform:translate(-50%,-50%)}.modal-content .btn-close{position:absolute;top:0;right:0;background:0 0}.modal-content .btn-close:after{content:none}.modal .backdrop{position:absolute;top:0;width:100%;height:100%;background-color:rgba(0,0,0,.5)}#modalPolling .modal-content{background-color:#eee;width:320px}@media screen and (max-width:375px){#modalPolling .modal-content{width:90%}}#modalPolling .modal-content-header{color:#fff;background:url({{ asset("static/images/poll-modal-bg.jpg") }});background-color:#ec2427;background-repeat:no-repeat;background-size:cover;padding:16px}#modalPolling .modal-content-header span{display:block}#modalPolling .modal-content-header span:first-child{font-size:14px;margin-bottom:15px}#modalPolling .modal-content-header span:nth-child(2){font-weight:700;font-size:18px}#modalPolling .modal-content-header .btn-close{top:3px;right:5px}#modalPolling .modal-content-inner{padding:16px}#modalPolling .modal-content-inner ol{margin:0;padding:0;list-style:none;counter-reset:polling-counter}#modalPolling .modal-content-inner .message-success{display:none;margin-top:16px;font-weight:700;font-size:16px;color:#3d3d3d}
    </style>
@endsection

@section('loader')
@endsection

@section('content')

<div class="container">

    {{-- Judul Kategori --}}
    <div class="row category-header">

        <div class="span-12">

            <div class="section-title section-title--plain section-title--page">
                <h1 class="section-title__label section-title__label--category">Tagged In #{{ request()->segment(2) }}</h1>
            </div>

        </div>

    </div>

</div>

<div id="post-list" class="container">

    <div class="row">

        <div class="span-12">

            <div class="row horizontal-list horizontal-list--margin-top-0">
                <div class="span-12 jsArticleList">
                    @foreach ($posts as $post)
                        <a href="{{ $post->url }}" class="post-card post-card--wide post-card--full">

                            <div class="post-card__thumbnail">
                                <img class="post-card__img" src="{{ $post->thumbnail }}" alt="">
                            </div>

                            <div class="post-card__info">

                                <div class="post-card__meta post-meta">

                                    <div class="post-meta__category"><span>{{ $post->category_name }}</span></div>

                                    <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

                                    <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div>

                                </div>

                                <h2 class="post-card__title">{{ $post->title }}</h2>

                            </div>

                        </a>
                    @endforeach
                </div>
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

            <h2 class="post-card__title">{{ title }}</h2>

        </div>

    </a>
</script>
@endverbatim

<script src="{{ asset('static/js/tags.js') }}"></script>
@endsection
