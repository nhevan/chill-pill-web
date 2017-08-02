<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMetadata extends Model
{
    protected $guarded = ['user_id'];
    protected $with = ['user', 'conditions'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function conditions()
    {
        return $this->hasMany('App\PatientCondition', 'patient_id');
    }
}
