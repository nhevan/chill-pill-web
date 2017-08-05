<form class="col s12" role="form" method="POST" action="{{ route('feedback.add', [ $doctor_id ]) }}" style="margin-bottom: 10px;">
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col s12">
			<textarea id="feedback" class="materialize-textarea validate white-text" name="feedback" value="{{ old('feedback') }}" required> </textarea>
			<label class="white-text" for="feedback">Feedback</label>
		</div>

	</div>
	
	<div class="row center-align">
		<div class="col s6">
			<a href="#!" class="modal-action modal-close waves-effect btn red darken-2">Cancel</a>
		</div>
		<div class="col s6">
			<button class="btn waves-effect waves-light" type="submit" name="action">Add
			<i class="material-icons right">navigate_next</i>
			</button>
		</div>
	</div>
</form>

