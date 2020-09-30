<div class="container stickyBanner {{ (isset($fixed) && $fixed ? 'sticky fixed' : '') }}" style="{{ (isset($bannerWifi) && $bannerWifi ? 'display:none;' : '') }}">
    <div class="placement" id="stickyBanner">
        <div>
            <a @if(!empty($stickyBanner->cta)) href="{{$stickyBanner->cta}}" @endif>
                <img class="placement__img post-card__img hide-mobile" alt="lazone id" src="{!! url($stickyBanner->getImage()) !!}" />
                <img class="placement__img post-card__img show-mobile" alt="lazone id" src="{!! url($stickyBanner->getImage('mobile_image')) !!}" />
            </a>
        </div>
    </div>
</div>
