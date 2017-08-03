<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Prescription;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{
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
    public function create(Prescription $prescription)
    {
        return view('medicine.add-form', ['prescription' => $prescription]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Prescription $prescription, Request $request)
    {
        $medicine = new Medicine;
        
        $medicine->name = $request->name;
        $medicine->duration = $request->duration;
        if($request->is_after_meal) $medicine->is_after_meal = 1;
        if($request->at_breakfast) $medicine->at_breakfast = 1;
        if($request->at_lunch) $medicine->at_lunch = 1;
        if($request->at_dinner) $medicine->at_dinner = 1;

        $prescription->medicines()->save($medicine);
        
        return redirect()->route('prescription.show', [$prescription->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
