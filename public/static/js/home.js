$(function ()
{

    $('#shoutbox').stickySidebar({
        topSpacing: 40,
        resizeSensor: true,
    });

    $.ajax(window.feedSliderUrl, {
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

            $html = `<div class="home-promo-slider__slide">
                <a href="` + value.url + `?utm_source=Banner&utm_medium=Content&utm_campaign=LazoneDetail" alt="` + value.title + `">
                    <img src="/img_placeholder_slider.jpg" data-lazy="` + value.image + `" alt="` + value.title + `">
                </a>
            </div>`;

            $('.jsHomeSlider').append($html);

            $html = `<div class="home-promo-slider__slide">
                <a href="` + value.url + `?utm_source=Banner&utm_medium=Content&utm_campaign=LazoneDetail" alt="` + value.title + `">
                    <img src="/img_placeholder_point.jpg" data-lazy="` + (value.mobile_image ? value.mobile_image : '/img_placeholder_point.jpg') + `" alt="` + value.title + `">
                </a>
            </div>`;

            $('.jsHomeMobileSlider').append($html);
        });

        $('.jsHomeSlider').slick({
            nextArrow: '<button type="button" class="home-slider-nav next"></button>',
            prevArrow: '<button type="button" class="home-slider-nav prev"></button>',
            dots: true,
            adaptiveHeight: true,
            lazyLoad: 'anticipated'
        });

        $('.jsHomeMobileSlider').slick({
            nextArrow: '<button type="button" class="home-slider-nav next"></button>',
            prevArrow: '<button type="button" class="home-slider-nav prev"></button>',
            dots: true,
            adaptiveHeight: true,
            lazyLoad: 'anticipated'
        });

    });

    $.ajax(window.siteUrl + '/feed-highlight', {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        var parsedData = data
        var template = Handlebars.compile(document.getElementById("x-highlight-template").innerHTML)

        $('.jsHighlights').append(template(parsedData.data));

        $('.post-card__img').Lazy({
            effect: 'fadeIn',
            visibleOnly: true
        });

    });

    $.ajax(window.siteUrl + '/feed-mustread', {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        if(typeof data === 'object'){
            var parsedData = data;
        }else{
            var parsedData = JSON.parse(data);
        }

        var template = Handlebars.compile(document.getElementById("x-must-template").innerHTML)

        $.each(parsedData.data, function (index, value) {

            if (index >= 4) {
                return
            }
            
            $('.jsMustRead').append(template(value));
        });

    });

    $.ajax(window.siteUrl + '/feed-recomended', {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        if(typeof data === 'object'){
            var parsedData = data;
        }else{
            var parsedData = JSON.parse(data);
        }

        var template = Handlebars.compile(document.getElementById("x-recomended-template").innerHTML)

        $.each(parsedData.data, function (index, value) {

            if (index >= 4) {
                return
            }
            
            if (parsedData.auth) {
                value.utm = '?utm_source=Recommended&utm_medium=Login&utm_campaign=LazoneDetail'
            } else {
                value.utm = '?utm_source=Recommended&utm_medium=NotLogin&utm_campaign=LazoneDetail'
            }

            $('.jsRecomended').append(template(value));
        });

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

    $.ajax(window.siteUrl + '/feed-home', {
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

            if (index >= 8) {
                return
            }

            $html = `<div class="post-card post-card--wide post-card--wide__with-padding">

                        <div class="post-card__thumbnail">
                            <a href="` + value.url + `">
                                <img class="post-card__img" data-src="` + value.thumbnail + `" alt="` + value.title + `">
                            </a>
                        </div>
                
                        <div class="post-card__info">
                
                            <a href="` + value.url + `" alt="` + value.title + `">
                                <div class="post-card__title post-card__title--large">
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
                
                    </div>`;

            $('.jsArticleList').append($html);

            $('.jsMoreArticle').on('click', function() {
                $html = `<div class="post-card post-card--wide post-card--wide__with-padding">

                                <div class="post-card__thumbnail">
                                    <a href="` + value.url + `">
                                        <img class="post-card__img" data-src="` + value.thumbnail + `" alt="` + value.title + `">
                                    </a>
                                </div>
                        
                                <div class="post-card__info">
                        
                                    <a href="` + value.url + `" alt="` + value.title + `">
                                        <div class="post-card__title post-card__title--large">
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
                        
                            </div>`;
                $('.jsArticleList').append($html);
            });
            
            /* Ads container ~sample image~ */
            $ads = `<div class="post-card__ads-container">
                        <img class="post-card__ads" src="` + siteUrl + `/static/images/mock/ads_new2.jpg" alt="">
                    </div>`;
            var adsContainer = document.querySelector(".jsArticleList .post-card--wide__with-padding:nth-child(6)")
            console.log(value.thumbnail);
            $(adsContainer).html($ads);
        });
    });

    $.ajax(window.siteUrl + '/feed-home', {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        console.log(data)

        if(typeof data === 'object'){
            var parsedData = data;
        }else{
            var parsedData = JSON.parse(data);
        }

        $.each(parsedData.data, function (index, value) {

            if (index >= 5) {
                return
            }

            $html = `<div class="post-card post-card--wide post-card--wide__with-padding">

                        <div class="post-card__thumbnail">
                            <a href="` + value.url + `">
                                <img class="post-card__img" data-src="` + value.thumbnail + `" alt="` + value.title + `">
                            </a>
                        </div>
                
                        <div class="post-card__info">
                
                            <a href="` + value.url + `" alt="` + value.title + `">
                                <div class="post-card__title post-card__title--large">
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
                
                    </div>`;

            $('.jsMobileArticleList').append($html);

            $('.jsMoreArticle').on('click', function() {
                $html = `<div class="post-card post-card--wide post-card--wide__with-padding">

                        <div class="post-card__thumbnail">
                            <a href="` + value.url + `">
                                <img class="post-card__img" data-src="` + value.thumbnail + `" alt="` + value.title + `">
                            </a>
                        </div>
                
                        <div class="post-card__info">
                
                            <a href="` + value.url + `" alt="` + value.title + `">
                                <div class="post-card__title post-card__title--large">
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
                
                    </div>`;

                $('.jsMobileArticleList').append($html);
            });
        });
    });

    $('.jsMoreArticle').trigger('click');

    var currentPage = 1,
        videoList =
            new Hector_infinitePaginator({
                container: $('.jsVideoList'),
                trigger: $('.jsMoreVideo'),
                template: Handlebars.compile(document.getElementById("x-video-template").innerHTML),
                url: window.feedVideoUrl,
                currentPage: currentPage,
                data: {},
            });

    $.ajax(window.feedVideoUrl, {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        console.log(data)

        if(typeof data === 'object'){
            var parsedData = data;
        }else{
            var parsedData = JSON.parse(data);
        }



        $.each(parsedData.data, function (index, value) {

            /* $html = `<div class="home-promo-slider__slide">
                <a href="` + value.url + `?utm_source=Banner&utm_medium=Content&utm_campaign=LazoneDetail" alt="` + value.title + `">
                    <img src="/img_placeholder_point.jpg" data-lazy="` + (value.mobile_image ? value.mobile_image : '/img_placeholder_point.jpg') + `" alt="` + value.title + `">
                </a>
            </div>`;

            $('.jsVideoMobileSlider').append($html); */

            $html = `<div><div class="post-card post-card--video" style="width: 235px !important; min-height: 314px; margin: 0 1rem;">

                        <div class="post-card__thumbnail post-card__thumbnail--video">
                    
                            <img class="post-card__img post-card__img--video" src="/img_placeholder_point.jpg" data-src="https://img.youtube.com/vi/` + value.youtube_id + `/hqdefault.jpg" alt="` + value.title_limit + `">
                    
                            <a href="` + value.url + `" alt="` + value.title_limit + `">
                                <div class="post-card__overlay"></div>
                    
                                <div class="post-card__vid-play">
                                    <svg class="svg-vid-play">
                                        <use xlink:href="/static/images/sprites.svg#vid-play"></use>
                                    </svg>
                                </div>
                    
                                <div class="post-card__frame">
                                    <svg class="svg-video-frame">
                                        <use xlink:href="/static/images/sprites.svg#video-frame"></use>
                                    </svg>
                                </div>
                    
                                <div class="post-card__time"><span>` + value.duration + `</span></div>
                            </a>
                        </div>
                    
                        <div class="post-card__meta post-meta">
                    
                            <div class="post-meta__category">
                                <a href="/gallery/video" alt="` + value.category + `">
                                    <span>` + value.category + `</span>
                                </a>
                            </div>
                    
                        </div>
                    
                        <div class="post-card__meta post-meta">
                    
                            <div class="post-meta__stat"><span>` + value.published_date + `</span></div>
                            <div class="post-meta__stat"><span>` + value.view_count + ` views</span></div>
                    
                        </div>
                    
                        <a href="` + value.url + `" alt="` + value.title_limit + `">
                            <div class="post-card__title">
                                <span>` + value.title_limit + `</span>
                            </div>
                        </a>
                    </div></div>`;

            $('.jsVideoMobileSlider').append($html);
        });

        $('.jsVideoMobileSlider').slick({
            dots: false,
            lazyLoad: 'anticipated',
            centerMode: true,
            centerPadding: '30px',
            slidesToShow: 1,
            variableWidth: true
        });

    });

    $('.jsMoreVideo').trigger('click');

    var currentPage = 1,
        trendingList =
            new Hector_infinitePaginator({
                container: $('.jsTrendingList'),
                trigger: $('.jsMoreTrending'),
                template: Handlebars.compile(document.getElementById("x-trending-template").innerHTML),
                url: window.feedTrendingUrl,
                currentPage: currentPage,
                data: {},
            });

    $('.jsMoreTrending').trigger('click');

    $.ajax(window.feedTrendingUrl, {
        data: Object.assign({
            'page': 1,
        }, {})
    }).done(function (data) {

        console.log(data)

        if(typeof data === 'object'){
            var parsedData = data;
        }else{
            var parsedData = JSON.parse(data);
        }

        $.each(parsedData.data, function (index, value) {

            $html = `<div><div class="post-card post-card--simple post-card--simple__max-height" style="max-width: 235px !important; margin: 0 1.6rem;">
                        <div class="post-card__thumbnail">
                            <a href="` + value.url + `?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="` + value.title + `">
                                <img class="post-card__img" src="img_placeholder_point.jpg" data-src="` + value.thumbnail + `" alt="` + value.title + `">
                            </a>
                        </div>
                        
                        <div class="post-card__info">
                            
                            <a href="` + value.url + `?utm_source=Trending&utm_medium=Content&utm_campaign=LazoneDetail" alt="` + value.title + `">
                                <div class="post-card__title">
                                    <span>` + value.title + `</span>
                                </div>
                            </a>
                
                            <div class="post-card__meta post-meta">

                                <div class="post-meta__category">
                                    <a href="` + value.category_url + `" alt="` + value.category + `">
                                        <span>` + value.category + `</span>
                                    </a>
                                </div>
                                <div class="post-meta__stat"><span>` + value.view_count + ` Views</span></div>
                    
                            </div>
                    
                        </div>
                    </div></div>`;

            $('.jsMobileTrendingList').append($html);
        });

        $('.jsMobileTrendingList').slick({
            dots: false,
            lazyLoad: 'anticipated',
            centerMode: true,
            centerPadding: '30px',
            slidesToShow: 1,
            variableWidth: true
        });
    });
});
