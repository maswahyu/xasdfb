$(function ()
{
    var $mobileMenu = $('#mobile-menu'),
        $userMobileMenu = $('#user-mobile-menu'),
        $primaryNav = $('#nav-mobile-menu');

    $(".mobile-menu-trigger").on('click', function (e)
    {
        e.preventDefault();
        var $this = $(this);
        if ($primaryNav.hasClass('active')) {
            $this.removeClass('is-active');
            $primaryNav.removeClass('active');
            $mobileMenu.drilldown('reset');
        } else {
            $this.addClass('is-active');
            $primaryNav.addClass('active');
        }
    });

    $(".jsUserMenuTrigger").on('click', function (e)
    {
        e.preventDefault();
        if ($userMobileMenu.hasClass('active')) {
            $userMobileMenu.removeClass('active');
            $('.mobile-menu-trigger').show();
            $('.user-info.mobile').show();
            $('.close-user-menu').addClass('hidden');
        } else {
            $userMobileMenu.addClass('active');
            $('.mobile-menu-trigger').hide();
            $('.user-info.mobile').hide();
            $('.close-user-menu').removeClass('hidden');
        }
    });

    $('.jsUserMenu').on('click', function(e){
        e.preventDefault();
        var $this = $(this);
        if($this.hasClass('active')){
            $(this).removeClass('active');
            $('#user-menu-overlay').unbind('click');
            $('.site-content').find('#user-menu-overlay').remove();
        }else{
            $(this).addClass('active');
            $('.site-content').append('<div id="user-menu-overlay" style="position:absolute; width: 100%;' +
                ' height:100%;left:0;top:' +
                ' 0;background-color: rgba(0,0,0,0.8);z-index:2;"></div>');
            $('#user-menu-overlay').on('click', function(){
                $('.jsUserMenu').removeClass('active');
                $('#user-menu-overlay').unbind('click');
                $(this).remove();
            });
        }
    });

    $('.jsUserMenu .dropdown-menu__dropdown-link').on('click', function(e){
        e.stopPropagation();
    });

    $('.jsSearchTrigger').on('click', function (e)
    {
        e.preventDefault();
        $('.search-form').toggleClass('active');
    });

    $mobileMenu.drilldown({
        event: 'click',
        selector: 'a'
    });

    $mobileMenu.on('click', 'a', function ()
    {
        if(!$(this).hasClass('btn')){
            var level = $mobileMenu.data('level');
            if (level !== 0) {
                $primaryNav.addClass('menu-drilled');
            } else {
                $primaryNav.removeClass('menu-drilled');
            }
        }
    });


    $(document).ajaxComplete(function ()
    {
        Holder.run();
    });

    new ClipboardJS('.jsCopyLink');

    $('.jsCopyLink').on('click', function (e)
    {
        e.preventDefault();
    });

    $('.jsTwShare').click(function (e)
    {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, "Twitter", "height=285,width=550,resizable=1");
    });

    $('.jsFbShare').click(function (e)
    {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, "Facebook", "height=269,width=550,resizable=1");
    });
});