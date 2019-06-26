<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Contact';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('_admin.contact.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $keyword = $request->get('only');

        if (!empty($keyword)) {
            $data = Contact::where('name', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $data = Contact::latest()->paginate(10);
        }
        return view('_admin.contact.list', compact('data','keyword'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $data = Contact::findOrFail($id);
        Contact::where('id', $id)
                ->update(['read_at' => Carbon::now()]);
                
        return view('_admin.contact.show', compact('data', 'id'))->with('title', $this->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Contact::findOrFail($id);
        $data->delete();
        
        return array("message" => 'Account Successfully Deleted', "id" => $id);
    }

    public function forcetrash(Request $request)
    {
        $data = explode(",", $request['id']);

        for ($i=0; $i <count($data) ; $i++) { 
            $id = $data[$i];
            $contact = Contact::findOrFail($id);
            $contact->delete();
        }

        return array('message' => "Successfully Deleted");
    }
}
