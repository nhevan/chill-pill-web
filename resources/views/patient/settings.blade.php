@extends('layouts.app')

@section('content')
	<div class="center-align">
		<div class="row">
			<div class="col s12 m5">
				<div class="card-panel teal">
					<h3>Meal Times</h3>
					<ul class="white-text">
						<li>Breakfast : {{ Carbon\Carbon::parse($patient->breakfast_at)->format('h a') }}</li>
						<li>Lunch : {{ Carbon\Carbon::parse($patient->lunch_at)->format('h a') }}</li>
						<li>Dinner : {{ Carbon\Carbon::parse($patient->dinner_at)->format('h a') }}</li>
					</ul>
					<a href="#update-mealtime-modal" class="btn btn-small waves-effect waves-light red darken-2 modal-trigger"><i class="material-icons right">watch_later</i>Update Meal Time</a>
				</div>
			</div>
		</div>		
	</div>
	<div id="update-mealtime-modal" class="modal teal" style="min-height: 80vh">
		<div class="modal-content">
			@include('patient.update-mealtime-form', ['patient_id' => $patient->id])
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