<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'user';

    public function candidates()
    {
        return $this->hasMany('\\App\\Candidate');
    }

    public function votes()
    {
        return $this->hasMany('\\App\\Vote');
    }

    public function scopeFacebook($query, $facebookId)
    {
        return $query->where('facebook_id', '=', $facebookId);
    }
}
