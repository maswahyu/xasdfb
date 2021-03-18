$(function ()
{
    $('iframe[src*="youtube"]').each(function ()
    {
        var $this = $(this);
        $this.wrap('<div class="video-wrapper"></div>');
        $this.parent().fitVids();
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(function (){
        $.ajax({
            method: "POST",
            url: '/p/collect/' + p_id,
            dataType : 'json',
            success: function(t) {

            }
        });
    }, 1000);

    $('#sidebar').stickySidebar({
        topSpacing: 80,
        resizeSensor: true,
    });

    $('.jsMobileRelatedList').slick({
        dots: false,
        lazyLoad: 'anticipated',
        centerMode: true,
        centerPadding: '30px',
        slidesToShow: 1,
        variableWidth: true
    });
});
