@extends('layouts.app')

@section('content')
	<div class="center-align">
		
		<div class="row">
			<div class="col s12">
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

		<div class="row">
			<div class="col s12">
				<div class="card-panel teal">
					<h3>Box Settings</h3>
					<table class="bordered">
				        <tbody>
				          <tr>
				            <td>Cell # 1 :</td>
				            <td>{{ $patient->cell1 ? $patient->cell1 : "Unassigned" }}</td>
				          </tr>
				          <tr>
				            <td>Cell # 2 :</td>
				            <td>{{ $patient->cell2 ? $patient->cell2 : "Unassigned" }}</td>
				          </tr>
				          <tr>
				            <td>Cell # 3 :</td>
				            <td>{{ $patient->cell3 ? $patient->cell3 : "Unassigned" }}</td>
				          </tr>
				          <tr>
				            <td>Cell # 4 :</td>
				            <td>{{ $patient->cell4 ? $patient->cell4 : "Unassigned" }}</td>
				          </tr>
				          <tr>
				            <td>Cell # 5 :</td>
				            <td>{{ $patient->cell5 ? $patient->cell5 : "Unassigned" }}</td>
				          </tr>
				          <tr>
				            <td>Cell # 6 :</td>
				            <td>{{ $patient->cell6 ? $patient->cell6 : "Unassigned" }}</td>
				          </tr>
				          <tr>
				            <td>Cell # 7 :</td>
				            <td>{{ $patient->cell7 ? $patient->cell7 : "Unassigned" }}</td>
				          </tr>
				          <tr>
				            <td>Cell # 8 :</td>
				            <td>{{ $patient->cell8 ? $patient->cell8 : "Unassigned" }}</td>
				          </tr>
				          <tr>
				            <td>Cell # 9 :</td>
				            <td>{{ $patient->cell9 ? $patient->cell9 : "Unassigned" }}</td>
				          </tr>
				        </tbody>
				      </table>
				      <br>
					<a href="#update-box-info" class="btn btn-small waves-effect waves-light red darken-2 modal-trigger"><i class="material-icons right">watch_later</i>Assign Cells</a>
				</div>
			</div>
		</div>

	</div>
	<div id="update-mealtime-modal" class="modal teal" style="min-height: 80vh">
		<div class="modal-content">
			@include('patient.update-mealtime-form', ['patient_id' => $patient->id])
		</div>
	</div>
	<div id="update-box-info" class="modal teal" style="min-height: 80vh">
		<div class="modal-content">
			@include('patient.update-box-form', ['patient_id' => $patient->id])
		</div>
	</div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function(){
		    $('.modal').modal();

		    $('input.autocomplete').autocomplete({
			    data: {
			      @foreach ($medicines as $med)
			      	"{{$med->name}}" : null,
			      @endforeach
			    },
			    limit: 9,
			    minLength: 1,
			  });
		  });
	</script>
@endpush