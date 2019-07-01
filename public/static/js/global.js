$(function ()
{
    var $mobileMenu = $('#mobile-menu'),
        $primaryNav = $('.mobile-nav');

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
        var level = $mobileMenu.data('level');
        if (level !== 0) {
            $primaryNav.addClass('menu-drilled');
        } else {
            $primaryNav.removeClass('menu-drilled');
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
