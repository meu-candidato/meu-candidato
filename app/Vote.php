<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use SoftDeletes;

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
