<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
	protected $with = ['medicines', 'doctor', 'patient'];

    public function medicines()
    {
    	return $this->hasMany('App\Medicine');
    }

    public function doctor()
    {
    	return $this->belongsTo('App\DoctorMetadata');
    }

    public function patient()
    {
    	return $this->belongsTo('App\PatientMetadata');
    }
}
