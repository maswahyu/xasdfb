<div class="mobile-header">

    <button class="mobile-menu-trigger hamburger hamburger--slider" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>

    <a href="{{ url('/')}}" class="site-logo">
        <img src="{{ asset('static/images/logo.png') }}" alt="LA-ZONE.id">
    </a>

</div>

<nav class="mobile-nav">
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
                @auth
                <li class="menu">
                    <div class="user-info">
                        <span><img class="user-info__avatar" src="{{ asset('static/images/avatar.png') }}" alt="User Avatar"></span>
                        <span class="user-info__name"><strong>{{ auth()->user()->name }}</strong></span>
                        <span class="user-info__point"><span>{{ seribu(auth()->user()->total_point) }} pts</span></span>
                    </div>
                </li>
                <li class="menu">
                    <a href="https://{{ env('CAS_HOSTNAME') }}/profile/?service={{ url('/') }}"><span>My Profile</span></a>
                </li>
                <li class="menu">
                    <a href="{{ env('URL_MYPOINT') }}"><span>My Points</span></a>
                </li>
                <li class="menu">
                    <a href="{{ url('member/logout') }}"><span>Logout</span></a>
                </li>
                @endauth

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
