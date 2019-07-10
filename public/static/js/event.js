$(function ()
{

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

    var upcomingEventPage = 1,
        upcomingList =
            new Hector_infinitePaginator({
                container: $('.jsEventList'),
                trigger: $('.jsMoreEvent'),
                template: Handlebars.compile(document.getElementById("x-event-template").innerHTML),
                url: window.upcomingEventUrl,
                currentPage: upcomingEventPage,
                data: {},
            });

    $('.jsMoreEvent').trigger('click');
    
});
