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
                                <a href="{{ url($item->slug) }}" class="dropdown-menu__dropdown-link {{ classActiveSegment(1, $item->slug) }}"><span>{{ $item->name }}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown-menu__item dropdown-menu__item--has-submenu">
                    <a href="#" class="dropdown-menu__link">Community</a>
                    <ul class="dropdown-menu__dropdown">
                        <li class="dropdown-menu__dropdown-item">
                            <a href="#" class="dropdown-menu__dropdown-link"><span>LA Indie Movie</span></a>
                        </li>
                        <li class="dropdown-menu__dropdown-item">
                            <a href="#" class="dropdown-menu__dropdown-link"><span>LA Streetball</span></a>
                        </li>
                        <li class="dropdown-menu__dropdown-item">
                            <a href="#" class="dropdown-menu__dropdown-link"><span>Iceperience</span></a>
                        </li>
                        <li class="dropdown-menu__dropdown-item">
                            <a href="#" class="dropdown-menu__dropdown-link"><span>Boldxperience</span></a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-menu__item">
                    <a href="#" class="dropdown-menu__link">Events</a>
                </li>
                <li class="dropdown-menu__item">
                    <a href="#" class="dropdown-menu__link">Gallery</a>
                </li>
                <li class="dropdown-menu__item">
                    <a href="#" class="dropdown-menu__link">What is My Points?</a>
                </li>
                <li class="dropdown-menu__item dropdown-menu__item--search">
                    <a href="#" class="dropdown-menu__link jsSearchTrigger">
                        <img src="{{ asset('static/images/search.png') }}" alt="">
                    </a>
                </li>
                <li class="dropdown-menu__item">
                    <a href="#" class="dropdown-menu__link">Pick your interest</a>
                </li>
                <li class="dropdown-menu__item dropdown-menu__item--login">
                    <a href="#" class="btn btn-crimson btn-login">Login</a>
                </li>
            </ul>
        </nav>

        <div class="search-form">
            <div class="container">
                <div class="row">
                    <div class="span-6 off-3 position-relative">
                        <form class="form" action="">
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
