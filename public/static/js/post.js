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
    function sendLogShare(channel, link)
    {
        if(isSend === false) {
            $.ajax({
                method: "POST",
                url: '/share-button-count',
                data:{
                    channel: channel,
                    post_id: p_id,
                    link: link
                },
                beforeSend: () => {
                    isSend = true;
                },
                success: (res, status) => {
                    isSend = false;
                    if(status == 'success') {
                        share_btn = $(`[data-share=${channel}]`);
                        share_btn.removeAttr('data-share');

                        ico = share_btn.siblings('span').find('img');
                        ico_src = ico.attr('src');
                        ico.attr('src', ico_src.replace('star', 'check'));

                        share_btn.siblings('span').html(ico[0].outerHTML);

                    }
                },
                error: (xhr) => {
                    isSend = false;
                    console.log(xhr);
                }
            })
        }
    }
    $("[data-share]").on('click', (e) => {
        e.preventDefault();
        const SHARE = $(e.currentTarget).data('share');
        const LINK = $(e.currentTarget).parent().parent().data('link');
        if( SHARE == SHARE_CHANNEL.facebook) { //facebook
            FB.ui({
                method: 'share',
                href: LINK,
            },
            function(response) {
                if (response && !response.error_code) {
                    sendLogShare(SHARE_CHANNEL.facebook, LINK);
                }
            });
        } else if( SHARE == SHARE_CHANNEL.twitter) { //twitter
            twttr.events.bind('tweet', (e) => {
                sendLogShare(SHARE_CHANNEL.twitter, LINK);
            });

        } else {
            window.open($(e.currentTarget).attr('href'));
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


    /**
     * Facebook connect social plugin
     */
     window.fbAsyncInit = function() {
        FB.init({
          appId      : FB_SHARE_ID,
          xfbml      : true,
          version    : 'v11.0'
        });
    };
     (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

    /**
     * Twitter widget javascript api
     */
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
          t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
          t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));

});
