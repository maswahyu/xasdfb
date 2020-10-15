<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\EventStream;
use App\RemainderEventStream;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function stream($slug)
    {
        return view('frontend.pages.stream', [
            'stream' => EventStream::where('slug', $slug)->firstOrFail(),
            'username' => null,
        ]);
    }

    public function remindMe(Request $request)
    {
        if (RemainderEventStream::newRecord($request)) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
