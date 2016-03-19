<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidate';

    public function user()
    {
        return $this->belongsTo('\\App\\User');
    }

    public function votes()
    {
        return $this->hasMany('\\App\\Vote');
    }
}
