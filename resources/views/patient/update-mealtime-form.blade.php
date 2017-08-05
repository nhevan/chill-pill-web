<form class="col s12" role="form" method="POST" action="{{ route('patient.update-mealtime') }}" style="margin-bottom: 10px;">
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col s12">
			<input type="text" class="timepicker" value="{{ Carbon\Carbon::parse($patient->breakfast_at)->format('h:i a') }}" name="breakfast_at" >
		</div>
		<div class="input-field col s12">
			<input type="text" class="timepicker" value="{{ Carbon\Carbon::parse($patient->lunch_at)->format('h:i a') }}" name="lunch_at" >
		</div>
		<div class="input-field col s12">
			<input type="text" class="timepicker" value="{{ Carbon\Carbon::parse($patient->dinner_at)->format('h:i a') }}" name="dinner_at" >
		</div>

	</div>
	<button class="btn waves-effect waves-light" type="submit" name="action">Update
	<i class="material-icons right">send</i>
	</button>
</form>

@push('scripts')
	<script>
		$('.timepicker').pickatime({
		    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
		    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
		    twelvehour: true, // Use AM/PM or 24-hour format
		    donetext: 'OK', // text for done-button
		    cleartext: 'Clear', // text for clear-button
		    canceltext: 'Cancel', // Text for cancel-button
		    autoclose: false, // automatic close timepicker
		    ampmclickable: true, // make AM PM clickable
		    aftershow: function(){} //Function for after opening timepicker
		  });
	</script>
@endpush