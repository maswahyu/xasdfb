@extends("_admin.master")
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>{{ $title }}</h4>
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
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Detail Contact</h3>
                    </div> 
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <table class="table table-hover">
                                <tr>
                                    <td>
                                        From
                                    </td>
                                    <td>
                                        : {{ $data->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email
                                    </td>
                                    <td>
                                        : {{ $data->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Phone
                                    </td>
                                    <td>
                                        : {{ $data->phone }}
                                    </td>
                                </tr>
                            </table>
                            <h5>Subject: {{ $data->subject }}
                            </h5>
                        </div>
                        <div class="mailbox-read-message">
                            <p>{!! $data->message !!}</p>
                        </div>
                    </div>
                    <div class="card-footer p-2">
                       <a href="{{ url('/contact/list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a class="btn btn-danger btn-sm" onclick="user_action({{$data->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash-o"></i> Delete </a>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
</section> 

@endsection
@section('javascript')
<script type="text/javascript">
    
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
                        _token: document.head.querySelector('meta[name="csrf-token"]').content
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
                    window.location.href = "/contact/list"
                });
            }

        } else {
            alert("Opps!")
        }
    }

</script>
@endsection
