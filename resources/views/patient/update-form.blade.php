@extends('layouts.app')

@section('content')
	<div class="center-align">
		<form class="col s12" role="form" method="POST" action="{{ route('patient.update') }}" style="margin-bottom: 10px;">
			{{ csrf_field() }}
			<div class="row">
				<div class="input-field col s12">
					<input id="age" class="validate" type="number" name="age" value="{{ $patient->age }}" required>
					<label for="age">Age</label>
				</div>
			
				<div class="input-field col s12">
				    <select name="sex">
				      <option value="" disabled selected>Choose your option</option>
				      <option value="Male" {{ $patient->sex=="Male" ? "selected" : "" }}>Male</option>
				      <option value="Female" {{ $patient->sex=="Female" ? "selected" : "" }}>Female</option>
				    </select>
				    <label>Sex</label>
				</div>

				<div class="input-field col s12">
					<input id="mobile" class="validate" type="text" name="mobile" value="{{ $patient->mobile }}" required>
					<label for="mobile">Mobile</label>
				</div>

				<div class="input-field col s12">
					<input id="emergency_contact_mobile" class="validate" type="text" name="emergency_contact_mobile" value="{{ $patient->emergency_contact_mobile }}" required>
					<label for="emergency_contact_mobile">Emergency Contact Mobile</label>
				</div>

				<div class="input-field col s12">
					<input id="emergency_contact_email" class="validate" type="text" name="emergency_contact_email" value="{{ $patient->emergency_contact_email }}" required>
					<label for="emergency_contact_email">Emergency Contact Email</label>
				</div>

			</div>
			<button class="btn waves-effect waves-light" type="submit" name="action">Update
			<i class="material-icons right">send</i>
			</button>
		</form>
	</div>
@endsection

@push('scripts')
	<script>
		 $(document).ready(function() {
		    $('select').material_select();
		  });
	</script>
@endpush