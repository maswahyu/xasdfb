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

    blockOpt: {
        message: '<div class="spinner">' +
            '<div class="double-bounce1"></div>' +
            '<div class="double-bounce2"></div>' +
            '</div>',
        css: {
            border: 'none',
            backgroundColor: 'transparent',
            margin: '0 0 0 0'
        },
        overlayCSS: {
            backgroundColor: '#000000',
            opacity: 0.5,
            cursor: 'wait'
        },
    },

    init: function () {
        var self = this;
        this.$trigger.on('click', function (e) {
            e.preventDefault();
            self.getFeed();
        });
    },

    getFeed: function () {
        var self = this;
        $.blockUI(self.blockOpt);

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

            if(parsedData.pagination.total_pages < self.currentPage){
                self.$trigger.hide();
            }
        }).always(function () {
            $.unblockUI();
        });
        return ajax;
    },

    setData: function(key,value) {
        this.data['key'] = value;
    }
};
