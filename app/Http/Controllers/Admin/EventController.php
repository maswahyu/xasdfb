<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Event;

class EventController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Event';
    }

    public function index(Request $request)
    {   
        return view('_admin.event.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $event = Event::where('title', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $event = Event::latest()->paginate(10);
        }
        
        return view('_admin.event.list', compact('event','keyword'));
    }

    public function create()
    {
        return view('_admin.event.create')->with('title', $this->title);
    }

    public function store(EventRequest $request)
    {   
        $validated = $request->validated();
        
        $data = Event::newRecord($request);

        return redirect('magic/event')->with('success', 'Event added!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('_admin.event.edit', compact('event'))->with('title', $this->title);
    } 

    public function show($id)
    {
        $event = Event::findOrFail($id);
                
        return view('_admin.event.show', compact('event'))->with('title', $this->title);
    }

    public function update(EventRequest $request, $id)
    {
        $validated = $request->validated();
        
        $data = Event::updateRecord($request, $id);
        
        return redirect('magic/event')->with('success', 'Event updated!');
    }

    public function destroy(Request $request, $id)
    {
        Event::destroy($id);

        if($request->ajax()){
            return array("message" => 'Event deleted!', "id" => $id);
        } else {
            return redirect('magic/event')->with('success', 'Event deleted!');
        }
    }
}