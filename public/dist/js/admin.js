$(function () {
    // Replace the <textarea class="textarea-ckeditor"> with a CKEditor instance, using custom configuration.
    $(".wysiwyg-simple").each( function() {
        CKEDITOR.replace( $(this).attr('id'), {
            toolbar : 'Basic',
            height  : 200
        });
    });
    $(".wysiwyg-advanced").each( function() {
        CKEDITOR.replace( $(this).attr('id'), {
            toolbar : 'Standard',
            height  : 250,
            // filebrowserBrowseUrl : BASE_URL + 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            // filebrowserUploadUrl : BASE_URL + 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl : BASE_URL + '/file-manager/ckeditor'
        });
    });

    $(".wysiwyg-simple-br").each( function() {
        CKEDITOR.replace( $(this).attr('id'), {
            customConfig : BASE_URL + '/dist/js/ckeditor_config.js',
            toolbar : 'Basic',
            height  : 500
        });
    });
    $(".wysiwyg-advanced-br").each( function() {
        CKEDITOR.replace( $(this).attr('id'), {
            customConfig : BASE_URL + '/dist/js/ckeditor_config.js',
            toolbar : 'Standard',
            height  : 400,
            // filebrowserBrowseUrl : BASE_URL + 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            // filebrowserUploadUrl : BASE_URL + 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl : BASE_URL + '/file-manager/ckeditor'
        });
    });
    //-------------------------


    //Initialize Select2 Elements
    // $(".select2").select2();
    //-------------------------


    // File Manager Button
    $('.file-iframe-btn').fancybox({
        autoSize      : false
    });
    //-------------------------


    // Datepicker search form
    // $('#form-date .input-daterange').datepicker({
    //     format: "dd-mm-yyyy",
    //     autoclose: true,
    //     todayHighlight: true
    // });
    // //-------------------------


    // Datepicker create form
    $('.input-datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
        startDate: '0d'
    });
    // -------------------------


    // // Colorpicker create form
    // $('.input-colorpicker').colorpicker({
    //     customClass: 'colorpicker-2x',
    //     format: "hex",
    //     sliders: {
    //         saturation: {
    //             maxLeft: 400,
    //             maxTop: 400
    //         },
    //         hue: {
    //             maxTop: 400
    //         },
    //         alpha: {
    //             maxTop: 400
    //         }
    //     }
    // });
    //-------------------------
    //
    //
    $("#button-image").click(function(event){
        event.preventDefault();
        PopupCenter('/file-manager/fm-button','fm','900','500');
    });
});

var dataList = (function() {

    var that = {};

    that.init = function() {
        var key = $('#key').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        });
        $.ajax({
            method: "GET",
            url: url+'page=1',
            data: {
                key: key,
                only: only,
            },
        }).done(function(data) {
            $('#spin').hide();
            document.getElementById("datalist").innerHTML = data;
        });

        $(document).on('click', '.pagination a', function (e) {
            var key = $('#key').val();
            $('#spin').show();
            getPosts($(this).attr('href').split('page=')[1], key, only);
            e.preventDefault();
        });

        function getPosts(page, key, only) {
            $.ajax({
                method: "GET",
                url : url + 'page=' + page,
                data: {
                    key: key,
                    only: only,
                },
            }).done(function (data) {
                $('#spin').hide();
                document.getElementById("datalist").innerHTML = data;
                location.hash = page;
            });
        }

        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                var key = $('#key').val();
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getPosts(page, key, only);
                }
            }
        });
    }

    return that;
})();

function user_action(id, type) {

    if (type == 'destroy') {
        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                url: urlDelete+id,
                type: 'DELETE',
            })
            .done(function(response) {
                $('#row_'+response.id).hide();
                $('#alert-msg').html('<div class="px-3 pt-3">' +
                        '<div class="alert alert-success alert-dismissible">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                              '<h5><i class="icon fa fa-check"></i>' + response.message + '</h5>' +
                        '</div>' +
                    '</div>');
                $("#alert-msg").fadeTo(2000, 500).slideUp(500, function(){
                    $("#alert-msg").slideUp(500);
                });
            });
        }

    } else {
        alert("Opps!")
    }
}

function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var systemZoom = width / window.screen.availWidth;
    var left = (width - w) / 2 / systemZoom + dualScreenLeft
    var top = (height - h) / 2 / systemZoom + dualScreenTop
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) newWindow.focus();
}

// set file link
function fmSetLink($url) {
  document.getElementById('image_path').value = $url;
}