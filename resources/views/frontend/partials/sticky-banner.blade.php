@section('inside-head')
@parent
<style>
    #stickyBanner > div {
        margin: 0 auto;
        position: relative;
    }
    .btn-close {
        color: #ee3b3e;
        position: absolute;
        font-weight: bold;
        top: 0;
        right: 0px;
        padding: 5px;
        background: #fff;
        cursor: pointer;
    }
    .btn-close::after {
        font-size: 2.5rem;
        content: 'x';
        position: relative;
        line-height: 0;
    }
    #stickyBanner.placement img {
        width: 100%;
    }
    @media (min-width: 1024px) {
        .show-mobile {
            display: none !important;
        }
        .hide-mobile {
            display: block !important;
        }
        .site-content.sticky-banner {
            padding-top: 0px;
        }
        .sticky #stickyBanner.placement {
            margin: 10px 0;
        }
        .footer-sticky-banner #stickyBanner.placement {
            margin-top: 2rem;
            margin-bottom: 0;
        }

    }
    @media (max-width: 1024px) {
        .show-mobile {
            display: block !important;
        }
        .hide-mobile {
            display: none !important;
        }
        #stickyBanner.placement {
            margin-top: 0;
            margin-bottom: 2rem;
        }
        .footer-sticky-banner #stickyBanner.placement {
            margin-top: 2rem;
            margin-bottom: 0;
        }
        .btn-close {
            color: #ee3b3e;
            position: absolute;
            font-weight: bold;
            top: 2px;
            right: 2px;
            padding: 5px;
            background: #fff;
        }
        .btn-close::after {
            font-size: 1.5rem;
            content: 'x';
            position: relative;
        }
    }

</style>
@endsection
<div class="container stickyBanner" style="{{ (isset($bannerWifi) && $bannerWifi ? 'display:none;' : '') }}">
    <div class="placement" id="stickyBanner">
        <div>
            <a @if(!empty($stickyBanner->cta)) href="{{$stickyBanner->cta}}" @endif>
                <img class="placement__img post-card__img hide-mobile" alt="lazone id" src={{ $stickyBanner->getImage() }} />
                <img class="placement__img post-card__img show-mobile" alt="lazone id" src={{ $stickyBanner->getImage('mobile_image') }} />
            </a>
        </div>
    </div>
</div>

@section('before-body-end')
@parent

<script>
    $(".site-content").addClass('sticky-banner');
</script>
@endsection
