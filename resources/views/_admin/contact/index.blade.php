@extends("_admin.master")
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>{{ $title }} List</h4>
           </div>
           <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">{{ $title }}</li>
               </ol>
           </div>
       </div>
   </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="p-2 card-body">
                        <div class="text-center overlay" id="spin">
                            <i class='fa fa-spinner fa-spin loading' style="font-size: 100px;"></i>
                        </div>
                        <div class="mailbox-controls">
                            <button type="button" class="btn btn-default btn-sm" disabled> 
                                <input class="btn btn-default btn-sm" type="checkbox" name="select-all" id="select-all" />
                            </button>
                            <div class="btn-group">
                                <button type="button" id="btntrash" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button>
                            </div>
                            <button type="button" id="btnrefresh" class="btn btn-default btn-sm">
                                <i class="fa fa-sync"></i>
                            </button>
                            <form method="GET" action="{{ url('/contact/list') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary btn-sm" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div style="overflow-x:auto;" id="paginateajax" data-url="{{ url('contact/get') }}?">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('javascript')

<script type="text/javascript"> 

$(document).on('click', '#select-all', function(event) {
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});

$(document).on('click', '#btnrefresh', function(event) {
    event.preventDefault();
    $('#spin').show();
    var key = $('#key').val();
    getPosts(1, key);
});

$(document).on('click', '.clickable-row', function(event) {
    window.location = $(this).data("href");
});

$(document).on('click', '#btntrash', function(event) {
    event.preventDefault();
    /* Act on the event */
    var key = $('#key').val();
    var page = window.location.hash.replace('#', '');
    var id = [];
    $('.myCheckboxes').each(function() {
        if ($(this).is(":checked")) {
            id.push($(this).val())
        }
    });

    id = id.toString();

    var dataString = $('#form').serialize();
    var x = confirm("Are you sure delete select comment ?");
    if (x == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        });
        $.ajax({
            url: '{{ action('Admin\ContactController@forcetrash') }}',
            type: 'POST',
            data: {
                id: id
            },
        })
        .done(function(response) {
            $('#alert-msg').html('<div class="px-3 pt-3">' +
                    '<div class="alert alert-success alert-dismissible">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                          '<h5><i class="icon fa fa-check"></i>' + response.message + '</h5>' +
                    '</div>' +
                '</div>');
            $("#alert-msg").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert-msg").slideUp(500);
            });

            if (page == '') {
                page = '1';
            }
            getPosts(page, key);
        });
    }
});


var url = $('#paginateajax').attr("data-url");
$(document).ready(function(){
    var key = $('#key').val();
    var only = '{{ Request::query('search') }}';
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
        document.getElementById("paginateajax").innerHTML = data;
    });             
});

$(document).on('click', '.pagination a', function (e) {
    var key = $('#key').val();
    var only = '{{ Request::query('search') }}';
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
        document.getElementById("paginateajax").innerHTML = data;
        location.hash = page;
    });
}

$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        var key = $('#key').val();
        var only = '{{ Request::query('search') }}';
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getPosts(page, key, only);
        }
    }
});

function user_action(id, type) {

    if (type == 'destroy') {
        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                url: '/contact/list/'+id,
                type: 'DELETE',
                data: {
                    id: id,
                    _method: 'DELETE',
                    _token: $('#requesttoken').val()
                },
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

</script>
@endsection