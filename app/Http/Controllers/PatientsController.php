<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\DoctorMetadata;
use App\PatientMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
{
    public function dashboard()
    {
    	$patient = PatientMetadata::where('user_id', Auth::user()->id)->first();

    	return view('patient.dashboard', ['patient' => $patient]);
    }

    public function showUpdateForm(Request $request)
    {
    	return view("patient.update-form", ['patient' => Auth::user()->patient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoctorMetadata  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$patient = Auth::user()->patient;

        $patient->age = $request->age;
        $patient->sex = $request->sex;
        $patient->mobile = $request->mobile;
        $patient->emergency_contact_mobile = $request->emergency_contact_mobile;
        $patient->emergency_contact_email = $request->emergency_contact_email;

        $patient->save();

        return redirect()->route('dashboard');
    }

    public function prescriptions()
    {
    	$prescriptions = Prescription::where('patient_id', Auth::user()->patient->id)->orderBy('created_at', 'DESC')->get();

    	return view("patient.prescriptions", ['prescriptions' => $prescriptions]);
    }
}
