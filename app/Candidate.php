<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use SoftDeletes;

    protected $table = 'candidate';

    public function user()
    {
        return $this->belongsTo('\\App\\User');
    }

    public function votes()
    {
        return $this->hasMany('\\App\\Vote');
    }

    public function links()
    {
        return $this->hasMany('\\App\\CandidateLink');
    }

    public function achievements()
    {
        return $this->hasMany('\\App\\CandidateAchievement');
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', '=', true);
    }

    public function scopeRef($query, $ref)
    {
        return $query->where('ref', '=', $ref);
    }
}
