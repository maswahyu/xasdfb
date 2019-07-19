<div class="footer-top">

    <div class="container">

        <div class="row footer-top__row">

            <div class="footer-top__span">Stay Connected With {{ $siteInfo['site_name'] }}</div>

            <div class="footer-top__span">
                @if($siteInfo['contact_facebook'])
                <a class="btn-social" href="{{ $siteInfo['contact_facebook'] }}" alt="Facebook" }}>
                    <svg class="fb-icon btn-social__icon">
                        <use xlink:href="{{ asset('static/images/sprites.svg') }}#fb"></use>
                    </svg>
                </a>
                @endif
                @if($siteInfo['contact_twitter'])
                <a class="btn-social" href="{{ $siteInfo['contact_twitter'] }}" alt="Twitter">
                    <svg class="tw-icon btn-social__icon">
                        <use xlink:href="{{ asset('static/images/sprites.svg') }}#tw"></use>
                    </svg>
                </a>
                @endif
                @if($siteInfo['contact_instagram'])
                <a class="btn-social" href="{{ $siteInfo['contact_instagram'] }}" alt="Instagram">
                    <svg class="ig-icon btn-social__icon">
                        <use xlink:href="{{ asset('static/images/sprites.svg') }}#ig"></use>
                    </svg>
                </a>
                @endif
                @if($siteInfo['contact_youtube'])
                <a class="btn-social" href="{{ $siteInfo['contact_youtube'] }}" alt="Youtube">
                    <svg class="yt-icon btn-social__icon">
                        <use xlink:href="{{ asset('static/images/sprites.svg') }}#yt"></use>
                    </svg>
                </a>
                @endif
            </div>

            <div class="footer-top__span">
                <ul class="point-nav flex-justify-center">
                    <li class="point-nav__item"><a class="point-nav__link list__link--footer" href="{{ url('about-us') }}">About Us</a></li>
                    <li class="point-nav__item"><a class="point-nav__link list__link--footer" href="{{ url('terms-conditions') }}">Terms Conditions</a></li>
                    <li class="point-nav__item"><a class="point-nav__link list__link--footer" href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    <li class="point-nav__item"><a class="point-nav__link list__link--footer" href="{{ url('contact-us') }}">Contact Us</a></li>
                </ul>
            </div>

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
