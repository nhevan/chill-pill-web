@extends('layouts.app')

@section('content')
	<div class="center-align">
		<div class="row center-align">
			<div class="col s6">
				<h6>Doctor Name : {{ $prescription->doctor->user->name}}</h6>
			</div>
			<div class="col s6">
				<h6>Patient Name : {{ $prescription->patient->user->name}}</h6>
			</div>
		</div>
		<hr>
		<p>{{ $prescription->current_symptoms }}</p>
		<hr>
		<br>
	    <div class="row left-align">
	      <div class="col s12">
	        <div class="card-panel teal">
	        	<h5>Medicines</h5>
	        	<hr>
	        	<ul class="collection" style="width: 100%;">
	        		@foreach ($prescription->medicines as $medicine)
		        		<li class="collection-item teal">{{ $medicine->name }} <span class="right">{{ $medicine->at_breakfast }} + {{ $medicine->at_lunch }} + {{ $medicine->at_dinner }}</span></li>
	        		@endforeach
	        	</ul>
	        </div>
	        <a class="right btn-floating btn-small waves-effect waves-light red darken-2" style="position: relative;top: -40px;left:15px"><i class="material-icons">add</i></a>
	      </div>
	    </div>
		
	</div>
@endsection