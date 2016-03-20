<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Vote;

class VoteController extends Controller
{

    public function add(Request $request)
    {
        $this->validate($request, [
            'candidate_id' => 'required|exists:candidate,id',
            'user_id' => 'required|exists:user,id',
            'type' => 'required|boolean'
        ]);

        $user = new Vote();
        $user->user_id = $data['user_id'];
        $user->candidate_id = $data['candidate_id'];
        $user->type = $data['type'];
        $user->save();

        return response()->json([
            'status' => true
        ]);
    }
}
