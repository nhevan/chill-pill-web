<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
dd($patient->toArray());
        $patient->save();

        return redirect()->route('dashboard');
    }

    public function prescriptions()
    {
    	$prescriptions = Prescription::where('patient_id', Auth::user()->patient->id)->orderBy('created_at', 'DESC')->get();

    	return view("patient.prescriptions", ['prescriptions' => $prescriptions]);
    }

    public function settings()
    {
    	return view('patient.settings', ['patient' => Auth::user()->patient]);
    }

    public function updateMealtime(Request $request)
    {
    	$request->merge([
    		'breakfast_at' => Carbon::parse($request->breakfast_at)->format('H:i:s'),
    		'lunch_at' => Carbon::parse($request->lunch_at)->format('H:i:s'),
    		'dinner_at' => Carbon::parse($request->dinner_at)->format('H:i:s'),
		]);

		$patient = Auth::user()->patient;

		$patient->fill($request->only('breakfast_at', 'lunch_at', 'dinner_at'));
		$patient->save();

		return back();
    }
}
