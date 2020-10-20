<div class="container">

    <div class="row">

        <a href="{{ url('/')}}" class="site-logo">
            <picture>
                <source srcset="{{ asset('static/images/logo.webp') }}" type="image/webp">
                <img src="{{ asset('static/images/logo.png') }}" alt="LAZONE.id">
            </picture>
        </a>

        <nav role="navigation" id="primary-nav" class="dropdown-menu">
            <ul class="dropdown-menu__list">
                <li class="dropdown-menu__item dropdown-menu__item--has-submenu">
                    <a href="#" class="dropdown-menu__link">Articles</a>
                    <ul class="dropdown-menu__dropdown">
                        @foreach($siteCategory as $item)
                            <li class="dropdown-menu__dropdown-item">
                                <a href="{{ url($item->slug) }}" class="dropdown-menu__dropdown-link {{ classActiveSegment(1, $item->slug) }}" alt="{{ $item->name }}"><span>{{ $item->name }}</span></a>
                            </li>
                        @endforeach
                        <li class="dropdown-menu__dropdown-item">
                            <a href="{{ url('lensaphoto') }}" class="dropdown-menu__dropdown-link {{ classActiveSegment(1, 'lensaphoto') }}" alt="Lensa"><span>Lensa</span></a>
                        </li>
                        <li class="dropdown-menu__dropdown-item">
                            <a href="{{ url('sneakerland') }}" class="dropdown-menu__dropdown-link {{ classActiveSegment(1, 'sneakerland') }}" alt="Sneakerland"><span>Sneakerland</span></a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-menu__item dropdown-menu__item--has-submenu">
                    <a href="#" class="dropdown-menu__link">Community</a>
                    <ul class="dropdown-menu__dropdown">
                        @foreach($siteLink as $item)
                            <li class="dropdown-menu__dropdown-item">
                                <a href="{{ $item->url }}" target="_blank" class="dropdown-menu__dropdown-link" alt="{{ $item->name }}"><span>{{ $item->name }}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown-menu__item">
                    <a href="{{ url('events') }}" class="dropdown-menu__link" alt="Events">Events</a>
                </li>
                <li class="dropdown-menu__item">
                    <a href="{{ url('gallery') }}" class="dropdown-menu__link" alt="Gallery">Gallery</a>
                </li>
                <li class="dropdown-menu__item">
                    <a href="{{ url('points') }}" class="dropdown-menu__link" alt="Points">What is My Points?</a>
                </li>
                <li class="dropdown-menu__item dropdown-menu__item--search">
                    <a href="#" class="dropdown-menu__link jsSearchTrigger">
                        <picture>
                            <source srcset="{{ asset('static/images/search.webp') }}" type="image/webp">
                            <img src="{{ asset('static/images/search.png') }}" alt="Search">
                        </picture>
                    </a>
                </li>
                <li class="dropdown-menu__item">
                    <a href="{{ url('interest') }}" class="dropdown-menu__link" alt="Interest">Pick your interest</a>
                </li>
                @auth
                    <li class="dropdown-menu__item dropdown-menu__item--has-submenu dropdown-menu__item--user-menu jsUserMenu">
                        <span class="dropdown-menu__avatar">
                            <img src="{{ asset('static/images/avatar.png') }}" alt="User Avatar" class="avatar" id="avatar-desktop">
                        </span>
                        <ul class="dropdown-menu__dropdown dropdown-menu__dropdown--right">
                            <li class="dropdown-menu__dropdown-item">
                                <strong class="dropdown-menu__username">{{ str_limit(auth()->user()->name, 12) }}</strong>
                                <span class="dropdown-menu__dropdown-link dropdown-menu__dropdown-link--no-hover"><span id="loyalty_point"></span> pts</span>
                            </li>
                            <li class="dropdown-menu__separator">&nbsp;</li>
                            <li class="dropdown-menu__dropdown-item">
                                <a href="https://{{ config('cas.cas_hostname') }}/profile/?service={{ url('/') }}" class="dropdown-menu__dropdown-link" target="_blank"><span>My Profile</span></a>
                            </li>
                            <li class="dropdown-menu__dropdown-item">
                                <a href="{{ config('cas.url_mypoint') }}" class="dropdown-menu__dropdown-link" target="_blank"><span>My Points</span></a>
                            </li>
                            <li class="dropdown-menu__dropdown-item">
                                <a href="{{ url('member/logout') }}" class="dropdown-menu__dropdown-link"><span>Logout</span></a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown-menu__item dropdown-menu__item--login">
                        <a href="{{ url('member/login') }}" class="btn btn-crimson btn-login" alt="Login">Login</a>
                    </li>
                @endauth
            </ul>
        </nav>

        <div class="search-form">
            <div class="container">
                <div class="row">
                    <div class="span-6 off-3 position-relative">
                        <form class="form" action="{{ url('search') }}" method="get">
                            <input type="search" name="search" class="search-input form-control">
                            <button type="submit" class="search-btn-icon">
                                <picture>
                                    <source srcset="{{ asset('static/images/search-black.webp') }}" type="image/webp">
                                    <img src="{{ asset('static/images/search-black.png') }}" alt="">
                                </picture>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
