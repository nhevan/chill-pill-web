<div class="center-align">
	<form class="col s12" role="form" method="POST" action="{{ route('patient.assign-cells') }}" style="margin-bottom: 10px;">
		{{ csrf_field() }}
		<div class="row">
			<div class="input-field col s12">
				<input id="cell1" type="text" class="autocomplete" name="cell1" value="{{ $patient->cell1 }}">
		        <label for="cell1" class="white-text">Enter Medicine Name for cell 1</label>
			</div>
			<div class="input-field col s12">
				<input id="cell2" type="text" class="autocomplete" name="cell2" value="{{ $patient->cell2 }}">
		        <label for="cell2" class="white-text">Enter Medicine Name for cell 2</label>
			</div>
			<div class="input-field col s12">
				<input id="cell3" type="text" class="autocomplete" name="cell3" value="{{ $patient->cell3 }}">
		        <label for="cell3" class="white-text">Enter Medicine Name for cell 3</label>
			</div>
			<div class="input-field col s12">
				<input id="cell4" type="text" class="autocomplete" name="cell4" value="{{ $patient->cell4 }}">
		        <label for="cell4" class="white-text">Enter Medicine Name for cell 4</label>
			</div>
			<div class="input-field col s12">
				<input id="cell5" type="text" class="autocomplete" name="cell5" value="{{ $patient->cell5 }}">
		        <label for="cell5" class="white-text">Enter Medicine Name for cell 5</label>
			</div>
			<div class="input-field col s12">
				<input id="cell6" type="text" class="autocomplete" name="cell6" value="{{ $patient->cell6 }}">
		        <label for="cell6" class="white-text">Enter Medicine Name for cell 6</label>
			</div>
			<div class="input-field col s12">
				<input id="cell7" type="text" class="autocomplete" name="cell7" value="{{ $patient->cell7 }}">
		        <label for="cell7" class="white-text">Enter Medicine Name for cell 7</label>
			</div>
			<div class="input-field col s12">
				<input id="cell8" type="text" class="autocomplete" name="cell8" value="{{ $patient->cell8 }}">
		        <label for="cell8" class="white-text">Enter Medicine Name for cell 8</label>
			</div>
			<div class="input-field col s12">
				<input id="cell9" type="text" class="autocomplete" name="cell9" value="{{ $patient->cell9 }}">
		        <label for="cell9" class="white-text">Enter Medicine Name for cell 9</label>
			</div>
		</div>
		<button class="btn waves-effect waves-light" type="submit" name="action">Update
		<i class="material-icons right">send</i>
		</button>
	</form>
</div>