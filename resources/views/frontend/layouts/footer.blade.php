<div class="footer-top">

    <div class="container">

        <div class="row footer-top__row">

            <div class="footer-top__span">
                <picture>
                    <source srcset="{{ asset('static/images/logo-2.webp') }}" type="image/webp">
                    <img width="80" height="63" src="{{ asset('static/images/logo-2.png') }}" alt="LAZONE.id" class="footer-logo">
                </picture>
                <ul class="point-nav">
                    {{-- <li class="point-nav__item"><a class="text-white point-nav__link list__link--footer" href="{{ url('about-us') }}">About Us</a></li> --}}
                    <li class="point-nav__item"><a class="text-white point-nav__link list__link--footer" href="{{ url('contact-us') }}">Contact Us</a></li>
                    <li class="point-nav__item"><a class="text-white point-nav__link list__link--footer" href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    <li class="point-nav__item"><a class="text-white point-nav__link list__link--footer" href="{{ url('terms-conditions') }}">Terms Of Service</a></li>
                </ul>
            </div>

            <div class="footer-top__span flex-align-center">
                <p class="footer-text-desc">
                    Stay Connected <br> With {{ $siteInfo['site_name'] }}
                </p>

                <div>
                    @if($siteInfo['contact_facebook'])
                    <a class="btn-social" href="{{ $siteInfo['contact_facebook'] }}" alt="Facebook" }}>
                        {{-- <svg class="fb-icon btn-social__icon">
                            <use xlink:href="{{ asset('static/images/new-icon/sprites.svg') }}#fb"></use>
                        </svg> --}}
                        <img width="40" height="40" src="{{ asset('static/images/new-icon/fb.png') }}" alt="" class="lazy yt-icon btn-social__icon">
                    </a>
                    @endif
                    @if($siteInfo['contact_twitter'])
                    <a class="btn-social" href="{{ $siteInfo['contact_twitter'] }}" alt="Twitter">
                        {{-- <svg class="tw-icon btn-social__icon">
                            <use xlink:href="{{ asset('static/images/new-icon/sprites.svg') }}#tw"></use>
                        </svg> --}}
                        <img width="40" height="40" src="{{ asset('static/images/new-icon/twitter.png') }}" alt="" class="lazy yt-icon btn-social__icon">
                    </a>
                    @endif
                    @if($siteInfo['contact_instagram'])
                    <a class="btn-social" href="{{ $siteInfo['contact_instagram'] }}" alt="Instagram">
                        {{-- <svg class="ig-icon btn-social__icon">
                            <use xlink:href="{{ asset('static/images/new-icon/sprites.svg') }}#ig"></use>
                        </svg> --}}
                        <img width="40" height="40" src="{{ asset('static/images/new-icon/ig.png') }}" alt="" class="lazy yt-icon btn-social__icon">
                    </a>
                    @endif
                    @if($siteInfo['contact_youtube'])
                    <a class="btn-social" href="{{ $siteInfo['contact_youtube'] }}" alt="Youtube">
                        {{-- <svg class="yt-icon btn-social__icon">
                            <use xlink:href="{{ asset('static/images/new-icon/sprites.svg') }}#yt"></use>
                        </svg> --}}
                        <img width="40" height="40" src="{{ asset('static/images/new-icon/youtube.png') }}" alt="" class="lazy yt-icon btn-social__icon">
                    </a>
                    @endif
                </div>
            </div>

            {{-- <div class="footer-top__span">
            </div> --}}

        </div>

    </div>

</div>

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="span-12">
                WEBSITE INI HANYA DIPERUNTUKKAN BAGI ANDA YANG SUDAH BERUSIA 18 TAHUN | COPYRIGHT&copy;LAZONE.ID,{{ date('Y') }}
                ALL RIGHT RESERVED
            </div>
        </div>
    </div>
</div>


<div class="floating-game-btn">
    <a class="btn-link" href="{{ route('game-index') }}">
        <img width="145" height="151" class="lazy link-image" src="{{ asset('static/images/play-game.png') }}" alt="PLAY GAME" srcset="{{ asset('static/images/play-game.png') }} 1x, {{ asset('static/images/play-game@2x.png') }} 2x">
        <span class="d-none">PLAY GAME</span>
    </a>
    <button class="btn-close">
        <img width="22" height="22" src="{{ asset('static/images/play-game-btn-close.png') }}" alt="close" class="lazy close-btn-image">
    </button>
</div>
