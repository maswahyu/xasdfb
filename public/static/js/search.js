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

    var videoPage = 1,
        articleList =
        new Hector_infinitePaginator({
            container: $('.jsVideoList'),
            trigger: $('.jsMoreVideo'),
            template: Handlebars.compile(document.getElementById("x-video-template").innerHTML),
            url: window.videoFeedUrl,
            currentPage: videoPage,
            data: {},
        });

    var photoPage = 1,
        articleList =
        new Hector_infinitePaginator({
            container: $('.jsPhotoList'),
            trigger: $('.jsMorePhoto'),
            template: Handlebars.compile(document.getElementById("x-photo-template").innerHTML),
            url: window.photoFeedUrl,
            currentPage: photoPage,
            data: {},
        });

    $('.jsTab li').on('click', function (e)
    {
        e.preventDefault();
        var $this = $(this),
            activeTab = $this.find('a').attr('href');

            $this.siblings().removeClass('active');
        $this.addClass('active');

        $('.search-result').removeClass('active');
        $(activeTab).addClass('active');

        if(activeTab === '#video-list' && videoPage === 1){
            $('.jsMoreVideo').trigger('click');
        }

        if(activeTab === '#photo-list' && videoPage === 1){
            $('.jsMorePhoto').trigger('click');
        }
    });

    $('.jsTab li').first().trigger('click');
});
