<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMetadata extends Model
{
    protected $guarded = ['user_id'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
