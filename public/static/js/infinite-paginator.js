function Hector_infinitePaginator(settings) {
    this.$container = settings.container;
    this.$trigger = settings.trigger;
    this.template = settings.template;
    this.showBanner = typeof settings.showBanner != 'undefined' ? settings.showBanner : 0;
    this.banner_image = typeof settings.banner_image != 'undefined' ? settings.banner_image : '';
    this.banner_url = typeof settings.banner_url != 'undefined' ? settings.banner_url : '';
    this.url = settings.url;
    this.currentPage = settings.currentPage;
    this.data = settings.data;
    this.init();
}

Hector_infinitePaginator.prototype = {

    init: function () {
        var self = this;
        this.$trigger.on('click', function (e) {
            e.preventDefault();
            self.getFeed();
        });
    },

    getFeed: function () {
        var self = this;

        var ajax = $.ajax(self.url, {
            data: Object.assign({
                'page': self.currentPage,
            }, self.data)
        }).done(function (data) {

            if(typeof data === 'object'){
                var parsedData = data;
            }else{
                var parsedData = JSON.parse(data);
            }

            $.each(parsedData.data, function (index, value) {
                self.$container.append(self.template(value));
                if (self.showBanner && index == 4) {
                    $ads = `<div class="post-card post-card--wide post-card--wide__with-padding">
                    <div class="post-card__ads-container">
                        <a href="`+ self.banner_url +`?utm_source=AdsHome" alt="">
                            <img class="post-card__ads" src="`+ self.banner_image +`" alt="">
                        </a>
                    </div></div>`;

                    self.$container.append($ads);
                }
            });


            self.currentPage++;

            if(parsedData.total_page < self.currentPage){
                self.$trigger.hide();
            }

            $('.post-card__img').Lazy({
                effect: 'fadeIn',
                visibleOnly: true
            });
        }).always(function () {

        });
        return ajax;
    },

    setData: function(key,value) {
        this.data['key'] = value;
    }
};
