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
                        <a href="{{ url('/magic/slide/create') }}" class="btn btn-success btn-sm" title="Add New slide"> Add New</a>
                        <div class="card-tools">
                            <form method="GET" action="{{ url('/magic/slide') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    <div class="card-body">
                        {{-- <div class="text-center overlay" id="spin">
                            <i class='fa fa-spinner fa-spin loading' style="font-size: 100px;"></i>
                        </div> --}}
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
var url = "{{ url('/magic/slidelist') }}";
var only = '{{ Request::query('search') }}';
var urlDelete = '{{ url('/magic/slide') }}/';

// $(document).ready(function() {
//     dataList.init();
// });

$(document).ready(function() {
    var findUserToken = "";
    $('#datalist').sibdatatable({
        dataSourceType: 'json',
        dataSource: url,
        Columns: [
          {
              fields: 'image',
              title: 'Image'
          },
          {
              fields: 'mobile_image',
              title: 'Mobile Image'
          },
          {
              fields: 'featured',
              title: 'Is Featured'
          },
          {
              fields: 'publish',
              title: 'Publish'
          },
          {
              fields: 'action',
              title: 'Action'
          }
        ],
        sortable: true,
        filterable:true,
        pageable: true,
        pagingLimit: 10,
        pagingNumber: 1,
        order:'asc',
        orderBy: 'title'
    });

});

</script>
@endsection
