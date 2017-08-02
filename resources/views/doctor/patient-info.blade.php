@extends('layouts.app')

@section('content')
	<div class="center-align">
		<div class="row left-align">
	      <div class="col s12">
	        <div class="card-panel teal">
	        	<h5>General Information</h5>
	        	<hr>
	        	<ul>
	        		<li>Name : {{ $patient->user->name }}</li>
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

	    <div class="row left-align">
	      <div class="col s12">
	        <div class="card-panel teal">
	        	<h5>Known Conditions</h5>
	        	<hr>
	        	<ul>
					@foreach ($patient->conditions as $condition)
						<li>- {{ $condition->condition }}</li>
					@endforeach
				</ul>
	          <span class="white-text">
	          </span>
	        </div>
	      </div>
	    </div>
	</div>
@endsection