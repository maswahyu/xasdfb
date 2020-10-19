<?php

namespace App\Http\Controllers\Admin;

use App\AudienceEventStream;
use App\EventStream;
use App\Exports\AudienceEventExport;
use Illuminate\Http\Request;
use App\Http\Resources\Event;
use App\LogAudienceEventStream;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventStreamRequest;
use Maatwebsite\Excel\Facades\Excel;

class EventStreamController extends Controller
{
    private $title;

    function __construct()
    {
        $this->title = 'EventStream';
    }

    public function index(Request $request)
    {
        return view('_admin.eventstream.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $eventstream = EventStream::latest()->paginate(10);
        } else {
            $eventstream = EventStream::latest()->paginate(10);
        }

        return view('_admin.eventstream.list', compact('eventstream','keyword'));
    }

    public function create()
    {
        return view('_admin.eventstream.create')->with('title', $this->title);
    }

    public function store(EventStreamRequest $request)
    {
        $validated = $request->validated();

        $data = EventStream::newRecord($request);

        return redirect('magic/eventstream')->with('success', 'EventStream added!');
    }

    public function edit($id)
    {
        $eventstream = EventStream::findOrFail($id);
        return view('_admin.eventstream.edit', compact('eventstream'))->with('title', $this->title);
    }

    public function show($id)
    {
        $eventstream = EventStream::findOrFail($id);

        // get unique audience for reporting
        if(request()->has('type') && request()->get('tab') == 'report') {
            if(request()->get('type') == AudienceEventStream::TYPE_GUEST) {
                $audience = LogAudienceEventStream::where('event_stream_id', '=', $eventstream->id)->whereNull('sso_id')->paginate(15);
            } else {
                $audience = LogAudienceEventStream::where('event_stream_id', '=', $eventstream->id)->whereNotNull('sso_id')->paginate(15);
            }
        } else {
            $audience = LogAudienceEventStream::where('event_stream_id', $eventstream->id)->latest()->paginate(15);
        }
        // get total audience based on type
        $total_user = LogAudienceEventStream::where('event_stream_id', '=', $eventstream->id)->whereNotNull('sso_id')->count();
        $total_guest = LogAudienceEventStream::where('event_stream_id', '=', $eventstream->id)->whereNull('sso_id')->count();
        $total_audience = compact('total_user', 'total_guest');


        return view('_admin.eventstream.show', compact('eventstream', 'audience', 'total_audience'))->with('title', $this->title);
    }

    public function update(EventStreamRequest $request, $id)
    {
        $validated = $request->validated();

        $data = EventStream::updateRecord($request, $id);

        return redirect('magic/eventstream')->with('success', 'EventStream updated!');
    }

    public function destroy(Request $request, $id)
    {
        EventStream::destroy($id);

        if($request->ajax()){
            return array("message" => 'EventStream deleted!', "id" => $id);
        } else {
            return redirect('magic/eventstream')->with('success', 'EventStream deleted!');
        }
    }

    public function exportAudience($id, Request $request)
    {
        $eventstream = EventStream::findOrFail($id);
        if(request()->has('type') && request()->get('tab') == 'report') {
            if(request()->get('type') == AudienceEventStream::TYPE_GUEST) {
                $audience = LogAudienceEventStream::where('event_stream_id', '=', $eventstream->id)->whereNull('sso_id')->paginate(15);
            } else {
                $audience = LogAudienceEventStream::where('event_stream_id', '=', $eventstream->id)->whereNotNull('sso_id')->paginate(15);
            }
        } else {
            $audience = LogAudienceEventStream::where([ ['event_stream_id', '=', $eventstream->id]])->get();
        }
        return Excel::download(new AudienceEventExport($audience), 'test.xlsx');
    }
}
