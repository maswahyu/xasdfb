$(function ()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('.js-form').on('submit', function(e) {
            e.preventDefault();
                
            $('#spin').show();
            $(':button[type="submit"]').prop('disabled', true);
            $.ajax({
                type : 'POST',
                url  : $(this).attr('action'),
                data: $(this).serialize()
            }).done(function(data) {

                $('#spin').hide()
                $(':button[type="submit"]').prop('disabled', false)

                if (data.info == 'login') {
                    document.location.href = '/member/login';
                }
                
                if (data.info == 'error') {
                    $('#its_warning').html(data.message)
                }

                if (data.info == 'success' ) {
                    $('#its_warning').html(data.message)
                    setTimeout(function(){
                        document.location.href = '/interest';
                    }, 2000);
                }
            });           
        })
    });
    
});
