$(function ()
{

    $('.jsHomeSlider').slick({
        nextArrow: '<button type="button" class="home-slider-nav next"></button>',
        prevArrow: '<button type="button" class="home-slider-nav prev"></button>',
        dots: true,
        adaptiveHeight: true,
        lazyLoad: 'anticipated'
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
