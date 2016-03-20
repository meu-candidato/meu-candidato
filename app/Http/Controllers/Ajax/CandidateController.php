<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Candidate;

class CandidateController extends Controller
{

    public function paginate()
    {
        $candidates = Candidate::approved()
            ->with(['links', 'achievements'])
            ->paginate(9);

        return response()->json([
            'candidates' => $candidates->toArray()
        ]);
    }
}
