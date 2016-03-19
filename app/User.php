<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    public function candidates()
    {
        return $this->hasMany('\\App\\Candidate');
    }

    public function votes()
    {
        return $this->hasMany('\\App\\Vote');
    }
}
