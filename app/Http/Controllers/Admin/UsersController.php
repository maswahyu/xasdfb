<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use App\Admin;
use Auth;
use Hash;

class UsersController extends Controller
{	
	private $title;

    function __construct()
    {
        $this->title = 'User';
    }

    public function index()
    {
    	return view('_admin.user.user')->with('title', $this->title);
    }

    public function getdata(Request $request)
    {
    	$user = Admin::latest()->paginate(10);
        return view('_admin.user.userlist', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_admin.user.create')->with('title', $this->title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {   
        $validated = $request->validated();

        if ($request->group == 'admin') {
            $usertype = 'admin';
        } elseif ($request->group == 'editor') {
            $usertype = 'editor'; 
        } else {
            $usertype = 'editor';
        }

        $data= new Admin;
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->usertype = $usertype;
        $data->remember_token = md5($request->email);
        $data->password = Hash::make($request->get('password'));
        $data->created_at = Carbon::now();
        $data->timestamps = false;
        $data->save();

        return redirect('magic/users')->with('success', 'Account Successfully Created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$request->validate([
            'name' => 'required',
            'email' => 'required|email|max:75',
            'group' => 'required',
        ]);

        if ($request->group == 'admin') {
            $usertype = 'admin';
        } elseif ($request->group == 'editor') {
            $usertype = 'editor'; 
        } else {
            $usertype = 'member';
        }

        if($request->get('email') == Admin::MAIL_SUPER_ADMIN && Auth::guard('admin')->user()->email != Admin::MAIL_SUPER_ADMIN) {
            return redirect('magic/users')->with('error', 'Account Cannot Updated');
        }

        $data= Admin::findOrFail($id);
        $data->name = $request->get('name');
        if($request->get('email') != Admin::MAIL_SUPER_ADMIN) {
            $data->email = $request->get('email');
            $data->usertype = $usertype;
        }
        $data->remember_token = md5($request->email);
        if ($request->get('password')) {
        	$data->password = Hash::make($request->get('password'));
        }
        $data->timestamps = false;
        $data->save();
        
        return redirect('magic/users')->with('success', 'Account Successfully Updated');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function findby(Request $request)
    {
    	# code...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Admin::findOrFail($id);
        return view('_admin.user.edit', compact('data', 'id'))->with('title', $this->title);
    }    

    public function profile()
    {   
        $data = Auth::guard('admin')->user();
        $id = Auth::guard('admin')->id();
        return view('_admin.user.profile', compact('data', 'id'))->with('title', 'Profile');;
    }

    public function updateProfile(Request $request, $id)
    {
    	$request->validate([
            'name' => 'required',
            'email' => 'required|email|max:75',
        ]);

        $data = Auth::guard('admin')->user();
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->remember_token = md5($request->email);
        if ($request->get('password')) {
        	$data->password = Hash::make($request->get('password'));
        }
        $data->timestamps = false;
        $data->save();
        
        return redirect('magic/profile')->with('success', 'Account Successfully Updated');
    }

    public function useraction(Request $request)
    {
        $type = $request['type'];
        $id   = $request['id'];

        if ($type == 'destroy') {
            return $this->destroy($id);
        }
    }

    public function destroy($id)
    {
        $data= Admin::findOrFail($id);

        if($data->email == Admin::MAIL_SUPER_ADMIN) {
            return array("error" => 'Account Cannot Deleted', "id" => 0);
        }

        $data->delete();
        
        return array("message" => 'Account Successfully Deleted', "id" => $id);
    }
}
