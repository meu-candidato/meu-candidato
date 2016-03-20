<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Candidate;
use App\CandidateLink;
use App\CandidateAchievement;

class CandidateController extends Controller
{

    public function view($ref)
    {
        $candidate = Candidate::approved()
            ->ref($ref)
            ->first();

        if (is_null($candidate)) {
            return redirect()->route('home.index');
        }

        return view('home.candidate.view', compact('candidate'));
    }

    public function add()
    {
        return view('home.candidate.add');
    }

    public function submit(Request $request)
    {
        $data = $request->all();

        $messages = [
            'required' => 'Campo obrigatório',
            'integer' => 'Digite um número'
        ];

        $validator = \Validator::make($data, [
            'user_id' => 'required',
            'name' => 'required',
            'age' => 'required|integer',
            'job' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return view('home.candidate.add');
        }

        $user = User::find($data['user_id']);
        if (is_null($user)) {
            return view('home.candidate.add');
        }

        $candidate = new Candidate();
        $candidate->user_id = $data['user_id'];
        $candidate->name = $data['name'];
        $candidate->age = $data['age'];
        $candidate->job = $data['job'];

        if (!empty($data['history'])) {
            $candidate->history = $data['history'];
        }

        if (!empty($data['links'])) {
            foreach ($data['links'] as $link) {
                if (!filter_var($link, FILTER_VALIDATE_URL)) {
                    continue;
                }

                $candidateLink = new CandidateLink();
                $candidateLink->link = $link;
                $candidateLink->candidate_id = $candidate->id;
                $candidateLink->save();
            }
        }

        if (!empty($data['achievements'])) {
            foreach ($data['achievements'] as $achievement) {
                if (empty($achievement)) {
                    continue;
                }

                $candidateAchievement = new CandidateAchievement();
                $candidateAchievement->achievement = $achievement;
                $candidateAchievement->candidate_id = $candidate->id;
                $candidateAchievement->save();
            }
        }

        $candidate->save();

        return view('home.index');
    }

}
