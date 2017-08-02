<?php

namespace App\Http\Controllers;

use App\User;
use App\DoctorMetadata;
use App\PatientMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * displays two differenr signup form for Doctor and Patient
     */
    public function signup()
    {
        return view('signup');
    }

    /**
     * signs up a doctor
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function doctorSignUp(Request $request)
    {
        $request->merge(['user_type_id' => 2, 'password' => bcrypt($request->password)] );
        $user = $this->user->create($request->all());

        $doctor = New DoctorMetadata;
        $doctor->speciality = $request->speciality;
        $doctor->phone = $request->phone;
        $user->doctor()->save($doctor);

        if (Auth::loginUsingId($user->id)) {
            return redirect()->route('doctor-dashboard');
        }
    }

    /**
     * signs up a patient
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function patientSignUp(Request $request)
    {
        $request->merge(['user_type_id' => 1, 'password' => bcrypt($request->password)] );
        $user = $this->user->create($request->all());

        $patient = New PatientMetadata;
        $patient->emergency_contact_email = $request->emergency_contact_email;
        $patient->box_serial = $request->box_serial;
        $user->patient()->save($patient);

        if (Auth::loginUsingId($user->id)) {
            return redirect()->route('patient-dashboard');
        }
    }

    /**
     * custom login function for doctors and patients
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::user()->user_type_id == 1) {
                return redirect()->route('patient-dashboard');
            }
            return redirect()->route('doctor-dashboard');
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(["email" => "Invalid credentials."]);
    }

    /**
     * returns the user to their appropriate dashboard
     * @return [type] [description]
     */
    public function dashboard()
    {
        if (Auth::user()->user_type_id == 1) {
            return redirect()->route('patient-dashboard');
        }
        return redirect()->route('doctor-dashboard');
    }
}
