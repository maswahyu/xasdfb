$(function ()
{

    $.ajax(window.feedSliderUrl, {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        if(typeof data === 'object'){
            var parsedData = data;
        }else{
            var parsedData = JSON.parse(data);
        }

        $.each(parsedData.data, function (index, value) {

            $html = `<div class="home-promo-slider__slide">
                <a href="` + value.url + `?utm_source=Banner&utm_medium=Content&utm_campaign=LazoneDetail" alt="` + value.title + `">
                    <img src="/img_placeholder_slider.webp" data-lazy="` + value.image + `" alt="` + value.title + `">
                </a>
            </div>`;

            $('.jsHomeSlider').append($html);

            $html = `<div class="home-promo-slider__slide">
                <a href="` + value.url + `?utm_source=Banner&utm_medium=Content&utm_campaign=LazoneDetail" alt="` + value.title + `">
                    <img src="/img_placeholder_point.webp" data-lazy="` + (value.mobile_image ? value.mobile_image : '/img_placeholder_point.webp') + `" alt="` + value.title + `">
                </a>
            </div>`;

            $('.jsHomeMobileSlider').append($html);
        });

        $('.jsHomeSlider').slick({
            nextArrow: '<button type="button" class="home-slider-nav next"></button>',
            prevArrow: '<button type="button" class="home-slider-nav prev"></button>',
            dots: true,
            adaptiveHeight: true,
            lazyLoad: 'anticipated'
        });

        $('.jsHomeMobileSlider').slick({
            nextArrow: '<button type="button" class="home-slider-nav next"></button>',
            prevArrow: '<button type="button" class="home-slider-nav prev"></button>',
            dots: true,
            adaptiveHeight: true,
            lazyLoad: 'anticipated'
        });

    });

    $.ajax(window.siteUrl + '/feed-highlight', {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        var parsedData = data
        var template = Handlebars.compile(document.getElementById("x-highlight-template").innerHTML)

        $('.jsHighlights').append(template(parsedData.data));

        $('.post-card__img').Lazy({
            effect: 'fadeIn',
            visibleOnly: true
        });

    });

    $.ajax(window.siteUrl + '/feed-mustread', {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        if(typeof data === 'object'){
            var parsedData = data;
        }else{
            var parsedData = JSON.parse(data);
        }

        var template = Handlebars.compile(document.getElementById("x-must-template").innerHTML)

        $.each(parsedData.data, function (index, value) {
            $('.jsMustRead').append(template(value));
        });

    });

    $.ajax(window.siteUrl + '/feed-recomended', {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        if(typeof data === 'object'){
            var parsedData = data;
        }else{
            var parsedData = JSON.parse(data);
        }

        var template = Handlebars.compile(document.getElementById("x-recomended-template").innerHTML)

        $.each(parsedData.data, function (index, value) {

            if (parsedData.auth) {
                value.utm = '?utm_source=Recommended&utm_medium=Login&utm_campaign=LazoneDetail'
            } else {
                value.utm = '?utm_source=Recommended&utm_medium=NotLogin&utm_campaign=LazoneDetail'
            }

            $('.jsRecomended').append(template(value));
        });

    });

    var currentPage = 1,
        articleList =
            new Hector_infinitePaginator({
                container: $('.jsArticleList'),
                trigger: $('.jsMoreArticle'),
                template: Handlebars.compile(document.getElementById("x-post-template").innerHTML),
                url: window.feedUrl,
                currentPage: currentPage,
                data: {},
            });

    $('.jsMoreArticle').trigger('click');

    var currentPage = 1,
        videoList =
            new Hector_infinitePaginator({
                container: $('.jsVideoList'),
                trigger: $('.jsMoreVideo'),
                template: Handlebars.compile(document.getElementById("x-video-template").innerHTML),
                url: window.feedVideoUrl,
                currentPage: currentPage,
                data: {},
            });

    $('.jsMoreVideo').trigger('click');

    var currentPage = 1,
        trendingList =
            new Hector_infinitePaginator({
                container: $('.jsTrendingList'),
                trigger: $('.jsMoreTrending'),
                template: Handlebars.compile(document.getElementById("x-trending-template").innerHTML),
                url: window.feedTrendingUrl,
                currentPage: currentPage,
                data: {},
            });

    $('.jsMoreTrending').trigger('click');
});
