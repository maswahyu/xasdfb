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
                    <div class="card-header">
                        <a href="{{ url('/magic/stickybanner/create') }}" class="btn btn-success btn-sm" title="Add New Banner Wifi"> Add New</a>
                        <div class="card-tools">
                            <form method="GET" action="{{ url('/magic/stickybanner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    </div>
                    <div class="p-2 card-body">
                        <div class="text-center overlay" id="spin">
                            <i class='fa fa-spinner fa-spin loading' style="font-size: 100px;"></i>
                        </div>
                        <div style="overflow-x:auto;" id="datalist">
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
var url = "{{ url('/magic/stickybannerlist') }}?";
var only = '{{ Request::query('search') }}';
var urlDelete = '{{ url('/magic/stickybanner') }}/';

$(document).ready(function() {
    dataList.init();
});

function copyStickyBanner(id) {
    var confirmed = confirm('Want to copy?');

    if(confirmed) {
        $.ajax({
            url: 'stickybanner/copy',
            type: 'post',
            data: {
                stickyBanner: id
            }
        }).done(function(response) {
            document.location.reload();
        })
    }
}
// $(document).on('click', '.copy-sticky', function(e) {
//     console.log(e.currentTarget);
// })
</script>
@endsection
