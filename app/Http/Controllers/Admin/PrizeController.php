<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrizeRequest;
use App\Prize;

class PrizeController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Prize';
    }

    public function index(Request $request)
    {   
        return view('_admin.prize.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $prize = Prize::latest()->paginate(10);
        } else {
            $prize = Prize::latest()->paginate(10);
        }
        
        return view('_admin.prize.list', compact('prize','keyword'));
    }

    public function create()
    {
        return view('_admin.prize.create')->with('title', $this->title);
    }

    public function store(PrizeRequest $request)
    {   
        $validated = $request->validated();
        
        $data = Prize::newRecord($request);

        return redirect('magic/prize')->with('success', 'Prize added!');
    }

    public function edit($id)
    {
        $prize = Prize::findOrFail($id);
        return view('_admin.prize.edit', compact('prize'))->with('title', $this->title);
    } 

    public function show($id)
    {
        $prize = Prize::findOrFail($id);
                
        return view('_admin.prize.show', compact('prize'))->with('title', $this->title);
    }

    public function update(PrizeRequest $request, $id)
    {
        $validated = $request->validated();
        
        $data = Prize::updateRecord($request, $id);
        
        return redirect('magic/prize')->with('success', 'Prize updated!');
    }

    public function destroy(Request $request, $id)
    {
        Prize::destroy($id);

        if($request->ajax()){
            return array("message" => 'Prize deleted!', "id" => $id);
        } else {
            return redirect('magic/prize')->with('success', 'Prize deleted!');
        }
    }
}