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

    $.ajax(window.siteUrl + '/feed', {
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

            if (index >= 5) {
                return
            }

            $html = `<div class="span-12 span-lg-4">
                        <div class="post-card post-card--simple post-card--simple__no-padding">
                            <div class="post-card__thumbnail">
                                <a href="` + value.url + `" alt="` + value.title + `">
                                    <img class="post-card__img" src="` + value.thumbnail + `" alt="">
                                </a>
                            </div>

                            <div class="post-card__info">

                                <a href="` + value.url + `" alt="` + value.title + `">
                                    <div class="post-card__title text-left">
                                        <span>` + value.title + `</span>
                                    </div>
                                </a>

                                <div class="post-card__meta post-meta">

                                    <div class="post-meta__category">
                                        <a href="` + value.category_url + `">
                                            <span>` + value.category + `</span>
                                        </a>
                                    </div>

                                    <div class="post-meta__stat"><span>` + value.published_date + `</span></div>

                                </div>

                            </div>
                        </div>
                    </div>`;

            $('.jsMobileMoreArticle').append($html);
        });

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
