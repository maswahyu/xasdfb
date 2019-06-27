@extends("_admin.master")
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>{{ $title }} #{{ $news->title }}</h4>
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
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                      <a href="{{ url('/magic/news') }}?type={{ Request::query('type') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/magic/news/' . $news->id . '/edit') }}?type={{ Request::query('type') }}" title="Edit news"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('magic/news' . '/' . $news->id) }}?type={{ Request::query('type') }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete news" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </div>
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table class="table">
                                <tbody> 
                                    <tr><th> Title </th><td> {{ $news->title }} </td></tr>
                                    <tr><th> User </th><td> {{ $news->user->name }} </td></tr>
                                    <tr><th> Image </th><td> <img src="{{ imageview($news->image) }}" width="150"> </td></tr>
                                    <tr><th> Summary </th><td> {{ $news->summary }} </td></tr>                                    
                                    <tr><th> Category </th><td> {{ optional($news->category)->name }} </td></tr>
                                    <tr><th> Content </th><td> {!! $news->content !!} </td></tr>
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
