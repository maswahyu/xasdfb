<?php

namespace App\Http\Controllers;

use App\PollingOption;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    public function doVote(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $poll = PollingOption::find($request->id);
        $poll->votes = $poll->votes + 1;
        $poll->save();

        return response()->json(['status' => 'success']);
    }
}