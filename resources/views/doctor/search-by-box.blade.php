@extends('layouts.app')

@section('content')
	<div class="center-align" style="margin-top: 30%">
		@if ($errors->has('box_serial'))
          <p class="help-block center-align">
            <strong>{{ $errors->first('box_serial') }}</strong>
          </p>
        @endif
		<form class="col s12" role="form" method="POST" action="{{ route('doctor.search-by-box') }}" style="margin-bottom: 10px;">
			{{ csrf_field() }}
			<div class="row">
			<div class="input-field col s12">
				<input id="box_serial" class="validate" type="text" name="box_serial" value="{{ old('box_serial') }}" required>
				<label for="box_serial">Enter Box Serial</label>
			</div>
			@if ($errors->has('email'))
				<p class="help-block center-align">
					<strong>{{ $errors->first('email') }}</strong>
				</p>
			@endif
		</div>
		<button class="btn waves-effect waves-light" type="submit" name="action">Find Patient
		<i class="material-icons right">search</i>
		</button>
		</form>
	</div>
@endsection