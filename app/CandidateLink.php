<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateLink extends Model
{
    use SoftDeletes;

    protected $table = 'candidate_link';

    public function candidate()
    {
        return $this->belongsTo('\\App\\Candidate');
    }
}
