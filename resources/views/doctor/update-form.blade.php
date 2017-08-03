@extends('layouts.app')

@section('content')
	<div class="center-align">
		<form class="col s12" role="form" method="POST" action="{{ route('doctor.update', [$doctor->id]) }}" style="margin-bottom: 10px;">
			{{ csrf_field() }}
			<div class="row">
				<div class="input-field col s12">
					<input id="speciality" class="validate" type="text" name="speciality" value="{{ $doctor->speciality }}" required>
					<label for="speciality">Speciality</label>
				</div>
				<div class="input-field col s12">
					<input id="phone" class="validate" type="text" name="phone" value="{{ $doctor->phone }}" required>
					<label for="phone">Contact No.</label>
				</div>
				<div class="input-field col s12">
					<input id="hospital_name" class="validate" type="text" name="hospital_name" value="{{ $doctor->hospital_name }}" required>
					<label for="hospital_name">Hospital Name</label>
				</div>
				<div class="input-field col s12">
					<input id="address" class="validate" type="text" name="address" value="{{ $doctor->address }}" required>
					<label for="address">Address</label>
				</div>
			</div>
			<button class="btn waves-effect waves-light" type="submit" name="action">Update
			<i class="material-icons right">send</i>
			</button>
		</form>
	</div>
@endsection