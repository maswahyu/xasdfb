@section('inside-head')
@parent
<style>
    #bannerWifi > div {
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
    #bannerWifi.placement img {
        width: 100%;
    }
    @media (min-width: 1024px) {
        .site-content.wifi {
            padding-top: 0px;
        }
        #bannerWifi.placement {
        }


    }

    @media (max-width: 1024px) {
        #bannerWifi.placement {
            margin-top: 0;
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
<div class="container">
    <div class="placement" id="bannerWifi">
        <div>
            <a @if(!empty($bannerWifi->cta)) href="{{$bannerWifi->cta}}" @endif>
                <picture>
                    <source media="(min-width: 756px)" srcset="{!! $bannerWifi->getImage() !!}">
                    <img class="placement__img post-card__img" src="{!! $bannerWifi->getImage('mobile_image') !!}" alt="" style="">
                </picture>
            </a>
            <span class="btn-close"></span>
        </div>
    </div>
</div>

@section('before-body-end')
@parent

<script>
    $(".site-content").addClass('wifi');
    $("#bannerWifi .btn-close").click(function(){
        $("#bannerWifi").parent().remove();
        if($(".stickyBanner").length > 0) {
            $(".stickyBanner").css({
                'display':'block'
            });
        }

    });
</script>
@endsection
