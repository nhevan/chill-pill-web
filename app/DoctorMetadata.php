<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorMetadata extends Model
{
	protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
