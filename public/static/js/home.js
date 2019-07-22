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
});
