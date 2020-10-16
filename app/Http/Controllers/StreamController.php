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
        $stream = EventStream::where('slug', $slug)->firstOrFail();
        if(! $stream->isPublished()) {
            abort(404);
        }

        return view('frontend.pages.stream', [
            'stream' => $stream,
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
