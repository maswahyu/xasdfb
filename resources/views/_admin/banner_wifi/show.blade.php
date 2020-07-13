@extends("_admin.master")
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>{{ $title }} #{{ $bannerWifi->id }}</h4>
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
                      <a href="{{ url('/magic/bannerwifi') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/magic/bannerwifi/' . $bannerWifi->id . '/edit') }}" title="Edit category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Id </th><td> {{ $bannerWifi->id }} </td></tr>
                                    <tr><th> Name </th><td> {{ $bannerWifi->title }} </td></tr>
                                    <tr><th> Publish </th><td> <span class="badge badge-{{ ($bannerWifi->publish == '0') ? 'warning' : 'info' }}">{{ ($bannerWifi->publish == '0') ? 'No' : 'Yes' }}</span> </td></tr>
                                    <tr><th> Image </th><td> <img src="{{ imagethumb($bannerWifi->image) }}" width="350"> </td></tr>
                                    <tr><th> Mobile image </th><td> <img src="{{ imagethumb($bannerWifi->mobile_image) }}" width="350"> </td></tr>
                                    <tr><th> Created At </th><td> {{ $bannerWifi->created_at }} </td></tr>
                                    <tr><th> Updated At </th><td> {{ $bannerWifi->updated_at }} </td></tr>
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
