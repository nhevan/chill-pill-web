@extends('layouts.app')

@section('content')
	<div class="center-align">
		<h3>Hello<br> {{ $user->name }}</h3>
		<div class="row left-align">
	      <div class="col s12">
	        <div class="card-panel teal">
	        	<ul>
	        		<li>Type : Doctor</li>
	        		<li>Speciality : {{ $doctor->speciality }}</li>
	        		<li>Hospital Name : {{ $doctor->hospital_name }}</li>
	        		<li>Address : {{ $doctor->address }}</li>
	        		<li>Phone : {{ $doctor->phone }}</li>
	        	</ul>
	          <span class="white-text">
	          </span>
	        </div>
	      </div>
	    </div>
		@include('logout')
	</div>
@endsection