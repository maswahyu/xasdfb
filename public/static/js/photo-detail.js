$(function ()
{

    $('.jsPhotoSlider').slick({
        arrows: true,
        dots: false,
        asNavFor: '.jsPhotoNav',
        slidesToShow: 1,
        nextArrow: '<button type="button" class="slick-next slick-arrow-crimson"><span class="arrow-left"></span></button>',
        prevArrow: '<button type="button" class="slick-prev slick-arrow-crimson"><span class="arrow-right"></span></button>'
    });

    $('.jsPhotoNav').slick({
        arrows: true,
        dots: false,
        variableWidth: true,
        asNavFor: '.jsPhotoSlider',
        focusOnSelect: true,
        nextArrow: '<button type="button" class="slick-next slick-arrow-white"><span class="arrow-left"></span></button>',
        prevArrow: '<button type="button" class="slick-prev slick-arrow-white"><span class="arrow-right"></span></button>'
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
