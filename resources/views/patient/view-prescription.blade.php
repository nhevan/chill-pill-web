@extends('layouts.app')

@section('content')
	<div class="center-align">
		<div class="row center-align">
			<div class="col s12">
				<h6>Doctor Name : {{ $prescription->doctor->user->name}}</h6>
				<h6>Patient Name : {{ $prescription->patient->user->name}}</h6>
			</div>
			<div class="col s12">
				<h6>Date : {{ Carbon\Carbon::parse($prescription->created_at)->format('F j, Y') }}</h6>
			</div>
		</div>
		<hr>
		<p>{{ $prescription->current_symptoms }}</p>
		<hr>
		<br>
	    <div class="row center-align">
	      <div class="col s12">
	        <div class="card-panel teal">
	        	<h5>Medicines</h5>
	        	<hr>
	        	<ul class="collection" style="width: 100%;">
	        		@foreach ($prescription->medicines as $medicine)
		        		<li class="collection-item teal" style="height:40px;"><span class="left">{{ $medicine->name }} </span><span class="right">{{ $medicine->at_breakfast }} + {{ $medicine->at_lunch }} + {{ $medicine->at_dinner }}</span></li>
	        		@endforeach
	        	</ul>
	        </div>
	        @if (Auth::user()->user_type_id == 1)
	        	<a href="#modal1" class="btn btn-small waves-effect waves-light red darken-2 modal-trigger"><i class="material-icons right">attachment</i>Send Feedback</a>
	        @endif

			<div id="modal1" class="modal teal">
				<div class="modal-content">
					@include('feedback.add-form', ['doctor_id' => $prescription->doctor->id])
				</div>
			</div>
	      </div>
	    </div>
	</div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function(){
		    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
		    $('.modal').modal();
		  });
	</script>
@endpush