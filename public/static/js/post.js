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

    $('#sidebar').stickySidebar({
        topSpacing: 80,
        resizeSensor: true,
    });

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

    var isSend = false;
    $("[data-share]").on('click', (e) => {
        if(isSend === false) {
            $.ajax({
                method: "POST",
                url: '/share-button-count',
                data:{
                    channel: $(e.currentTarget).data('share'),
                    post_id: p_id
                },
                beforeSend: () => {
                    isSend = true;
                },
                success: (res) => {
                    isSend = false;
                },
                error: (xhr) => {
                    isSend = false;
                    console.log(xhr);
                }
            })
        }
    })
});
