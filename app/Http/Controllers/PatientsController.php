<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function dashboard()
    {
    	return view('patient.dashboard');
    }

    public function showUpdateForm(Request $request)
    {
    	return view("patient.update-form");
    }
}
