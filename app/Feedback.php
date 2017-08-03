<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	protected $with = ['patient'];
	
    public function patient()
    {
    	return $this->belongsTo('App\PatientMetadata');
    }
}
