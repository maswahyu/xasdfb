<div class="mobile-header">

    <button class="mobile-menu-trigger hamburger hamburger--slider" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>

    @auth
    <button class="jsUserMenuTrigger close-user-menu hamburger hamburger--slider is-active hidden" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>
    @endauth

    <a href="{{ url('/')}}" class="site-logo">
        <img src="{{ asset('static/images/logo.png') }}" alt="LA-ZONE.id">
    </a>

    @auth
    <div class="user-info mobile jsUserMenuTrigger">
        <span><img class="user-info__avatar" src="{{ asset('static/images/avatar.png') }}" alt="User Avatar"></span>
    </div>
    @endauth

</div>

<nav id="nav-mobile-menu" class="mobile-nav">
    <div id="mobile-menu" class="drilldown">
        <div class="drilldown-container">
            <ul class="drilldown-root">
                <li class="search">
                    <form class="form" action="{{ url('search') }}" method="get">
                        <input type="search" name="search" class="search-input form-control">
                        <button type="submit" class="search-btn-icon">
                            <img src="{{ asset('static/images/search-black.png') }}" alt="">
                        </button>
                    </form>
                </li>
                <li class="menu has-sub-menu">
                    <a target="_blank" href="#">
                        <span>Articles</span>
                    </a>
                    <ul class="drilldown-sub sub-menu">
                        <li class="drilldown-back">
                            <a>Back</a>
                        </li>
                        @foreach($siteCategory as $item)
                            <li>
                                <a href="{{ url($item->slug) }}" alt="{{ $item->name }}">{{ $item->name }}</a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ url('lensaphoto') }}" alt="Lensaphoto">Lensaphoto</a>
                        </li>
                        <li>
                            <a href="{{ url('sneakerland') }}" alt="Sneakerland">Sneakerland</a>
                        </li>
                    </ul>
                </li>
                <li class="menu has-sub-menu">
                    <a href="#">
                        <span>Community</span>
                        <ul class="drilldown-sub sub-menu">
                            <li class="drilldown-back">
                                <a>Back</a>
                            </li>
                            @foreach($siteLink as $item)
                                <li>
                                    <a href="{{ $item->url }}" target="_blank" alt="{{ $item->name }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ url('events') }}" alt="Events">
                        Events
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ url('gallery') }}" alt="Gallery">
                        Gallery
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ url('points') }}" alt="Points">
                        What is My Points?
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ url('interest') }}" alt="interest">
                        Pick your interest
                    </a>
                </li>
                @guest
                    <li class="menu">
                        <a href="{{ url('member/login') }}" alt="Login" class="btn btn-crimson btn-login">Login</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@auth
<div id="user-mobile-menu" class="mobile-nav">
    <ul>
        <li class="menu">
            <div class="user-info">
                <div class="user-info__left">
                    <span><img class="user-info__avatar" src="{{ asset('static/images/avatar.png') }}" alt="User Avatar"></span>
                </div>
                <div class="user-info__right">
                    <span class="user-info__name"><strong>{{ auth()->user()->name }}</strong></span>
                    <span class="user-info__point"><span id="loyalty_point2"></span> pts</span>
                </div>
            </div>
        </li>
        <li class="menu">
            <a href="https://{{ env('CAS_HOSTNAME') }}/profile/?service={{ url('/') }}"><span>My Profile</span></a>
        </li>
        <li class="menu">
            <a href="{{ env('URL_MYPOINT') }}"><span>My Points</span></a>
        </li>
        <li class="menu">
            <a href="{{ url('member/logout') }}" class="btn btn-crimson btn-login">Logout</a>
        </li>
    </ul>
</div>
@endauth