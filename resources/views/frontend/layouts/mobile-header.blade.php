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
                    <form class="form" action="">
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
                        <span class="user-info__name"><strong>John Doe</strong></span>
                        <span class="user-info__point"><span>7.000 pts</span></span>
                    </div>
                </li>
                <li class="menu">
                    <a href="#"><span>My Profile</span></a>
                </li>
                <li class="menu">
                    <a href="#"><span>My Points</span></a>
                </li>
                <li class="menu">
                    <a href="#"><span>Logout</span></a>
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
                        <li>
                            <a href="#">Lifestyle</a>
                        </li>
                        <li>
                            <a href="#">Entertaiment</a>
                        </li>
                        <li>
                            <a href="#">Inspiration</a>
                        </li>
                        <li>
                            <a href="#">Lensa</a>
                        </li>
                        <li>
                            <a href="#">Sneakerland</a>
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
                            <li>
                                <a href="#">LA Indie Movie</a>
                            </li>
                            <li>
                                <a href="#">LA Streetball</a>
                            </li>
                            <li>
                                <a href="#">Iceperience</a>
                            </li>
                            <li>
                                <a href="#">Boldxperience</a>
                            </li>
                        </ul>
                    </a>
                </li>
                <li class="menu">
                    <a href="#">
                        Events
                    </a>
                </li>
                <li class="menu">
                    <a href="#">
                        Gallery
                    </a>
                </li>
                <li class="menu">
                    <a href="#">
                        What is My Points?
                    </a>
                </li>
                <li class="menu">
                    <a href="#">
                        Pick your interest
                    </a>
                </li>
                <li class="menu">
                    <a href="#" class="btn btn-crimson btn-login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
