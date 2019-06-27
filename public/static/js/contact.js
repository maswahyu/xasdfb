$(function ()
{

    $('#contact-form').parsley();

    var recaptchaReady = false;
    $('#contact-form').parsley().on('form:validate', function (formInstance)
    {
        if (!recaptchaReady && formInstance.isValid()) {
            formInstance.validationResult = false;
            var widget = grecaptcha.render('grecaptcha', {
                'sitekey': '6LdROacUAAAAAAzb5ZdZatU2-RKMPUskZOOtQP_2',
                'size': "invisible",
                'callback': function ()
                {
                    formInstance.validationResult = true;
                    $('#contact-form').submit();
                }
            });
            grecaptcha.reset(widget);
            grecaptcha.execute(widget);
            recaptchaReady = true;
        }
    });
});
