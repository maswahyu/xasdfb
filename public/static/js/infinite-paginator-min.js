function Hector_infinitePaginator(a){this.$container=a.container,this.$trigger=a.trigger,this.template=a.template,this.showBanner=void 0!==a.showBanner?a.showBanner:0,this.banner_image=void 0!==a.banner_image?a.banner_image:"",this.banner_url=void 0!==a.banner_url?a.banner_url:"",this.url=a.url,this.currentPage=a.currentPage,this.data=a.data,this.init()}Hector_infinitePaginator.prototype={init:function(){var a=this;this.$trigger.on("click",function(t){t.preventDefault(),a.getFeed()})},getFeed:function(){var a=this;return $.ajax(a.url,{data:Object.assign({page:a.currentPage},a.data)}).done(function(t){if("object"==typeof t)var e=t;else e=JSON.parse(t);$.each(e.data,function(t,e){a.$container.append(a.template(e)),a.showBanner&&4==t&&($ads='<div class="post-card post-card--wide post-card--wide__with-padding">\n                    <div class="post-card__ads-container">\n                        <a href="'+a.banner_url+'?utm_source=AdsHome" alt="">\n                            <img class="post-card__ads" src="'+a.banner_image+'" alt="">\n                        </a>\n                    </div></div>',a.$container.append($ads))}),a.currentPage++,e.total_page<a.currentPage&&a.$trigger.hide(),$(".post-card__img").Lazy({effect:"fadeIn",visibleOnly:!0})}).always(function(){})},setData:function(a,t){this.data.key=t}};