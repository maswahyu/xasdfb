<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\User;

class MemberController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Member';
    }

    public function index(Request $request)
    {   
        return view('_admin.member.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $member = User::where('name', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $member = User::latest()->paginate(10);
        }
        
        return view('_admin.member.list', compact('member','keyword'));
    }

    public function create()
    {
        return view('_admin.member.create')->with('title', $this->title);
    }

    public function store(MemberRequest $request)
    {   
        $validated = $request->validated();
        
        $data = User::newRecord($request);

        return redirect('magic/member')->with('success', 'Member added!');
    }

    public function edit($id)
    {
        $member = User::findOrFail($id);
        return view('_admin.member.edit', compact('member'))->with('title', $this->title);
    } 

    public function show($id)
    {
        $member = User::findOrFail($id);
                
        return view('_admin.member.show', compact('member'))->with('title', $this->title);
    }

    public function update(MemberRequest $request, $id)
    {
        $validated = $request->validated();
        
        $data = User::updateRecord($request, $id);
        
        return redirect('magic/member')->with('success', 'Member updated!');
    }

    public function destroy(Request $request, $id)
    {
        User::destroy($id);

        if($request->ajax()){
            return array("message" => 'Member deleted!', "id" => $id);
        } else {
            return redirect('magic/member')->with('success', 'Member deleted!');
        }
    }
}