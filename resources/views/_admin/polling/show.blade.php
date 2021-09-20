@extends("_admin.master")
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>{{ $title }} #{{ $polling->id }}</h4>
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
                <div class="card card-primary card-outline" id="#accordion">
                    <div class="card-header">
                      <a href="{{ url('/magic/polling') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/magic/polling/' . $polling->id . '/edit') }}" title="Edit polling"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <div class="float-right">
                            <button data-toggle="collapse" id="buttonDetail" data-target="#pollingDetail" aria-expanded="true" aria-controls="pollingDetail" class="btn btn-sm btn-info">Polling Detail</button>
                            <button data-toggle="collapse" id="buttonVote" data-target="#pollingVote" aria-expanded="false" aria-controls="pollingVote"class="btn btn-sm btn-info">Total Vote</button>
                            <button data-toggle="collapse" id="buttonUser" data-target="#pollingUser" aria-expanded="false" aria-controls="pollingUser" class="btn btn-sm btn-info">List User</button>
                        </div>

                        {{-- <form method="POST" action="{{ url('magic/album' . '/' . $album->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete album" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> --}}
                        </div>
                        <div class="card-body">
                            <div id="pollingDetail" aria-labelledby="buttonDetail" data-parent="#accordion" class="collapse show">
                                <h3 class="h3">Polling Detail</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th> Id </th>
                                                <td> {{ $polling->id }} </td>
                                            </tr>
                                            <tr>
                                                <th> Name </th>
                                                <td> {{ $polling->name }} </td>
                                            </tr>
                                            <tr>
                                                <th> Publish </th>
                                                <td> {{ $polling->publish }} </td>
                                            </tr>
                                            <tr>
                                                <th> Created At </th>
                                                <td> {{ $polling->created_at }} </td>
                                            </tr>
                                            <tr>
                                                <th> Updated At </th>
                                                <td> {{ $polling->updated_at }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="pollingVote" aria-labelledby="buttonVote" data-parent="#accordion" class="collapse">
                                <h3>Polling Vote</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Option</th>
                                                <th width="15%">Non Member</th>
                                                <th width="10%">Member</th>
                                                <th width="10%">Total Vote</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($polling->polling_options as $option)
                                            <tr>
                                                <td>{{$option->option}}</td>
                                                <td>{{$option->votes - $polling->polling_users()->where('option_id', $option->id)->get()->count() }}</td>
                                                <td>{{$polling->polling_users()->where('option_id', $option->id)->get()->count()}}</td>
                                                <td>{{$option->votes}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="pollingUser" aria-labelledby="buttonUser" data-parent="#accordion" class="collapse">
                                <h3>Polling USER</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="10%">User ID</th>
                                                <th>Email</th>
                                                <th>Name</th>
                                                <th>Vote Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($polling->polling_users as $user)
                                            <tr>
                                                <td>{{$user->user->id}}</td>
                                                <td>{{$user->user->email}}</td>
                                                <td>{{$user->user->name}}</td>
                                                <td>{{$user->polling_option->option}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
