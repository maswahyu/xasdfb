<?php

namespace App\Http\Controllers;

use App\PollingOption;
use App\PollingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollingController extends Controller
{
    public function doVote(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $poll = PollingOption::find($request->id);
        if(Auth::check()) { //if user login
            // check if user already vote for this polling
            $polling_user = PollingUser::where('polling_id', $poll->polling_id)
                            ->where('user_id', Auth::user()->id)->first();

            if($polling_user) { //if user already vote back
                return response()->noContent();
            } else {
                // save user polling
                $polling_user = new PollingUser();
                $polling_user->fill([
                    'polling_id' => $poll->polling_id,
                    'option_id' => $poll->id,
                    'user_id' => Auth::user()->id,
                ]);

                $polling_user->save();
            }

        }

        $poll->votes = $poll->votes + 1;
        $poll->save();

        return response()->json(['status' => 'success'], 200);
    }
}
