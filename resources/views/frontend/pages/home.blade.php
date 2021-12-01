@extends('frontend.layouts.skeleton')

@section('preload-images')
    {{-- @if (!empty($posts_highlight) && !empty($posts_highlight->image))
        <link rel="preload" as="image" href="{{ asset($posts_highlight->image) }}" />
    @endif --}}
    @if (!empty($posts_highlight) && !empty($posts_highlight->thumbnail))
        <link rel="preload" as="image" href="{{ asset($posts_highlight->thumbnail) }}" />
    @endif
@endsection

@section('critical-css')
    {{-- <link rel="stylesheet" href="{{ asset('static/css/index_critical.min.css') }}?v={{ filemtime(public_path() . '/static/css/index_critical.min.css') }}"> --}}
    <style>.btn{-js-display:inline-flex;display:inline-flex;align-items:center;justify-content:center;padding:.6rem 1.2rem;border-radius:0;text-align:center;text-decoration:none;font-size:1.3rem;font-family:Montserrat,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol}@media (min-width:1024px){.btn{padding:.8rem 1.6rem;font-size:1.6rem}}.btn-crimson{background-color:#ec2427;border:2px solid #ec2427;color:#000}.btn-ghost-crimson{background-color:transparent;border:2px solid #ec2427;border-radius:0;color:#ec2427}html{font-family:Open Sans,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:62.5%;color:#4a4a4a}.site-content,body{font-size:1.6rem}@media (max-width:1024px){.site-content{font-size:calc(.52rem + 1.05469vw)}}a{color:#000}.text-white{color:#fff!important}.form{font-size:16px;font-family:Open Sans,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;color:#000}.form ::-webkit-input-placeholder{color:#9b9b9b;font-weight:400}.form :-moz-placeholder,.form ::-moz-placeholder{color:#9b9b9b;font-weight:400}.form :-ms-input-placeholder{color:#9b9b9b;font-weight:400}.form .form-control{font-family:Open Sans,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;padding:6px 0;width:100%;background-color:#fff;border-radius:0;font-size:1.6rem;font-weight:400;outline:0;border:none;border-bottom:2px solid #d8d8d8}.position-relative{position:relative}.position-absolute{position:absolute}html{box-sizing:border-box}body{background-color:#fff}*,:after,:before{box-sizing:inherit}.site-body{-js-display:flex;display:flex;min-height:100vh;flex-direction:column;margin:0;flex:1}.site-content{position:relative;flex:1;width:100%;overflow:hidden;z-index:1}.container{padding-left:2rem;padding-right:2rem;margin:0 auto;max-width:520px;width:100%}@media (min-width:768px){.container{max-width:720px;padding-right:0;padding-left:0}}@media (min-width:1024px){.container{max-width:960px}}@media (min-width:1280px){.container{max-width:1280px}.container-header{max-width:1180px}.container-home{max-width:1280px}}.row{-js-display:flex;display:flex;flex-wrap:wrap;margin-right:-1rem;margin-left:-1rem}.off-3{margin-left:25%}.span-6{flex:1 0 50%;max-width:50%;padding:0 1rem;width:100%}.span-12{flex:1 0 100%;max-width:100%;padding:0 1rem;width:100%}@media (min-width:768px){.span-md-4{padding:0 1rem;width:100%}.span-md-4{flex:1 0 33.33%;max-width:33.33%}.span-md-6{padding:0 1rem;width:100%}.span-md-6{flex:1 0 50%;max-width:50%}.span-md-8{padding:0 1rem;width:100%}.span-md-8{flex:1 0 66.66%;max-width:66.66%}}.hamburger{padding:15px;display:inline-block;font:inherit;color:inherit;text-transform:none;background-color:transparent;border:0;margin:0;overflow:visible}.hamburger-box{width:30px;height:24px;display:inline-block;position:relative}.hamburger-inner{display:block;top:50%;margin-top:-2px}.hamburger-inner,.hamburger-inner:after,.hamburger-inner:before{width:30px;height:4px;background-color:#fff;border-radius:0;position:absolute}.hamburger-inner:after,.hamburger-inner:before{content:"";display:block}.hamburger-inner:before{top:-10px}.hamburger-inner:after{bottom:-10px}.hamburger--slider .hamburger-inner{top:2px}.hamburger--slider .hamburger-inner:before{top:10px}.hamburger--slider .hamburger-inner:after{top:20px}.hamburger--slider.is-active .hamburger-inner{transform:translate3d(0,10px,0) rotate(45deg)}.hamburger--slider.is-active .hamburger-inner:before{transform:rotate(-45deg) translate3d(-4.2857142857px,-6px,0);opacity:0}.hamburger--slider.is-active .hamburger-inner:after{transform:translate3d(0,-20px,0) rotate(-90deg)}.site-content{padding:11rem 0 4rem!important;font-family:Roboto,sans-serif}@media (min-width:1024px){.site-content{padding:14rem 0 6rem!important}}.home-grid{-js-display:flex;display:flex;flex-direction:row;margin:0;flex-wrap:wrap;align-items:stretch}.home-grid__must-reads{-js-display:flex;display:flex;flex-flow:row wrap;align-content:baseline;flex:1 0 100%;max-width:100%;padding:0 1rem;width:100%}@media (max-width:1023.98px){.home-grid__must-reads{padding:0}}.home-grid__must-reads-highlights{width:100%}@media (min-width:1024px){.home-grid__must-reads-highlights{width:646px;flex:0 0 646px}}.home-grid__must-reads-list{-js-display:flex;display:flex;flex-flow:row wrap;justify-content:center;width:100%}@media (min-width:1024px){.home-grid__must-reads-list{width:602px;flex:0 0 602px}}.home-below-fold__slider{flex:1 0 100%;max-width:100%;padding:0 1rem;width:100%}@media (max-width:1023.98px){.home-below-fold__slider{padding:0}p{font-size:18px}}.home-trending{padding-top:.5rem;padding-bottom:4rem;background-color:#f5f5f6}@media (min-width:1024px){.home-trending{padding-top:4rem}}.order-1{order:1}.order-2{order:2}a{text-decoration:none;color:#2525bb}p{line-height:1.625}.semibold{font-weight:600!important}.search-input{padding-left:1rem!important;padding-right:3rem!important}@media (max-width:1279.98px){.search-input{border:1px solid #d8d8d8!important}}.search-btn-icon{position:absolute;top:.8rem;right:1.5rem;height:2.4rem;width:2.4rem;padding:0;background-color:transparent;border:0}.search-btn-icon img{max-width:100%;height:auto;width:100%}.home-promo-slider{width:100%}.floating-game-btn{position:fixed;z-index:9;opacity:0;transform:scale(.6);transform-origin:bottom right;right:10px;bottom:80px}@media (min-width:768px){.order-md-1{order:1}.order-md-2{order:2}.floating-game-btn{transform:scale(.8);right:20px;bottom:200px}}@media (min-width:1024px){.floating-game-btn{transform:scale(.9)}}.floating-game-btn .btn-link{display:block;width:145px;position:relative;z-index:2;background:0 0}.floating-game-btn .link-image{display:block;width:100%}.floating-game-btn .btn-close{border:none;background:0 0;position:absolute;top:0;right:0;z-index:3}.floating-game-btn .btn-close:after{display:none}.floating-game-btn .close-btn-image{width:22px;display:block}.site-header{display:none}@media (min-width:1280px){.floating-game-btn{transform:scale(1)}.site-header{display:block;width:100%;height:8rem;position:fixed;z-index:999;background-color:#000;color:#fff}}.site-logo{z-index:3}.site-logo,.site-logo img{height:10rem;width:12.5rem}@media (max-width:767px){.site-logo,.site-logo img{height:60px;width:auto;margin-top:-11px}}.mobile-header{position:fixed;width:100%;z-index:500;background-color:#000}.mobile-header-inner{position:relative;-js-display:flex;display:flex;align-items:center;top:0;left:0;padding:0 10px;height:60px}.mobile-header-inner .btn-login{padding:.8rem .5rem;margin-right:10px}.mobile-header-inner .close-user-menu{right:10px;top:5px}.mobile-header-inner .close-user-menu .hamburger-box{width:20px}.mobile-header-inner .close-user-menu .hamburger-inner,.mobile-header-inner .close-user-menu .hamburger-inner:after,.mobile-header-inner .close-user-menu .hamburger-inner:before{width:18px;height:2px}.mobile-header-inner .close-user-menu.hamburger--slider.is-active .hamburger-box{top:0}.mobile-header-inner .close-user-menu.hamburger--slider.is-active .hamburger-inner:after{transform:translate3d(0,-6px,0) rotate(-90deg)}.mobile-header-inner .close-user-menu .hamburger-inner:after{top:6px}.mobile-header-inner .close-user-menu .hamburger-inner:before{top:12px}.mobile-header-inner .mobile-menu-trigger{position:absolute;top:50%;margin-top:-3rem;right:0;outline:0;padding:20px}.mobile-header-inner .mobile-menu-trigger__left{left:0;right:unset}.mobile-header-inner .mobile-menu-trigger .hamburger-inner,.mobile-header-inner .mobile-menu-trigger .hamburger-inner:after,.mobile-header-inner .mobile-menu-trigger .hamburger-inner:before{width:18px;height:2px}.mobile-header-inner .mobile-menu-trigger .hamburger-inner:after{top:6px}.mobile-header-inner .mobile-menu-trigger .hamburger-inner:before{top:12px}.mobile-header-inner .site-logo{margin-left:5rem;margin-top:2rem}.search-form{display:none;position:fixed;top:80px;left:0;height:4rem;width:100%;z-index:2;background-color:#000}.mobile-nav{position:fixed;top:60px;right:0;height:100vh;max-width:100%!important;width:100%;transform:translateX(100%);z-index:500;overflow:scroll;padding-bottom:3rem;background-color:#000}.mobile-nav__left{left:0;transform:translateX(-100%);top:110px}@media (min-width:1280px){.mobile-header-inner{display:none}.mobile-nav{display:none}}.mobile-nav ul{padding:2rem;margin:0;list-style:none}.mobile-nav li{margin-bottom:2.5rem;padding:0 1.5rem}.mobile-nav li{position:relative}.mobile-nav a{font-family:Roboto,sans-serif;color:#fff}.mobile-nav .menu a{display:block;width:100%}.mobile-nav a{font-size:1.6rem!important;font-weight:400!important;text-transform:unset!important}.mobile-nav .drilldown{overflow:hidden}.hamburger-box{top:3px}.hamburger--slider{position:absolute;right:16px;top:0;z-index:10}.hidden{display:none!important}.user-info{-js-display:flex;display:flex;margin-left:auto;padding:0 10px}.mobile-scrollable-menu{list-style:none;-js-display:flex;display:flex;left:0;top:44px;width:100%;background-color:#000;overflow-x:scroll;z-index:500;border-bottom:1px solid #353535;position:absolute;top:60px;padding:0;margin:0}@media (min-width:768px){.mobile-scrollable-menu{display:none}}.mobile-scrollable-menu li{white-space:nowrap;height:50px;line-height:50px;padding:0 10px}.mobile-scrollable-menu li:first-child{padding-left:20px}.mobile-scrollable-menu li:last-child{padding-right:20px}.mobile-scrollable-menu li a{color:#fff}.search-btn-trigger{-js-display:flex;display:flex;position:absolute;right:11rem}.search-wrapper{width:100%;position:absolute;top:-130%;left:0;padding:20px;background-color:#000;z-index:999}.search-wrapper .search-input{background-color:#000;border:none!important;margin-left:30px;color:#fff}.search-wrapper .search-btn-icon{top:50%;transform:translateY(-50%)}.search-wrapper .close-button,.search-wrapper .close-button:before{width:18px;height:2px;background-color:#fff;border-radius:0;position:absolute;top:50%;transform:translateY(-50%)}.search-wrapper .close-button:before{content:"";top:6px}.accordion{color:#fff;width:100%;border:none;text-align:left;outline:0;font-size:15px}.accordion,.accordion-text{position:relative}.accordion span.chevron:before{content:"";display:inline-block;height:1rem;position:absolute;vertical-align:top;width:1rem;transform:rotate(45deg);margin-top:-.6rem;top:75%;right:-3.5rem;transform:translateY(-50%) rotate(135deg);border-color:#fff;border-style:solid;border-width:2px 2px 0 0}.panel{max-height:0;overflow:hidden}.panel,.panel li{padding:0!important}.panel li{margin-bottom:16px}.panel li:last-child{margin-bottom:0!important}.dropdown-menu{font-family:Roboto,sans-serif;width:89%}.dropdown-menu__link{font-size:16px;color:#fff;text-transform:uppercase;line-height:4}.dropdown-menu__blanket{position:fixed;left:0;top:0;width:100%;height:100%;background:#000;opacity:0;z-index:-1}.dropdown-menu__list{padding:0;margin:0;-js-display:flex;display:flex;justify-content:center;flex-flow:row nowrap;width:90%;position:relative}.dropdown-menu__separator{display:block;border-top:1px solid #353535;padding:0;margin:20px 0;height:1px}.dropdown-menu__item{display:block;position:relative;margin:.75rem 1.2rem;height:6.5rem}.dropdown-menu__item--search{padding-top:.6rem}.dropdown-menu__item--login{right:0;top:1.5rem}@media (min-width:768px){.dropdown-menu__item--login{position:absolute;right:-12rem}}.dropdown-menu__item--has-submenu{position:relative;padding-right:2rem}.dropdown-menu__item--has-submenu:before{border-color:#fff;border-style:solid;border-width:2px 2px 0 0;content:"";display:inline-block;height:10px;position:absolute;vertical-align:top;width:10px;transform:rotate(135deg);right:0;top:50%;margin-top:-8px}.dropdown-menu__dropdown{position:absolute;list-style:none;left:0;right:auto;top:100%;display:none;visibility:hidden;opacity:0;padding:15px 0;width:20rem;z-index:999;box-shadow:0 2px 4px -1px rgba(0,0,0,.3);background-color:#fff;border-top:5px solid #ec2427}.dropdown-menu__dropdown-item{clear:both;width:100%;padding:10px 25px}.dropdown-menu__dropdown-item:last-child{margin-bottom:0}.dropdown-menu__dropdown-link{position:relative;display:inline-block;width:auto;color:#000}.dropdown-menu__dropdown-link span{position:relative;z-index:2}.section-title{-js-display:flex;display:flex;position:relative;flex-flow:row nowrap;align-items:center;padding:0 1rem;margin:2.5rem 0 2rem;width:100%}.section-title:after,.section-title:before{content:"";display:block;width:.4rem;height:2rem;background-color:#ec2427;transform:skew(-35deg);position:absolute;flex:0 0 .4rem}@media (min-width:1024px){.section-title{margin-bottom:3.2rem;margin-top:0}.section-title:after,.section-title:before{height:2.6rem}}.section-title:after{left:1.65rem}.section-title__label{padding:.5rem 2.5rem 0;color:#000;font-family:Roboto,sans-serif;font-weight:700;font-size:24px!important}@media (max-width:1023.98px){.section-title__label{font-size:20px!important;line-height:30px}}.section-title__label--lg{font-size:2rem!important;line-height:30px}.post-card{display:block;margin:0 auto;width:100%;max-width:100%;border-bottom:1px solid #d8d8d8}@media (min-width:1024px){.post-card{max-width:28rem}.post-card--highlight{text-align:left}.post-card--highlight,.post-card--highlight .post-card__thumbnail,.post-card--highlight .post-card__title{margin-bottom:2rem}}.post-card__info{padding:0 1.2rem}@media (min-width:768px){.section-title__label--lg{font-size:28px!important}.post-card__info{padding:0 1.5rem}}.post-card--simple{padding-bottom:2rem!important;background-color:#fff}.post-card--simple .post-card__meta,.post-card--simple .post-card__title{padding:0 1rem}.post-card--simple__no-padding .post-card__title{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}@supports (-webkit-touch-callout:none){.post-card--simple__no-padding .post-card__title{max-height:48px;overflow:hidden;white-space:normal;text-overflow:ellipsis}}@media (max-width:1023.98px){.post-card--simple:not(.post-card--simple__max-height){-js-display:flex;display:flex;align-items:center;background-color:transparent;padding:1rem 0!important}.post-card--simple:not(.post-card--simple__max-height) .post-card__thumbnail{max-width:111px;height:66px;margin-bottom:0}.post-card--simple:not(.post-card--simple__max-height) .post-card__thumbnail a img{width:100%;height:100%}.post-card--simple:not(.post-card--simple__max-height) .post-card__meta,.post-card--simple:not(.post-card--simple__max-height) .post-card__title{padding:0}.post-card--simple:not(.post-card--simple__max-height) .post-card__title{color:#000}.post-card--simple:not(.post-card--simple__max-height) .post-meta__category span{color:#ec2427}.post-card--simple__no-padding .post-card__title{font-size:16px;line-height:20px}}@media screen and (min-width:1440px){.post-card--simple__no-padding{max-width:unset}}.post-card--highlight{padding-bottom:0;max-width:100%}.post-card{text-decoration:none}.post-card:last-child{border-bottom:0}.post-card__meta{font-size:1.4rem}@media (max-width:1024px){.post-card__meta{font-size:calc(.47rem + .9082vw)}}.post-card__thumbnail{position:relative;margin-bottom:1.4rem}.post-card__img{display:block;-o-object-fit:cover;font-family:"object-fit:cover;object-position:50% 50%";object-fit:cover;-o-object-position:50% 50%;object-position:50% 50%;height:auto}.post-card__img,.post-card__thumbnail{height:auto;width:100%;max-width:100%}@media screen and (min-width:1024px) and (min-width:1600px){.post-card__img--large,.post-card__thumbnail--large{width:100%}}.post-card__title{font-size:16px;font-family:Roboto,sans-serif;color:#000;line-height:20px;font-weight:700;margin-bottom:.8rem}@media (min-width:768px){.post-card--simple__no-padding .post-card__info,.post-card--simple__no-padding .post-card__meta,.post-card--simple__no-padding .post-card__title{padding:0}.post-card--simple__no-padding .post-card__title{font-size:18px;line-height:26px}.post-card__title{margin-bottom:1rem;line-height:24px}}.post-card__title--xlarge{font-size:18px;line-height:26px}@media (min-width:768px){.post-card__title--xlarge{font-size:24px;line-height:32px}}.post-card__excerpt{margin-top:1.8rem;color:#4a4a4a;font-size:16px}.post-card__excerpt p{line-height:22px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}.post-meta{-js-display:flex;display:flex;flex-flow:row nowrap;align-items:center;width:100%}.post-meta__category,.post-meta__stat{font-size:1.2rem;line-height:14px;font-weight:700}.post-meta__category{flex:0 0 auto;position:relative}.post-meta__category span{position:relative;display:inline-block;z-index:2;color:#ec2427;text-transform:uppercase}.post-meta__category:after{content:"\2022";padding:0 8px;color:#9b9b9b;font-size:16px}.post-meta__stat{color:#9b9b9b;flex:0 0 auto;padding:5px 0}.post-meta__stat:after{content:"\2022";padding:0 10px;font-size:16px}.post-meta__stat:last-child:after{content:"";padding:0}.shoutbox{-js-display:flex;display:flex;position:relative;align-items:center;margin:0 auto;padding:2rem;width:100%;text-align:center;background-color:#f5f5f6}@media (min-width:1024px){.post-card__img,.post-card__thumbnail{height:17.1rem}.post-card__img--large,.post-card__thumbnail--large{height:38.8rem;width:100%}.shoutbox{padding:2rem 4rem}}.shoutbox--wide{max-width:100%;width:100%;height:320px;text-align:center}@media (min-width:768px){.post-meta__category,.post-meta__stat{font-size:1.4rem;line-height:16px}.shoutbox--wide{height:530px}}.shoutbox--has-bg{color:#000}.shoutbox--has-bg:before{content:"";position:absolute;left:0;top:0;width:100%;height:100%;z-index:2;background-image:linear-gradient(transparent,#f5f5f6 75%)}.shoutbox__background{position:absolute;top:0;right:0;width:100%;height:auto;z-index:1;-o-object-fit:cover;font-family:"object-fit:cover;object-position:50% 50%";object-fit:cover;-o-object-position:50% 50%;object-position:50% 50%}.shoutbox__content-wrapper{position:absolute;width:100%;z-index:2;top:50%;left:50%;transform:translate(-50%,-50%);background-image:radial-gradient(#f5f5f6 40%,transparent);padding:3.6rem 3.2rem}.shoutbox__title{margin-bottom:1.4rem;font-size:24px!important;font-family:Roboto,sans-serif;font-weight:700;line-height:32px;letter-spacing:-1px;color:#000}.shoutbox__title--extra-bold{font-size:2rem!important;font-weight:700;line-height:24px;letter-spacing:.5px}.shoutbox__text{margin-bottom:1.4rem;line-height:20px;color:#000;font-size:14px!important}.shoutbox__text--extra-space{margin-bottom:0;line-height:20px;font-weight:400}@media (max-width:1023.98px){.shoutbox__text--extra-space{margin-bottom:1rem}}.shoutbox__cta{text-align:center}@media (min-width:768px){.shoutbox__content-wrapper{width:81%;top:unset;bottom:3rem;left:unset;transform:unset;background-image:unset;padding:0}.shoutbox__cta--left{text-align:left;padding-left:0!important}}.shoutbox__cta .btn{width:100%;font-family:Roboto,sans-serif}.new-shoutbox{top:0!important}.btn-shoutbox{margin-bottom:1.5rem;padding:.7rem 3rem;font-size:1.4rem;min-width:256px}@media (max-width:1024px){.btn-shoutbox{font-size:calc(.47rem + .9082vw)}}@media (min-width:768px){.new-shoutbox{top:2rem}.btn-shoutbox{margin-bottom:0;margin-right:2rem;min-width:unset}}.btn-shoutbox:last-child{margin-right:0}.btn-login{color:#fff;font-size:1.6rem;font-weight:700;font-family:Roboto,sans-serif;text-transform:uppercase;letter-spacing:1px}.btn-load-more{border-width:2px;font-weight:600;color:#000}.btn-load-more{padding:1rem 3rem;border-color:#ec2427;background-color:transparent;font-size:1.4rem;font-family:Roboto,sans-serif}@media (max-width:1023.98px){.btn{font-size:14px;line-height:24px;height:40px;padding:.8rem 4rem}}.btn-link{background-image:url(static/images/bg-btn-link.png);background-size:1em;background-repeat:no-repeat;background-position:calc(100% - 1.3em) 50%}.d-none{display:none!important}.text-center{text-align:center!important}.text-uppercase{text-transform:uppercase!important}.home-promo-slider{position:relative}@media (max-width:767px){.hide-mobile{display:none}}.modal{display:none;position:fixed;top:0;left:0;width:100%;height:100%;z-index:99999}.modal-content{position:absolute;z-index:1;width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;top:50%;left:50%;transform:translate(-50%,-50%)}.modal-content .btn-close{position:absolute;top:0;right:0;background:0 0}.modal-content .btn-close:after{content:none}.modal .backdrop{position:absolute;top:0;width:100%;height:100%;background-color:rgba(0,0,0,.5)}#modalPolling .modal-content{background-color:#eee;width:320px}@media screen and (max-width:375px){#modalPolling .modal-content{width:90%}}#modalPolling .modal-content-header{color:#fff;background:url(static/images/poll-modal-bg.jpg);background-color:#ec2427;background-repeat:no-repeat;background-size:cover;padding:16px}#modalPolling .modal-content-header span{display:block}#modalPolling .modal-content-header span:first-child{font-size:14px;margin-bottom:15px}#modalPolling .modal-content-header span:nth-child(2){font-weight:700;font-size:18px}#modalPolling .modal-content-header .btn-close{top:3px;right:5px}#modalPolling .modal-content-inner{padding:16px}#modalPolling .modal-content-inner ol{margin:0;padding:0;list-style:none;counter-reset:polling-counter}#modalPolling .modal-content-inner .message-success{display:none;margin-top:16px;font-weight:700;font-size:16px;color:#3d3d3d}</style>
@endsection

{{-- don't use loader for landing page --}}
@section('loader')
@endsection

@section('meta')
    {{-- if there is banner, preload it here --}}
    {{-- <link rel="preload" as="image" href="{{ asset('static/images/LAZONE_Home_Mobile_banner_580x755-01.jpg') }}" /> --}}
@endsection

@section('content')
{{-- banner wifi --}}
@if(isset($bannerWifi) && $bannerWifi)
@include('frontend.partials.wifi-banner')
@endif
{{-- end banner wifi --}}
{{-- sticky Banner --}}
{{-- @if(isset($stickyBanner) && $stickyBanner)
    <div id="stickyBannerContainer">
    @if($stickyBanner->periode_start && (Carbon\Carbon::now()->between(Carbon\Carbon::createFromFormat('Y-m-d', $stickyBanner->periode_start), Carbon\Carbon::createFromFormat('Y-m-d', $stickyBanner->periode_end))) )
        @include('frontend.partials.sticky-banner')
    @elseif(!$stickyBanner->periode_start)
    @include('frontend.partials.sticky-banner')
    @endif
    </div>
@endif --}}
{{-- end of sticky banner --}}
{{-- Above the fold --}}
@section('inside-head')
<style type="text/css">
    #modalHome {
        transition: all ease .3s;
    }
    #modalHome.modal--hidden {
        opacity: 0;
        visibility: hidden;
    }

    #modalHome .modal-content a {
        display: block;
    }

    @media screen and (max-width: 768px) {
        .post-card--highlight {
            padding-bottom: 2rem;
        }

        .jsArticleList {
            margin-top: -3rem;
        }

        .post-card--wide__with-padding:first-child {
            padding-top: 3rem;
        }

        .trending-list-container {
            padding: 0;
        }
        .section-title__latest {
            margin-top: 4rem;
        }

        #modalHome .modal-content img {
            max-width: 300px;
            height: auto;
        }
    }
    @media screen and (min-width: 768px) {
        .post-card--simple__no-padding {
            padding-left: 1.6rem;
            margin-bottom: 3rem;
        }
        /* .post-card__img {
            width: 28.5rem;
        } */
        .post-card__img--large {
            width: 64.6rem;
        }

        #latestArticleContainer {
            padding-right: 4.5rem;
            padding-left: 0;
        }

        #modalHome .modal-content img {
            width: 350px;
            height: auto;
        }
    }
    @media screen and (min-width: 1400px) {
        #modalHome .modal-content img {
            width: 450px;
            height: auto;
        }
    }

    #modalHome {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 99999;
    }
    #modalHome .modal-content {
        position: absolute;
        z-index: 1;
        width: fit-content;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    #modalHome .modal-content .btn-close {
        position: absolute;
        top: 0;
        right: 0;
        transform: translate(30px, -30px);
        background: transparent
    }
    #modalHome .modal-content .btn-close::after {
        font-size: 4rem;
        font-weight: 800;
    }
    #modalHome .backdrop {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,.5);
    }
</style>
@endsection
<div class="container container-home">

    <div class="home-grid">

        <div class="home-grid__must-reads">

            <div class="section-title">
                <span class="section-title__label section-title__label--lg text-uppercase">Must Read</span>
            </div>

            <div class="home-grid__must-reads-highlights">
                <div class="post-card post-card--highlight">

                    <div class="post-card__thumbnail post-card__thumbnail--large">
                        <a href="{{ $posts_highlight->url }}?utm_source=Highlight&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ $posts_highlight->title }}">
                            <picture>
                                <source media="(min-width: 756px)" srcset="{{ asset($posts_highlight->image) }}" alt="{{ $posts_highlight->title }}">
                                <img class="post-card__img post-card__img--large" width="400" height="236" src="{{ $posts_highlight->thumbnail }}" alt="{{ $posts_highlight->title }}">
                            </picture>
                        </a>
                    </div>

                    <a href="{{ $posts_highlight->url }}?utm_source=Highlight&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ $posts_highlight->title }}">
                        <div class="post-card__title post-card__title--xlarge">
                            <span>{{ $posts_highlight->title }}</span>
                        </div>
                        <div class="post-card__excerpt hide-mobile">
                            <p>{{ $posts_highlight->summary }}</p>
                        </div>
                    </a>

                    <div class="post-card__meta post-meta">

                        <div class="post-meta__category">
                            <a href="{{ $posts_highlight->category ? $posts_highlight->category->url : '/lifestyle' }}" alt="{{ $posts_highlight->category_name }}" style="font-size: 14px">
                                <span>{{ $posts_highlight->category_name }}</span>
                            </a>
                        </div>
                        <div class="post-meta__stat" style="font-size: 14px"><span>{{ $posts_highlight->published_date }}</span></div>

                    </div>

                </div>
            </div>

            <div class="home-grid__must-reads-list">
                @foreach ($posts_must_read as $item)
                    <div class="span-12 span-md-6" style="padding: 0;">
                        <div class="post-card post-card--simple post-card--simple__no-padding">

                            <div class="post-card__thumbnail">
                                <a href="{{ $item->url }}?utm_source=MustReads&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ $item->title }}">
                                    <img class="post-card__img" width="380" height="250" src="img_placeholder_point.jpg" data-src="{{ $item->thumbnail }}" alt="{{ $item->title }}">
                                </a>
                            </div>

                            <div class="post-card__info">
                                <a href="{{ $item->url }}?utm_source=MustReads&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ $item->title }}">
                                    <div class="post-card__title">
                                        <span>{{ $item->title }}</span>
                                    </div>
                                </a>

                                <div class="post-card__meta post-meta">

                                    <div class="post-meta__category">
                                        <a href="{{ $item->category ? $item->category->url : '/lifestyle' }}" alt="{{ $item->category_name }}">
                                            <span>{{ $item->category_name }}</span>
                                        </a>
                                    </div>
                                    <div class="post-meta__stat"><span>{{ $item->published_date }}</span></div>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>

        {{-- <div class="home-grid__recommended">

            <div class="section-title section-title--mobile-ribbon">
                <span class="section-title__label">Recommended</span>
            </div>

            <div class="row jsRecomended">
            </div>
        </div> --}}

        {{-- <hr style="margin-top: 8rem; width: 100%;" class="hide-mobile"> --}}
    </div>

    {{-- <div class="home-below-fold">

        <div class="home-below-fold__slider hide-mobile">
            <div class="home-promo-slider jsHomeSlider">
            </div>
        </div>

        <div class="home-below-fold__slider show-mobile">
            <div class="home-promo-slider jsHomeMobileSlider">
            </div>
        </div>

        <div class="home-below-fold__preference">

            @include('frontend.partials.shoutbox')

        </div>

    </div> --}}

</div>

<div class="container">
    <div class="row">
        <div class="span-12 span-md-8 order-2 order-md-1">
            <div class="home-below-fold__slider show-mobile" style="margin: 4rem 0;">
                <div class="home-promo-slider jsHomeMobileSlider">
                </div>
            </div>
        </div>
    </div>
</div>

{{--  Trending Article --}}
<div class="home-trending">
    <div class="container">
        <div class="section-title">
            <span class="section-title__label section-title__label--lg text-uppercase">Most Viewed</span>
        </div>
    </div>
    <div class="container trending-list-container">
        <div class="row">

            <div class="home-below-fold__slider show-mobile">
                <div class="home-promo-slider jsMobileTrendingList">
                    {{-- @for($i=0; $i<=3; $i++)
                        <div class="post-card post-card--simple post-card--simple__max-height" style="max-width: 235px !important; margin-right: 2rem;">
                            <div class="post-card__thumbnail">
                                <a href="test?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="">
                                    <img class="post-card__img" src="img_placeholder_point.jpg" data-src="" alt="">
                                </a>
                            </div>

                            <div class="post-card__info">

                                <a href="test?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="">
                                    <div class="post-card__title">
                                        <span>Test</span>
                                    </div>
                                </a>

                                <div class="post-card__meta post-meta">

                                    <div class="post-meta__category">
                                        <a href="#" alt="Test">
                                            <span>Test</span>
                                        </a>
                                    </div>
                                    <div class="post-meta__stat"><span>21 Jan 2021</span></div>

                                </div>
                            </div>
                        </div>
                    @endfor --}}
                </div>
            </div>

            <div class="row hide-mobile jsTrendingList">
                {{-- @for($i=0; $i<=3; $i++)
                    <div class="span-12 span-md-6 span-lg-3">
                        <div class="post-card post-card--simple post-card--simple__max-height">
                            <div class="post-card__thumbnail">
                                <a href="test?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="">
                                    <img class="post-card__img" src="img_placeholder_point.jpg" data-src="" alt="">
                                </a>
                            </div>

                            <div class="post-card__info">

                                <a href="test?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="">
                                    <div class="post-card__title">
                                        <span>Test</span>
                                    </div>
                                </a>

                                <div class="post-card__meta post-meta">

                                    <div class="post-meta__category">
                                        <a href="#" alt="Test">
                                            <span>Test</span>
                                        </a>
                                    </div>
                                    <div class="post-meta__stat"><span>21 Jan 2021</span></div>

                                </div>

                            </div>

                        </div>

                    </div>
                @endfor --}}
            </div>
        </div>
        <div class="jsMoreTrending"></div>
    </div>
</div>

{{-- <div class="container">

    <div class="row">

        <div class="span-12">

            Ads Placement
            <div class="placement">
                <a href="{{ $ads['url'] }}?utm_source=AdsHome" alt="{{ $ads['url'] }}">
                    <img class="placement__img post-card__img" src="/img_placeholder_slider.jpg" data-src="{{ imageview($ads['image']) }}" alt="{{ $ads['url'] }}">
                </a>
            </div>

        </div>


    </div>

    <div class="row">

        <div class="span-12">

            Shoutbox lazone
            <div class="shoutbox shoutbox--wide shoutbox--has-bg">

                <img class="shoutbox__background hide-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12.jpg') }} />
                <img class="shoutbox__background show-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12-responsive.jpg') }} />

                <div class="shoutbox__content-wrapper">

                    <div class="shoutbox__title shoutbox__title--extra-bold">
                        <span class="f-none">Menangkan Hadiah Menarik Tiap Bulan!</span>
                    </div>

                    <div class="shoutbox__text shoutbox__text--extra-space">
                        <p class="f-none">Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!</p>
                    </div>

                    <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                        <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG POIN</strong></a>
                        @guest
                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                        @endguest
                    </div>

                </div>

            </div>

        </div>

        <div class="hide-mobile jsVideoList"></div>
        <div class="jsMoreVideo"></div>

    </div>

</div> --}}

{{-- List with side --}}
{{-- <div class="container">

    <div class="list-with-sidebar">

        <div class="list-with-sidebar__main">

            Shoutbox lazone
            <div class="shoutbox shoutbox--wide shoutbox--has-bg">

                <img class="shoutbox__background hide-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12.jpg') }} />
                <img class="shoutbox__background show-mobile post-card__img" alt="lazone id" data-src={{ asset('static/images/lazone-prize-12-responsive.jpg') }} />

                <div class="shoutbox__content-wrapper">

                    <div class="shoutbox__title shoutbox__title--extra-bold">
                        <span class="f-none">Menangkan Hadiah Menarik Tiap Bulan!</span>
                    </div>

                    <div class="shoutbox__text shoutbox__text--extra-space">
                        <p class="f-none">Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!</p>
                    </div>

                    <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                        <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG POIN</strong></a>
                        @guest
                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                        @endguest
                    </div>

                </div>

            </div>

            <div class="row horizontal-list">
                <div class="section-title">
                    <span class="section-title__label">Latest Articles</span>
                </div>

                <div class="span-12 jsArticleList"></div>
                <div class="span-12 text-center">
                    <button class="btn btn-ghost-crimson btn-load-more jsMoreArticle">LOAD MORE</button>
                </div>
            </div>

        </div>

        <div class="list-with-sidebar__aside">

            <div class="section-title section-title--plain section-title--has-more">
                <span class="section-title__label">Videos</span>
                <a href="{{ url('gallery/video') }}?utm_source=SeeMore&utm_medium=Video&utm_campaign=LazoneDetail" class="section-title__more" alt="See more"><span>SEE MORE</span><span class="arrow-left"></span></a>
            </div>

            <div class="row no-gutters">
                <div class="jsVideoList hide-mobile"></div>
                <div class="home-below-fold__slider show-mobile">
                    <div class="home-promo-slider jsVideoMobileSlider">
                    </div>
                </div>
                <div class="jsMoreVideo"></div>
            </div>

        </div>

    </div>

</div> --}}

<div class="container">
    <div class="row" style=" margin-top: 4rem;">

        <div class="span-12 span-md-8 order-2 order-md-1" id="latestArticleContainer">
            <div class="home-below-fold__slider hide-mobile" style="padding: 0;">
                <div class="home-promo-slider jsHomeSlider">
                </div>
            </div>

            {{-- <div class="home-below-fold__slider show-mobile">
                <div class="home-promo-slider jsHomeMobileSlider">
                </div>
            </div> --}}

            <div class="section-title section-title__latest">
                <span class="section-title__label section-title__label--lg text-uppercase">Latest Articles</span>
            </div>

            <div class="span-12 jsArticleList hide-mobile" style="padding: 0;"></div>
            <div class="span-12 text-center hide-mobile">
                <button class="btn btn-ghost-crimson btn-load-more jsMoreArticle">LOAD MORE</button>
            </div>
            <div class="span-12 jsMobileArticleList show-mobile" style="padding: 0;"></div>
            <div class="span-12 text-center show-mobile">
                <button class="btn btn-ghost-crimson btn-load-more jsMoreMobileArticle">LOAD MORE</button>
            </div>
        </div>

        {{-- Shoutbox lazone Desktop --}}
        <div class="span-12 span-md-4 order-1 order-md-2 hide-mobile" id="shoutbox" style="padding: 0;">
            {{-- <div class="show-mobile" style="padding-left: 1rem;">
                <div class="section-title section-title--plain section-title--has-more">
                    <span class="section-title__label">Videos</span>
                    <a href="{{ url('gallery/video') }}?utm_source=SeeMore&utm_medium=Video&utm_campaign=LazoneDetail" class="section-title__more" alt="See more"><span>SEE MORE</span><span class="arrow-left"></span></a>
                </div>
            </div>

            <div class="section-title section-title--plain section-title--has-more hide-mobile">
                <span class="section-title__label">Videos</span>
                <a href="{{ url('gallery/video') }}?utm_source=SeeMore&utm_medium=Video&utm_campaign=LazoneDetail" class="section-title__more" alt="See more"><span>SEE MORE</span><span class="arrow-left"></span></a>
            </div>

            <div class="row no-gutters">
                <div class="jsVideoList hide-mobile"></div>
                <div class="home-below-fold__slider show-mobile" style="margin-bottom: 3rem;">
                    <div class="home-promo-slider jsVideoMobileSlider">
                    </div>
                </div>
                <div class="jsMoreVideo"></div>
            </div> --}}

            <div class="shoutbox shoutbox--wide shoutbox--has-bg inner-wrapper-sticky inner-wrapper-sticky__shoutbox">

                <img class="shoutbox__background post-card__img" alt="lazone id" width="380" height="250" src="img_placeholder_point.jpg" data-src="{{ imageview($ads['banner_mypoint_dekstop']) }}" />

                <div class="shoutbox__content-wrapper">

                    <div class="shoutbox__title shoutbox__title--extra-bold">
                        <span>{!! $ads['banner_mypoint_title'] !!}</span>
                    </div>

                    <div class="shoutbox__text shoutbox__text--extra-space">
                        <p>{!! $ads['banner_mypoint_summary'] !!}</p>
                    </div>

                    <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                        <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG POIN</strong></a>
                        @guest
                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        {{-- Shoutbox lazone Mobile --}}
        <div class="span-12 span-md-4 order-1 order-md-2 show-mobile">
            <div class="shoutbox shoutbox--wide shoutbox--has-bg">

                <img class="shoutbox__background post-card__img" width="380" height="250" src="img_placeholder_point.jpg" alt="lazone id" data-src="{{ imageview($ads['banner_mypoint_mobile']) }} "/>

                <div class="shoutbox__content-wrapper">

                    <div class="shoutbox__title shoutbox__title--extra-bold">
                        <span>{!! $ads['banner_mypoint_title'] !!}</span>
                    </div>

                    <div class="shoutbox__text shoutbox__text--extra-space">
                        {!! $ads['banner_mypoint_summary'] !!}
                    </div>

                    <div class="shoutbox__cta shoutbox__cta--left new-shoutbox">
                        <a href="{{ url('points') }}?utm_source=BannerHome" class="btn btn-ghost-crimson btn-shoutbox" alt="Points"><span class="semibold">PELAJARI TENTANG POIN</strong></a>
                        @guest
                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox" alt="Login"><span class="text-white semibold">DAFTAR SEKARANG</strong></a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('after-site-footer')
@if($ads['popup_mypoint_status'])
<div id="modalHome" class="modal--hidden js-initially-hidden">
    <div class="modal-content">
        <span class="btn-close"></span>
        <a href="{{url('points')}}?utm_source=HomeBanner&utm_medium=PopUp&utm_campaign=PopUpBanner">
            <img src="{{ asset($ads['popup_mypoint']) }}" alt="LAZONE My Points" width="300" height="391">
        </a>
    </div>
    <div class="backdrop"></div>
</div>
@endif
@endsection

@section('before-body-end')

<script>
    window.feedUrl = "{{ url('feed') }}"
    window.feedHomeUrl = "{{ url('feed-home') }}"
    window.feedVideoUrl = "{{ url('feed-new-video') }}"
    window.feedTrendingUrl = "{{ url('feed-trending') }}"
    window.feedSliderUrl = "{{ url('feed-slider') }}"
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <div class="post-card post-card--wide post-card--wide__with-padding">

        <div class="post-card__thumbnail">
            <a href="{{ url }}">
                <img width="380" height="250" src="/img_placeholder_point.jpg" class="post-card__img" data-src="{{ thumbnail }}" alt="{{ title }}">
            </a>
        </div>

        <div class="post-card__info">

            <a href="{{ url }}" alt="{{ title }}">
                <div class="post-card__title post-card__title--large">
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
</script>

<script id="new-post-template" type="text/x-handlebars-template">

    <div class="post-card post-card--wide post-card--wide__with-padding">
        <div class="post-card__thumbnail">
            <a href="{{ url }}">
                <img width="380" height="250" src="/img_placeholder_point.jpg" class="post-card__img" data-src="{{ thumbnail }}" alt="{{ title }}">
            </a>
        </div>

        <div class="post-card__info">

            <a href="{{ url }}" alt="{{ title }}">
                <div class="post-card__title post-card__title--large">
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
</script>

<script id="x-video-template" type="text/x-handlebars-template">
<div class="span-12 span-md-6 span-lg-11">
<div class="post-card post-card--video">

    <div class="post-card__thumbnail post-card__thumbnail--video">

        <img class="post-card__img post-card__img--video" width="380" height="250" src="/img_placeholder_point.jpg" data-src="https://img.youtube.com/vi/{{ youtube_id }}/hqdefault.jpg" alt="{{ title_limit }}">

        <a href="{{ url }}" alt="{{ title_limit }}">
            <div class="post-card__overlay"></div>

            <div class="post-card__vid-play">
                <svg class="svg-vid-play">
                    <use xlink:href="/static/images/sprites.svg#vid-play"></use>
                </svg>
            </div>

            <div class="post-card__frame">
                <svg class="svg-video-frame">
                    <use xlink:href="/static/images/sprites.svg#video-frame"></use>
                </svg>
            </div>

            <div class="post-card__time"><span>{{ duration }}</span></div>
        </a>
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category">
            <a href="/gallery/video" alt="{{ category }}">
                <span>{{ category }}</span>
            </a>
        </div>

    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__stat"><span>{{ published_date }}</span></div>
        <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

    </div>

    <a href="{{ url }}" alt="{{ title_limit }}">
        <div class="post-card__title">
            <span>{{ title_limit }}</span>
        </div>
    </a>
</div>
</div>
</script>

<script id="x-trending-template" type="text/x-handlebars-template">
<div class="span-12 span-md-6 span-lg-3">
    <div class="post-card post-card--simple post-card--simple__max-height">
        <div class="post-card__thumbnail">
            <a href="{{ url }}?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
                <img class="post-card__img" height="236" width="400" src="{{thumbnail}}" alt="{{ title }}">
            </a>
        </div>

        <div class="post-card__info">

            <!-- <div class="post-card__meta post-meta">

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

                <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

            </div> -->

            <a href="{{ url }}?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
                <div class="post-card__title">
                    <span>{{ title }}</span>
                </div>
            </a>

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="{{ category_url }}" alt="{{ category }}">
                        <span>{{ category }}</span>
                    </a>
                </div>
                <div class="post-meta__stat"><span>{{ view_count }} Views</span></div>

            </div>

        </div>

    </div>

</div>
</script>

<script id="x-must-template" type="text/x-handlebars-template">
<div class="span-12 span-md-6" style="padding: 0;">
    <div class="post-card post-card--simple post-card--simple__no-padding">

        <div class="post-card__thumbnail">
            <a href="{{ url }}?utm_source=MustReads&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
                <img class="post-card__img" width="380" height="250" src="img_placeholder_point.jpg" data-src="{{ thumbnail }}" alt="{{ title }}">
            </a>
        </div>
        <!-- <div class="post-card__meta post-meta">

            <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

        </div> -->

        <div class="post-card__info">
            <a href="{{ url }}?utm_source=MustReads&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
                <div class="post-card__title">
                    <span>{{ title }}</span>
                </div>
            </a>

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="{{ category_url }}" alt="{{ category }}">
                        <span>{{ category }}</span>
                    </a>
                </div>
                <div class="post-meta__stat"><span>{{ published_date }}</span></div>

            </div>
        </div>
    </div>
</div>
</script>

<script id="x-recomended-template" type="text/x-handlebars-template">
<div class="span-12 span-md-6 span-lg-4 span-xl-12">
    <div class="post-card post-card--wide">

        <div class="post-card__thumbnail-square">
            <a href="{{ url }}">
                <img class="post-card__img" width="380" height="250" src="/img_placeholder_point.jpg" data-src="{{ thumbnail }}" alt="{{ title }}">
            </a>
        </div>

        <div class="post-card__info">

            <div class="post-card__meta post-meta">

                <div class="post-meta__category">
                    <a href="{{ category_url }}" alt="{{ category }}">
                        <span>{{ category }}</span>
                    </a>
                </div>

            </div>

            <div class="post-card__meta post-meta">

                <div class="post-meta__stat"><span>{{ published_date }}</span></div>
                <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

            </div>

            <a href="{{ url }}{{ utm }}" alt="{{ title }}">
                <div class="post-card__title"><span>{{ title }}</span></div>
            </a>

        </div>

    </div>

</div>
</script>

<script id="x-highlight-template" type="text/x-handlebars-template">
<div class="post-card post-card--highlight">

    <div class="post-card__thumbnail post-card__thumbnail--large">
        <a href="{{ url }}?utm_source=Highlight&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
            <img class="post-card__img post-card__img--large" width="380" height="250" src="img_placeholder_point.jpg" data-src="{{ thumbnail }}" alt="{{ title }}">
        </a>
    </div>

    <!-- <div class="post-card__meta post-meta post-meta--centered">

        <div class="post-meta__stat"><span>{{ view_count }} views </span></div>

    </div> -->

    <a href="{{ url }}?utm_source=Highlight&utm_medium=Content&utm_campaign=LazoneDetail" alt="{{ title }}">
        <div class="post-card__title post-card__title--xlarge">
            <span>{{ title }}</span>
        </div>
        <div class="post-card__excerpt hide-mobile">
            <p>{{  summary }}</p>
        </div>
    </a>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category">
            <a href="{{ category_url }}" alt="{{ category }}" style="font-size: 14px">
                <span>{{ category }}</span>
            </a>
        </div>
        <div class="post-meta__stat" style="font-size: 14px"><span>{{ published_date }}</span></div>

    </div>

</div>
</script>
@endverbatim
<script type="text/javascript">
var banner_image = '{{ imageview($ads['image']) }}';
var banner_url = '{{ $ads['url'] }}';

setTimeout(function() {
    $('.js-initially-hidden').removeClass('modal--hidden');
}, 3000);

$(function(){
    $("#modalHome .btn-close, #modalHome .backdrop").on('click', function() {
        $("#modalHome").remove();
    })
});

</script>
<script defer src="{{ asset('static/js/jquery.sticky-sidebar.min.js') }}"></script>
<script defer src="{{ asset('static/js/ResizeSensor.js') }}"></script>
<script async src="{{ asset('static/js/home.js') }}?v=1"></script>
@endsection
