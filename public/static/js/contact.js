$(function ()
{   
    grecaptcha.ready(function () {
        grecaptcha.execute(GOOGLE_KEY, { action: 'contact' }).then(function (token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
    });

    $('#contact-form').parsley();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#contact-form").submit(function(e) {
        e.preventDefault()

        $('#spin').show()
        $(':button[type="submit"]').prop('disabled', true)
        $.ajax({
            type : 'POST',
            url  : 'contact-us',
            data : {
                name             : $('#name').val(),
                email            : $('#email').val(),
                phone            : $('#phone').val(),
                subject          : $('#subject').val(),
                message          : $('#message').val(),
                recaptchaResponse: $('#recaptchaResponse').val(),
            }
        }).done(function(data) {
            $('#spin').hide();
            $(':button[type="submit"]').prop('disabled', false);

            if (data.info == 'error') {
                $('#contact-war').html(data.message)
            }

            if (data.info == 'success') {
                $('#contact-war').html(data.message)
                setTimeout(function(){ 
                    window.location.reload();
                }, 4000);
            }

            $('#name').val('')
            $('#email').val('')
            $('#phone').val('')
            $('#subject').val('')
            $('#message').val('')
        });  
    });

});
