<div class="container">

    <div class="row">

        <a href="{{ url('/')}}" class="site-logo">
            <img src="{{ asset('static/images/logo.png') }}" alt="LA-ZONE.id">
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
                        <img src="{{ asset('static/images/search.png') }}" alt="">
                    </a>
                </li>
                <li class="dropdown-menu__item">
                    <a href="{{ url('interest') }}" class="dropdown-menu__link" alt="Interest">Pick your interest</a>
                </li>
                <li class="dropdown-menu__item dropdown-menu__item--login">
                    <a href="{{ url('member/login') }}" class="btn btn-crimson btn-login" alt="Login">Login</a>
                </li>
            </ul>
        </nav>

        <div class="search-form">
            <div class="container">
                <div class="row">
                    <div class="span-6 off-3 position-relative">
                        <form class="form" action="{{ url('search') }}" method="get">
                            <input type="search" name="search" class="search-input form-control">
                            <button type="submit" class="search-btn-icon">
                                <img src="{{ asset('static/images/search-black.png') }}" alt="">
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
