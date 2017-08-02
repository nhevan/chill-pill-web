<?php

namespace App\Http\Controllers;

use App\DoctorMetadata;
use App\PatientMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorsController extends Controller
{
	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

    public function dashboard()
    {
    	$doctor = DoctorMetadata::where('user_id', Auth::user()->id)->first();

    	return view('doctor.dashboard', ['doctor' => $doctor]);
    }

    public function searchByBox()
    {
    	if ($this->request->isMethod("POST")) {
    		return $this->patientInfo();
    	}
    	return view('doctor.search-by-box');
    }

    public function patientInfo()
    {
    	// dd($this->request->all());
    	$box_serial = $this->request->box_serial;
    	$patient = PatientMetadata::where('box_serial', $box_serial)->first();

        if(!$patient){
            return redirect()->back()
                ->withInput($this->request->only('box_serial'))
                ->withErrors(["box_serial" => "No Patient found."]);
        }
    	
    	return view('doctor.patient-info', ['patient' => $patient]);
    }
}
