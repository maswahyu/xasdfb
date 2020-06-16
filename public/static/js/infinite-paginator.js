function Hector_infinitePaginator(settings) {
    this.$container = settings.container;
    this.$trigger = settings.trigger;
    this.template = settings.template;
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
