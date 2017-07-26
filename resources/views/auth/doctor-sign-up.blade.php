<div style="height:430px;" class="">
	<form class="col s12" role="form" method="POST" action="{{ route('doctorSignUp') }}" style="margin-bottom: 10px;">
		{{ csrf_field() }}
		<div class="row">
			<div class="input-field col s12">
				<input id="name" class="validate" type="text" name="name" value="{{ old('name') }}" required>
				<label for="name">Name</label>
			</div>
			<div class="input-field col s12">
				<input id="email" class="validate" type="email" name="email" value="{{ old('email') }}" required>
				<label for="email">Email</label>
			</div>
			<div class="input-field col s12">
				<input class="validate" id="password" type="password" name="password" required>
				<label for="password">Password</label>
			</div>
			<div class="input-field col s12">
				<input id="speciality" class="validate" type="text" name="" value="{{ old('speciality') }}" required>
				<label for="speciality">Speciality</label>
			</div>
			<div class="input-field col s12">
				<input id="phone" class="validate" type="text" name="" value="{{ old('phone') }}" required>
				<label for="phone">Contact No.</label>
			</div>
			@if ($errors->has('email'))
				<p class="help-block center-align">
					<strong>{{ $errors->first('email') }}</strong>
				</p>
			@endif
		</div>
		<button class="btn waves-effect waves-light" type="submit" name="action">Sign up
		<i class="material-icons right">send</i>
		</button>
	</form>
</div>