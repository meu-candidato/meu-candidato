<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateAchievement extends Model
{
    use SoftDeletes;

    protected $table = 'candidate_achievement';

    public function candidate()
    {
        return $this->belongsTo('\\App\\Candidate');
    }
}
