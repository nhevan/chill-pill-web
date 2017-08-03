<?php

namespace App\Http\Controllers;

use App\Prescription;
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

    public function showCreatePrescription(PatientMetadata $patient)
    {
        return view('doctor.new-prescription', ['patient_id' => $patient->id]);
    }

    public function prescriptions()
    {
        $prescriptions = Prescription::where('doctor_id', Auth::user()->doctor->id)->get();

        return view('prescriptions', ['prescriptions' => $prescriptions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoctorMetadata  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $doctor = DoctorMetadata::find(Auth::user()->doctor->id);

        return view("doctor.update-form", ['doctor' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoctorMetadata  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorMetadata $doctor)
    {
        $doctor->speciality = $request->speciality;
        $doctor->phone = $request->phone;
        $doctor->hospital_name = $request->hospital_name;
        $doctor->address = $request->address;

        $doctor->save();

        return redirect()->route('dashboard');
    }
}
