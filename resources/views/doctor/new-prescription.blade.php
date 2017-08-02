@extends('layouts.app')

@section('content')
	<div class="center-align" style="margin-top: 30px;">
		<h4>New Prescription</h4>
		<form class="col s12" role="form" method="POST" action="{{ route('prescription.new', [ $patient_id ]) }}" style="margin-bottom: 10px;">
			{{ csrf_field() }}
			<div class="row">
			<div class="input-field col s12">
				<textarea id="current_symptoms" class="materialize-textarea validate" name="current_symptoms" value="{{ old('current_symptoms') }}" required></textarea>
				<label for="current_symptoms">Enter Patient symptoms</label>
			</div>
		</div>
		<button class="btn waves-effect waves-light" type="submit" name="action">Proceed
		<i class="material-icons right">navigate_next</i>
		</button>
		</form>
	</div>
@endsection