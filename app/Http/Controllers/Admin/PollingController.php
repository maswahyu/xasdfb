<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PollingRequest;
use App\Polling;

class PollingController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Polling';
    }

    public function index(Request $request)
    {   
        return view('_admin.polling.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $polling = Polling::where('name', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $polling = Polling::latest()->paginate(10);
        }
        
        return view('_admin.polling.list', compact('polling','keyword'));
    }

    public function create()
    {
        return view('_admin.polling.create')->with('title', $this->title);
    }

    public function store(PollingRequest $request)
    {
        $validated = $request->validated();
        
        $data = Polling::newRecord($request);

        return redirect('magic/polling')->with('success', 'Polling added!');
    }

    public function edit($id)
    {
        $polling = Polling::findOrFail($id);
        return view('_admin.polling.edit', compact('polling'))->with('title', $this->title);
    } 

    public function show($id)
    {
        $polling = Polling::findOrFail($id);
                
        return view('_admin.polling.show', compact('polling'))->with('title', $this->title);
    }

    public function update(PollingRequest $request, $id)
    {
        $validated = $request->validated();
        
        $data = Polling::updateRecord($request, $id);
        
        return redirect('magic/polling')->with('success', 'Polling updated!');
    }

    public function destroy(Request $request, $id)
    {
        Polling::destroy($id);

        if($request->ajax()){
            return array("message" => 'Polling deleted!', "id" => $id);
        } else {
            return redirect('magic/polling')->with('success', 'Polling deleted!');
        }
    }
}