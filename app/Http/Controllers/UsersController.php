<?php

namespace App\Http\Controllers;

use App\User;
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
        # code...
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
}
