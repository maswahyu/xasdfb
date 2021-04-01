$(function ()
{

    $('#shoutbox').stickySidebar({
        topSpacing: 40,
        resizeSensor: true,
    });

    $('.jsHomeSlider').slick({
        arrows: false,
        dots: true,
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
