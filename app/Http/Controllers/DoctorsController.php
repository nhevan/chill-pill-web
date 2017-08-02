<?php

namespace App\Http\Controllers;

use App\DoctorMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorsController extends Controller
{
    public function dashboard()
    {
    	$doctor = DoctorMetadata::where('user_id', Auth::user()->id)->first();

    	return view('doctor.dashboard', ['doctor' => $doctor]);
    }
}
