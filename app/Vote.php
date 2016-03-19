<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $table = 'vote';

    public function candidates()
    {
        return $this->belongsTo('\\App\\Candidate');
    }

    public function user()
    {
        return $this->belongsTo('\\App\\User');
    }
}
