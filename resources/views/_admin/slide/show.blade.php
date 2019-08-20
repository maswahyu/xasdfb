@extends("_admin.master")
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>{{ $title }} #{{ $slide->id }}</h4>
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
                      <a href="{{ url('/magic/slide') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/magic/slide/' . $slide->id . '/edit') }}" title="Edit slide"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('magic/slide' . '/' . $slide->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete slide" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $slide->id }}</td>
                                    </tr>
                                    <tr><th> Is Featured </th><td> <span class="badge badge-{{ ($slide->is_featured == '0') ? 'warning' : 'info' }}">{{ ($slide->is_featured == '0') ? 'No' : 'Yes' }}</span> </td></tr>
                                    <tr><th> Publish </th><td> <span class="badge badge-{{ ($slide->publish == '0') ? 'warning' : 'info' }}">{{ ($slide->publish == '0') ? 'No' : 'Yes' }}</span> </td></tr>
                                    <tr><th> Image </th><td> <img src="{{ imagethumb($slide->image) }}" width="350"> </td></tr>
                                    <tr><th> Mobile image </th><td> <img src="{{ imagethumb($slide->mobile_image) }}" width="350"> </td></tr>
                                    <tr><th> Url </th><td> {{ $slide->url }} </td></tr>
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
