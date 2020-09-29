@section('inside-head')
@parent
<style>
    #stickyBannerContainer #stickyBanner > div {
        margin: 0 auto;
        position: relative;
    }
    #stickyBannerContainer #stickyBanner.placement img {
        width: 100%;
    }
    @media (min-width: 1024px) {
        #stickyBanner .show-mobile {
            display: none !important;
        }
        #stickyBanner .hide-mobile {
            display: block !important;
        }
        .site-content.sticky-banner {
            padding-top: 0px;
        }
        #stickyBannerContainer .sticky #stickyBanner.placement {
            margin: 10px 0;
        }
        .footer-sticky-banner #stickyBanner.placement {
            margin-top: 2rem;
            margin-bottom: 0;
        }

    }
    @media (max-width: 1024px) {
        #stickyBanner .show-mobile {
            display: block !important;
        }
        #stickyBanner .hide-mobile {
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
    }

</style>
@endsection
<div class="container stickyBanner" style="{{ (isset($bannerWifi) && $bannerWifi ? 'display:none;' : '') }}">
    <div class="placement" id="stickyBanner">
        <div>
            <a @if(!empty($stickyBanner->cta)) href="{{$stickyBanner->cta}}" @endif>
                <img class="placement__img post-card__img hide-mobile" alt="lazone id" src="{!! url($stickyBanner->getImage()) !!}" />
                <img class="placement__img post-card__img show-mobile" alt="lazone id" src="{!! url($stickyBanner->getImage('mobile_image')) !!}" />
            </a>
        </div>
    </div>
</div>

@section('before-body-end')
@parent
<script>
    $(".site-content").addClass('sticky-banner');

    window.onscroll = function() {myFunction()};

    const stickyBanner = document.getElementsByClassName("stickyBanner");
    const sticky = $(".stickyBanner").offset().top > 0 ? $(".stickyBanner").offset().top : $("#bannerWifi").offset().top;
    const webFooter = $(".site-footer").offset().top;
    const footerHeight = $(".site-footer").innerHeight();


    function myFunction() {
        var top_of_element = $(".footer-sticky-banner").offset().top;
        var bottom_of_element = $(".footer-sticky-banner").offset().top + $(".footer-sticky-banner").outerHeight();
        var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
        var top_of_screen = $(window).scrollTop();
        if((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
            console.log('stop')
            $(".stickyBanner").removeClass('sticky').appendTo(".footer-sticky-banner");
        } else if( window.pageYOffset >= sticky) {
                console.log('sticky');
            if($("#bannerWifi").length > 0) {
                $(".stickyBanner").addClass("sticky").css({
                    'display': 'block'
                });
            } else {
                $(".stickyBanner").addClass("sticky");
            }
        } else {
            console.log('masasing');
            if($(".footer-sticky-banner .stickyBanner").length == 0) {
                console.log('here');
                if($("#bannerWifi").length > 0) {
                    $(".stickyBanner").removeClass("sticky").css({
                        'display':'none'
                    });
                } else {
                    $(".stickyBanner").removeClass("sticky");
                }
                return;
            } else {
                if($("#bannerWifi").length > 0) {
                    console.log('lebih besar');
                    $(".stickyBanner").removeClass("sticky").css({
                        'display': 'none'
                    }).prependTo(".site-content.sticky-banner");
                } else {
                    console.log('asas');
                    $(".stickyBanner").removeClass("sticky").prependTo("#stickyBannerContainer");
                }
            }
        }
    }


</script>
@endsection
