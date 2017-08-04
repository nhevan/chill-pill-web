@extends('layouts.app')

@section('content')
	<div class="center-align">
		<h3>Hello<br> {{ $user->name }}</h3>
		<div class="row left-align">
	      <div class="col s12">
	        <div class="card-panel teal">
	        	<ul>
	        		<li>Type : Patient</li>
	        		<li>Age : {{ $patient->age }} years</li>
	        		<li>Sex : {{ $patient->sex }}</li>
	        		<li>Mobile : {{ $patient->mobile }}</li>
	        		<li>Emergency Mobile : {{ $patient->emergency_contact_mobile }}</li>
	        		<li>Emergency Email : {{ $patient->emergency_contact_email }}</li>
	        		<li>Box Serial : {{ $patient->box_serial }}</li>
	        	</ul>
	          <span class="white-text">
	          </span>
	        </div>
	      </div>
	    </div>
	    <a href="{{ route('show-patient-update-page') }}" class="btn-floating btn-large waves-effect waves-light red darken-2"><i class="material-icons right">mode_edit</i></a>
	</div>
@endsection