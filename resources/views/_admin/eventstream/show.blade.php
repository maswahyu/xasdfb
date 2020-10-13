@extends("_admin.master")
@section("content")
<section class="content-header p-2">
   <div class="container-fluid">
       <div class="row mb-0">
           <div class="col-sm-6">
               <h4>{{ $title }} #{{ $eventstream->id }}</h4>
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
                        <a href="{{ url('/magic/eventstream') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/magic/eventstream/' . $eventstream->id . '/edit') }}" title="Edit eventstream"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('magic/eventstream' . '/' . $eventstream->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete eventstream" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <div class="card-header d-flex p-0">
                        <ul class="nav nav-pills p-2">
                            <li class="nav-item"><a class="nav-link {{request()->get('tab') == 'event' ? 'active show' : (request()->get('tab', null) == null ? 'active show' : '') }}" href="#event" data-toggle="tab">Event</a></li>
                            <li class="nav-item"><a class="nav-link {{request()->get('tab') == 'report' ? 'active show' : ''}}" href="#report" data-toggle="tab">Report</a></li>
                            <li class="nav-item"><a class="nav-link {{request()->get('tab') == 'chat' ? 'active show' : ''}}" href="#chat" data-toggle="tab">Chat</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane {{request()->get('tab') == 'event' ? 'active show' : (request()->get('tab', null) == null ? 'active show' : '') }}" id="event">
                                @include('_admin.eventstream._part.event')
                            </div>
                            <div class="tab-pane {{request()->get('tab') == 'report' ? 'active show' : ''}}" id="report">
                                @include('_admin.eventstream._part.report')
                            </div>
                            <div class="tab-pane {{request()->get('tab') == 'chat' ? 'active show' : ''}}" id="chat">
                                @include('_admin.eventstream._part.chat')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('javascript')
@stack('stack_js')
@endsection
