$(function ()
{

    $('.jsRewardsSlider').slick({
        arrows: true,
        dots: false,
        slidesToShow: 1,
        infinite: false,
        nextArrow: '<button type="button" class="slick-next slick-arrow-crimson"><span class="arrow-left"></span></button>',
        prevArrow: '<button type="button" class="slick-prev slick-arrow-crimson"><span class="arrow-right"></span></button>',
        mobileFirst: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                },
            },
        ]
    });

    $('.jsRewardSingleSlider').slick({
        arrows: true,
        dots: false,
        slidesToShow: 1,
        infinite: false,
        nextArrow: '<button type="button" class="slick-next slick-arrow-crimson"><span class="arrow-left"></span></button>',
        prevArrow: '<button type="button" class="slick-prev slick-arrow-crimson"><span class="arrow-right"></span></button>',
        variableWidth: true,
        centerMode: true
       });


    // $('.jsPrizeSlider').slick({
    //     arrows: true,
    //     dots: false,
    //     slidesToShow: 1,
    //     infinite: false,
    //     nextArrow: '<button type="button" class="slick-next slick-arrow-crimson"><span class="arrow-left"></span></button>',
    //     prevArrow: '<button type="button" class="slick-prev slick-arrow-crimson"><span class="arrow-right"></span></button>',
    //     mobileFirst: true,
    //     responsive: [
    //         {
    //             breakpoint: 1199,
    //             settings: {
    //                 slidesToShow: 3,
    //             },
    //         },
    //     ]
    // });

    $('.jsPointTab li').on('click', function (e)
    {
        e.preventDefault();
        var $this = $(this),
            activeTab = $this.find('a').attr('href');
        $this.siblings().removeClass('active');
        $this.addClass('active');
        $('.how-to').removeClass('active');
        $(activeTab).addClass('active');
    });

    $('.jsPointTab li').first().trigger('click');


    $('.expand-collapsed').each(function ()
    {
        $(this).find('.expand-collapsed__content').slideUp(0);
    });

    $('.expand-collapsed__header').on('click', function (e)
    {
        e.preventDefault();
        var $this = $(this),
            $parent = $(this).parent(),
            $content = $(this).next();

        if ($parent.hasClass('active')) {
            $parent.removeClass('active');
            $content.slideUp();
            console.log('close');
        } else {
            $parent.addClass('active');
            $content.slideDown();
            console.log('open');
        }
    });

});
