<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Prescription;
use App\DoctorMetadata;
use App\PatientMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientsController extends ApiController
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

    public function settings()
    {
    	return view('patient.settings', ['patient' => Auth::user()->patient]);
    }

    public function doses()
    {
    	$medicine_bag = $this->getAllMedcines();
    	$filtered_medicines = $this->filterMedicines($medicine_bag);

    	return view('patient.doses', ['medicines' => $filtered_medicines]);
    }

    public function getAllMedcines()
    {
    	$medicine_bag = Auth::user()->patient->prescriptions->map(function($prescription){
    					if (sizeof($prescription->medicines)) {
    						return $prescription->medicines;
    					}
			    	});

    	$merged = $this->mergeMedicinesFromAllPrescriptions($medicine_bag);

    	return $merged;
    }

    public function mergeMedicinesFromAllPrescriptions($medicine_bag)
    {
    	$merged = collect();
    	$medicine_bag->filter()->each(function($medicine) use ($merged){
    		$merged->push($medicine);
    	});

    	return $merged;
    }

    public function filterMedicines($medicine_bag)
    {
    	return $medicine_bag->flatten(1)->unique('name');
    }

    public function updateMealtime(Request $request)
    {
    	$meal_times = [
    		'breakfast_at' => Carbon::parse($request->breakfast_at)->format('H:i:s'),
    		'lunch_at' => Carbon::parse($request->lunch_at)->format('H:i:s'),
    		'dinner_at' => Carbon::parse($request->dinner_at)->format('H:i:s'),
		];
    	$request->merge($meal_times);

		$patient = Auth::user()->patient;

		$patient->fill($request->only('breakfast_at', 'lunch_at', 'dinner_at'));
		$patient->save();
		$this->syncChillPillBox($meal_times);

		return back();
    }

    public function syncChillPillBox($meal_times)
    {
    	foreach ($meal_times as $meal => $time) {
    		$before_meal = Carbon::parse($time)->subMinutes(30)->format('H:i:s');
    		$after_meal = Carbon::parse($time)->addMinutes(30)->format('H:i:s');

    		$this->setMealSchedule($before_meal);
    		$this->setMealSchedule($after_meal);
    	}
    }

    public function setMealSchedule($meal_time)
    {
		$hour = (int) substr($meal_time, 0, 2);
		$minute = (int) substr($meal_time, 3, 2);

        $this->setNodeSchedule($minute. " ".$hour. " * * *");
    }
    public function setNodeSchedule($cron_formatted_time)
    {
        $data['type'] = 'sync';
        $data['cron_formatted_schedule'] = $cron_formatted_time;

        $this->push('my-channel', 'my-event', $data);
    }
}
