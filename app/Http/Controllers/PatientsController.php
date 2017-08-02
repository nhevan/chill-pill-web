<?php

namespace App\Http\Controllers;

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
    	return view("patient.update-form");
    }
}
