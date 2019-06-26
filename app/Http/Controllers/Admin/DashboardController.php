<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class DashboardController extends Controller
{
    public function versionone()
    {	
        return view('_admin.pages.v1');
    }

    public function collect(Request $request)
    {
        $q = $request->query('q');
        if ($q == 'unread') {
            $data = Contact::whereNull('read_at')->count();
            return response()->json([
                'error' => false,
                'error_code' => 200,
                'count' => $data
            ]);
        } elseif ($q === 'all') {
            
            return response()->json([
                'error' => false,
                'error_code' => 200,
                'agent' => 1,
                'gallery' => 1,
                'news' => 1,
            ]);
        } elseif ($q == 'contact') {
            $data = Contact::latest()->take(8)->get();
            return view('_admin.pages.d_contact', compact('data'));
        } elseif ($q == 'agent') {
            $data = Contact::latest()->take(8)->get();
            return view('_admin.pages.d_contact', compact('data'));
        } 
        else {
            return response()->json(['error' => 'Opps']);
        }

    }
}
