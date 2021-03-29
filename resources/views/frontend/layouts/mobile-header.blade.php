<div class="mobile-header nav-down-mobile">

    <button class="mobile-menu-trigger mobile-menu-trigger__left hamburger hamburger--slider" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>

    {{-- @auth --}}
    <button class="jsUserMenuTrigger close-user-menu hamburger hamburger--slider is-active hidden" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>
    {{-- @endauth --}}

    <a href="{{ url('/')}}" class="site-logo">
        <picture>
            {{-- <source srcset="{{ asset('static/images/logo.webp') }}" type="image/webp"> --}}
            <img src="{{ asset('static/images/logo.png') }}" alt="LA-ZONE.id">
        </picture>
    </a>

    @auth
    <div class="search-btn-trigger search-btn-trigger__logged-in searchTrigger">
    @else
    <div class="search-btn-trigger searchTrigger">
    @endauth
        <img src="{{ asset('static/images/search.svg') }}" alt="">
    </div>

    <div class="search-wrapper">
        <div class="close-button searchTrigger"></div>
        <form class="form" action="{{ url('search') }}" method="get">
            <input type="search" name="search" class="search-input form-control" placeholder="search">
            <button type="submit" class="search-btn-icon">
                <picture>
                    {{-- <source srcset="{{ asset('static/images/search-black.webp') }}" type="image/webp"> --}}
                    <img src="{{ asset('static/images/search.svg') }}" alt="">
                </picture>
            </button>
        </form>
    </div>
    
    @auth
        <div class="user-info mobile jsUserMenuTrigger">
            {{-- <span class="user-info__hello">Hi, {{ str_limit(auth()->user()->name, 7) }}</span> --}}
            <img class="user-info__avatar" src="{{ asset('static/images/avatar.png') }}" id="avatar-mobile" alt="{{ str_limit(auth()->user()->name, 25) }}">
        </div>
    @else
        <a href="{{ url('member/login') }}" alt="Login" class="btn btn-crimson btn-login user-info">Login</a>
    @endauth

    <ul class="mobile-scrollable-menu">
        @foreach($siteCategory as $item)
            <li>
                <a href="{{ url($item->slug) }}" alt="{{ $item->name }}">{{ $item->name }}</a>
            </li>
        @endforeach
        <li>
            <a href="{{ url('lensaphoto') }}" alt="Lensaphoto">Lensa</a>
        </li>
        <li>
            <a href="{{ url('sneakerland') }}" alt="Sneakerland">Sneakerland</a>
        </li>
    </ul>

</div>

<div class="dropdown-menu__blanket"></div>
{{-- <nav id="nav-mobile-menu" class="mobile-nav">
    <div id="mobile-menu" class="drilldown">
        <div class="drilldown-container">
            <ul class="drilldown-root">
                @auth
                <li class="dropdown-menu dropdown-menu__item--user-menu">
                    <span class="dropdown-menu__avatar">
                        <img src="{{ asset('static/images/avatar.png') }}" alt="User Avatar" class="avatar" id="avatar-desktop">
                    </span>
                    <div class="dropdown-menu__user-container">
                        <strong class="dropdown-menu__username">Hi, {{ str_limit(auth()->user()->name, 7) }}</strong>
                        <span class="dropdown-menu__points"><span id="loyalty_point"></span> pts</span>
                    </div>
                </li>
                <li class="dropdown-menu__separator"></li>
                <li class="menu">
                    <a href="https://{{ config('cas.cas_hostname') }}/profile/?service={{ url('/') }}" alt="Gallery">
                        My Profile
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ config('cas.url_mypoint') }}" alt="Gallery">
                        My Points
                    </a>
                </li>
                <li class="dropdown-menu__separator"></li>
                @endauth
                @auth
                    <li class="menu">
                        <a href="{{ url('member/logout') }}" class="btn btn-crimson btn-login">Logout</a>
                    </li>
                @else
                    <li class="menu">
                        <a href="{{ url('member/login') }}" alt="Login" class="btn btn-crimson btn-login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav> --}}
<nav id="nav-mobile-menu" class="mobile-nav mobile-nav__left">
    <div id="mobile-menu" class="drilldown">
        <div class="drilldown-container">
            <ul class="drilldown-root" data-accordion="false">
                <li class="menu" style="margin-top: 2rem;">
                    <a href="#" class="accordion">
                        <span class="chevron"></span>
                        <span>Community</span>
                        <ul class="panel">
                            @foreach($siteLink as $item)
                                <li>
                                    <a href="{{ $item->url }}" target="_blank" alt="{{ $item->name }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </a>
                </li>
                <li class="dropdown-menu__separator"></li>
                <li class="menu">
                    <a href="{{ url('events') }}" alt="Events">
                        Events
                    </a>
                </li>
                <li class="dropdown-menu__separator"></li>
                <li class="menu">
                    <a href="{{ url('gallery') }}" alt="Gallery">
                        Gallery
                    </a>
                </li>
                <li class="dropdown-menu__separator"></li>
                <li class="menu">
                    <a href="{{ url('points') }}" alt="Points">
                        What is My Points?
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@auth
<div id="user-mobile-menu" class="mobile-nav">
    <ul>
        <li class="menu">
            <div class="user-info user-info--nomargin">
                <div class="user-info__left">
                    <span><img class="user-info__avatar" src="{{ asset('static/images/avatar.png') }}" id="avatar-mobile2" alt="User Avatar"></span>
                </div>
                <div class="user-info__right">
                    <span class="user-info__name"><strong>{{ str_limit(auth()->user()->name, 23) }}</strong></span>
                    <span class="user-info__point"><span id="loyalty_point2"></span> pts</span>
                </div>
            </div>
        </li>
        <li class="menu">
            <a href="https://{{ config('cas.cas_hostname') }}/profile/?service={{ url('/') }}"><span>My Profile</span></a>
        </li>
        <li class="menu">
            <a href="{{ config('cas.url_mypoint') }}"><span>My Points</span></a>
        </li>
        <li class="dropdown-menu__separator"></li>
        <li class="menu">
            <a href="{{ url('member/logout') }}">Logout</a>
        </li>
    </ul>
</div>
@endauth
