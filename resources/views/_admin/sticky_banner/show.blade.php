@extends("_admin.master")
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>{{ $title }} #{{ $stickyBanner->id }}</h4>
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
                      <a href="{{ url('/magic/stickybanner') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/magic/stickybanner/' . $stickyBanner->id . '/edit') }}" title="Edit category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Id </th><td> {{ $stickyBanner->id }} </td></tr>
                                    <tr><th> Name </th><td> {{ $stickyBanner->name }} </td></tr>
                                    <tr><th> Publish </th><td> <span class="badge badge-{{ ($stickyBanner->status == '0') ? 'warning' : 'info' }}">{{ ($stickyBanner->status == '0') ? 'No' : 'Yes' }}</span> </td></tr>
                                    <tr><th> Page </th><td> {{ $stickyBanner->page }} </td></tr>
                                    <tr><th> Image </th><td> <img src="{{ imagethumb($stickyBanner->image) }}" width="350"> </td></tr>
                                    <tr><th> CTA </th><td> <a href="{!! $stickyBanner->cta !!}" target="_blank">{!! $stickyBanner->cta !!}</a> </td></tr>
                                    <tr><th> Periode </th><td> {{ ($stickyBanner->periode_start ?  $stickyBanner->periode_start .' s/d '. $stickyBanner->periode_end : '' ) }} </td></tr>
                                    <tr><th> Created At </th><td> {{ $stickyBanner->created_at }} </td></tr>
                                    <tr><th> Updated At </th><td> {{ $stickyBanner->updated_at }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
