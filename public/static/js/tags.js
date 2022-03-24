$(function ()
{
    var currentPage = 2,
        articleList =
        new Hector_infinitePaginator({
            container: $('.jsArticleList'),
            trigger: $('.jsMoreArticle'),
            template: Handlebars.compile(document.getElementById("x-post-template").innerHTML),
            url: window.feedUrl,
            currentPage: currentPage,
            data: {},
        });

    // $('.jsMoreArticle').trigger('click');

});
